<?php

namespace Database\Seeders;

use App\Models\Arti\Deity;
use Illuminate\Database\Seeder;

class ArtiDeitySeeder extends Seeder
{
    public function run(): void
    {
        $deities = [
            [
                'name' => 'Ganesha',
                'description' => 'Remover of Obstacles, Lord of New Beginnings',
                'image_url' => 'https://images.unsplash.com/photo-1609137144814-1cb6b0a88094',
            ],
            [
                'name' => 'Shiva',
                'description' => 'The Destroyer of Evil, Lord of Meditation and Yoga',
                'image_url' => 'https://images.unsplash.com/photo-1616089309605-e356e72c57ea',
            ],
            [
                'name' => 'Krishna',
                'description' => 'God of Compassion, Tenderness, and Love',
                'image_url' => 'https://images.unsplash.com/photo-1627856013091-fed6e4e30025',
            ],
            [
                'name' => 'Durga',
                'description' => 'The Divine Mother, Protector of the Righteous',
                'image_url' => 'https://images.unsplash.com/photo-1590050752117-238cb0fb12b1',
            ],
            [
                'name' => 'Hanuman',
                'description' => 'Lord of Strength, Devotion, and Selfless Service',
                'image_url' => 'https://images.unsplash.com/photo-1617478728955-46a362bfcb43',
            ],
            [
                'name' => 'Lakshmi',
                'description' => 'Goddess of Wealth, Fortune, and Prosperity',
                'image_url' => 'https://images.unsplash.com/photo-1609137144983-a9d7cd17c603',
            ]
        ];

        foreach ($deities as $deity) {
            Deity::firstOrCreate(['name' => $deity['name']], $deity);
        }
    }
}
