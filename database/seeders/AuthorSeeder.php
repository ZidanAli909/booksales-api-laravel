<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Leila Chudori'
        ]);
        Author::create([
            'name' => 'Om Jero'
        ]);
        Author::create([
            'name' => 'Mark Manson'
        ]);
        Author::create([
            'name' => 'Ferdiriva Hamzah'
        ]);
        Author::create([
            'name' => 'Tan Malaka'
        ]);
    }
}
