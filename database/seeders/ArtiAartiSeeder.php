<?php

namespace Database\Seeders;

use App\Models\Arti\Aarti;
use App\Models\Arti\Deity;
use Illuminate\Database\Seeder;

class ArtiAartiSeeder extends Seeder
{
    public function run(): void
    {
        $ganesha = Deity::where('name', 'Ganesha')->first();
        $shiva = Deity::where('name', 'Shiva')->first();
        $hanuman = Deity::where('name', 'Hanuman')->first();
        $lakshmi = Deity::where('name', 'Lakshmi')->first();

        $aartis = [
            [
                'deity_id' => $ganesha->id,
                'title' => 'Shree Ganesh Aarti',
                'subtitle' => 'Sukh Karta Dukh Harta',
                'category' => 'Popular',
                'duration' => '03:15',
                'audio_url' => 'https://example.com/audio/ganesh_aarti.mp3',
                'video_url' => 'y25k2S9n_4Y',
                'lyrics' => [
                    ['timestamp' => 0, 'text' => 'Sukhkarta Dukhharta Varta Vighnachi'],
                    ['timestamp' => 10, 'text' => 'Nurvi Purvi Prem Krupa Jayachi'],
                    ['timestamp' => 20, 'text' => 'Sarvangi Sundar Uti Shendurachi'],
                    ['timestamp' => 30, 'text' => 'Kanthi Jhalke Mal Muktaphalaanchi'],
                    ['timestamp' => 40, 'text' => 'Jai Dev Jai Dev Jai Mangal Murti']
                ]
            ],
            [
                'deity_id' => $shiva->id,
                'title' => 'Shiv Aarti',
                'subtitle' => 'Om Jai Shiv Omkara',
                'category' => 'Popular',
                'duration' => '04:30',
                'audio_url' => 'https://example.com/audio/shiv_aarti.mp3',
                'video_url' => 'https://www.youtube.com/watch?v=FPyUvMccu7A',
                'lyrics' => [
                    ['timestamp' => 0, 'text' => 'Om Jai Shiv Omkara, Swami Jai Shiv Omkara'],
                    ['timestamp' => 15, 'text' => 'Brahma Vishnu Sadashiv Ardhangi Dhara'],
                    ['timestamp' => 30, 'text' => 'Ekanan Chaturanan Panchanan Raje'],
                    ['timestamp' => 45, 'text' => 'Hansanan Garudasan Vrishbahan Saje']
                ]
            ],
            [
                'deity_id' => $hanuman->id,
                'title' => 'Hanuman Chalisa',
                'subtitle' => 'Shree Guru Charan Saroj Raj',
                'category' => 'Morning',
                'duration' => '09:45',
                'audio_url' => 'https://example.com/audio/hanuman_chalisa.mp3',
                'video_url' => 'https://www.youtube.com/watch?v=AETFvQonfV8',
                'lyrics' => [
                    ['timestamp' => 0, 'text' => 'Shree Guru Charan Saroj Raj, Nij Man Mukut Sudhaar'],
                    ['timestamp' => 15, 'text' => 'Barnau Raghuvar Bimal Jasu, Jo Dayaku Phal Chaar'],
                    ['timestamp' => 30, 'text' => 'Budhiheen Tanu Janike, Sumirau Pawan Kumar'],
                    ['timestamp' => 45, 'text' => 'Bal Budhi Vidya Dehu Mohi, Harahu Kalesh Bikaar']
                ]
            ],
            [
                'deity_id' => $lakshmi->id,
                'title' => 'Lakshmi Mata Aarti',
                'subtitle' => 'Om Jai Lakshmi Mata',
                'category' => 'Evening',
                'duration' => '05:10',
                'audio_url' => 'https://example.com/audio/lakshmi_aarti.mp3',
                'video_url' => 'https://www.youtube.com/watch?v=LpZtB2t0tOM',
                'lyrics' => [
                    ['timestamp' => 0, 'text' => 'Om Jai Lakshmi Mata, Maiya Jai Lakshmi Mata'],
                    ['timestamp' => 15, 'text' => 'Tumko Nishdin Dhyavat, Har Vishnu Vidhata'],
                    ['timestamp' => 30, 'text' => 'Uma Rama Brahmani, Tum Hi Jag Mata'],
                    ['timestamp' => 45, 'text' => 'Surya Chandrama Dhyavat, Naarad Rishi Gata']
                ]
            ]
        ];

        foreach ($aartis as $aarti) {
            Aarti::firstOrCreate(['title' => $aarti['title']], $aarti);
        }
    }
}
