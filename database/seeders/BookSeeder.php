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
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);
        Book::create([
            'title' => 'Buku Wangsit Om Jero TPS UTBK SNBT 2026',
            'description' => 'Buku yang membahas soal-soal TPS untuk UTBK SNBT 2026.',
            'price' => 100000.00,
            'stock' => 10,
            'cover_photo' => 'wangsit-tps-utbk-snbt-2026.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seorang.',
            'price' => 25000.00,
            'stock' => 5,
            'cover_photo' => 'sebuah-seni-untuk-bersikap-bodo-amat.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);
        Book::create([
            'title' => 'Cado Cado Kuadrat: Dokter Muda Serba Salah',
            'description' => 'Buku yang menceritakan pengalaman mahasiswa kuliahan kedokteran.',
            'price' => 60000.00,
            'stock' => 20,
            'cover_photo' => 'cado-cado-kuadrat.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);
        Book::create([
            'title' => 'Madilog',
            'description' => 'Sintesis filosofis antara materialisme, dialektika, dan logika.',
            'price' => 30000.00,
            'stock' => 3,
            'cover_photo' => 'madilog.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
