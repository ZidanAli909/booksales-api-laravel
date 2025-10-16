<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 40000.00,
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ],
        [
            'title' => 'Buku Wangsit Om Jero TPS UTBK SNBT 2026',
            'description' => 'Buku yang membahas soal-soal TPS untuk UTBK SNBT 2026.',
            'price' => 100000.00,
            'stock' => 10,
            'cover_photo' => 'wangsit-tps-utbk-snbt-2026.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ],
        [
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seorang.',
            'price' => 25000.00,
            'stock' => 5,
            'cover_photo' => 'sebuah-seni-untuk-bersikap-bodo-amat.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ],
        [
            'title' => 'Cado Cado Kuadrat: Dokter Muda Serba Salah',
            'description' => 'Buku yang menceritakan pengalaman mahasiswa kuliahan kedokteran.',
            'price' => 60000.00,
            'stock' => 20,
            'cover_photo' => 'cado-cado-kuadrat.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ],
        [
            'title' => 'Madilog',
            'description' => 'Sintesis filosofis antara materialisme, dialektika, dan logika.',
            'price' => 30000.00,
            'stock' => 3,
            'cover_photo' => 'madilog.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ],
    ];

    public function getBooks() {
        return $this->books;
    }
}