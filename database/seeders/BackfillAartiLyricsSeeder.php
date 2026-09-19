<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackfillAartiLyricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aartis = \App\Models\Arti\Aarti::all();
        $count = 0;

        foreach ($aartis as $aarti) {
            $updated = false;

            // Handle Hinglish (lyrics_transliteration)
            if (empty($aarti->lyrics_hinglish) && !empty($aarti->lyrics_transliteration)) {
                $hinglishPlain = '';
                foreach ($aarti->lyrics_transliteration as $sec) {
                    if (!empty($sec['lines'])) {
                        $hinglishPlain .= implode("\n", $sec['lines']) . "\n\n";
                    }
                }
                $aarti->lyrics_hinglish = trim($hinglishPlain);
                $updated = true;
            }

            // Handle Hindi Plain (lyrics is already Hindi Plain from seeder)
            if (empty($aarti->lyrics_hindi_plain) && !empty($aarti->lyrics)) {
                $aarti->lyrics_hindi_plain = $aarti->lyrics;
                $updated = true;
            }

            if ($updated) {
                $aarti->save();
                $count++;
            }
        }

        $this->command->info("Backfilled lyrics for {$count} Aartis successfully!");
    }
}
