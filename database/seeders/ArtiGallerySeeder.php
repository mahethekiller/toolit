<?php

namespace Database\Seeders;

use App\Models\Arti\Deity;
use App\Models\Arti\GalleryImage;
use Illuminate\Database\Seeder;

class ArtiGallerySeeder extends Seeder
{
    public function run(): void
    {
        $ganesha = Deity::where('name', 'Ganesha')->first();
        $shiva = Deity::where('name', 'Shiva')->first();
        $krishna = Deity::where('name', 'Krishna')->first();
        $durga = Deity::where('name', 'Durga')->first();
        $hanuman = Deity::where('name', 'Hanuman')->first();
        $lakshmi = Deity::where('name', 'Lakshmi')->first();

        $images = [
            [
                'deity_id' => $ganesha->id,
                'title' => 'Lord Ganesha Painting',
                'image_url' => 'https://images.unsplash.com/photo-1609137144814-1cb6b0a88094',
                'download_count' => 120
            ],
            [
                'deity_id' => $shiva->id,
                'title' => 'Adiyogi Shiva Statue',
                'image_url' => 'https://images.unsplash.com/photo-1616089309605-e356e72c57ea',
                'download_count' => 340
            ],
            [
                'deity_id' => $krishna->id,
                'title' => 'Lord Krishna Flute',
                'image_url' => 'https://images.unsplash.com/photo-1627856013091-fed6e4e30025',
                'download_count' => 150
            ],
            [
                'deity_id' => $durga->id,
                'title' => 'Maa Durga idol',
                'image_url' => 'https://images.unsplash.com/photo-1590050752117-238cb0fb12b1',
                'download_count' => 90
            ],
            [
                'deity_id' => $hanuman->id,
                'title' => 'Lord Hanuman Devotion',
                'image_url' => 'https://images.unsplash.com/photo-1617478728955-46a362bfcb43',
                'download_count' => 210
            ],
            [
                'deity_id' => $lakshmi->id,
                'title' => 'Goddess Lakshmi Blessings',
                'image_url' => 'https://images.unsplash.com/photo-1609137144983-a9d7cd17c603',
                'download_count' => 85
            ]
        ];

        foreach ($images as $image) {
            GalleryImage::firstOrCreate(['title' => $image['title']], $image);
        }
    }
}
