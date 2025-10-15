<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 40000.00,
            'stock' => 15
        ]);
        Book::create([
            'title' => 'Buku Wangsit Om Jero TPS UTBK SNBT 2026',
            'description' => 'Buku yang membahas soal-soal TPS untuk UTBK SNBT 2026.',
            'price' => 100000.00,
            'stock' => 10
        ]);
        Book::create([
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seorang.',
            'price' => 25000.00,
            'stock' => 5
        ]);
        Book::create([
            'title' => 'Cado Cado Kuadrat: Dokter Muda Serba Salah',
            'description' => 'Buku yang menceritakan pengalaman mahasiswa kuliahan kedokteran.',
            'price' => 60000.00,
            'stock' => 20
        ]);
        Book::create([
            'title' => 'Madilog',
            'description' => 'Sintesis filosofis antara materialisme, dialektika, dan logika.',
            'price' => 30000.00,
            'stock' => 3
        ]);
    }
}
