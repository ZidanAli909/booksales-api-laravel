<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang menekankan pada adegan aksi, pertempuran, dan kecepatan.'
        ]);
        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang menekankan pada hubungan romantis dan cinta.'
        ]);
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre yang mengeksplorasi imajinasi dan dunia yang tidak nyata.'
        ]);
        Genre::create([
            'name' => 'Comedy',
            'description' => 'Genre yang menekankan pada humor dan hiburan.'
        ]);
        Genre::create([
            'name' => 'Educational',
            'description' => 'Genre yang menekankan pada ilmu pengetahuan dan pendidikan.'
        ]);
        Genre::create([
            'name' => 'Drama',
            'description' => 'Genre yang menekankan pada kehidupan dan perasaan.'
        ]);
    }
}
