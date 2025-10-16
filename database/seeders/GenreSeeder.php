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
            'name' => 'Fiksi',
            'description' => 'Genre yang menekankan pada cerita fiksi dan fantasi.'
        ]);
        Genre::create([
            'name' => 'Edukasi',
            'description' => 'Genre yang menekankan pada ilmu pengetahuan dan pendidikan.'
        ]);
        Genre::create([
            'name' => 'Self-help',
            'description' => 'Genre yang menekankan pada motivasi, kekuatan diri, dan peningkatan keterampilan.'
        ]);
        Genre::create([
            'name' => 'Comedy',
            'description' => 'Genre yang menekankan pada humor dan hiburan.'
        ]);
        Genre::create([
            'name' => 'Filosofis',
            'description' => 'Genre yang menekankan pada ilmu pengetahuan dan filosofi.'
        ]);
    }
}
