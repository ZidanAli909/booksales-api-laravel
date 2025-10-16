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
            'name' => 'Leila Chudori',
            'photo' => 'leila-chudori.jpg',
            'bio' => 'Penulis, jurnalis, dan kritikus film terkemuka asal Indonesia. Ia dikenal karena karyanya yang sering kali mengangkat isu-isu sejarah dan politik Indonesia.'
        ]);
        Author::create([
            'name' => 'Om Jero',
            'photo' => 'om-jero.jpg',
            'bio' => 'Kreator dan penyusun buku bimbingan belajar "Wangsit" untuk SNBT (SBMPTN) yang sangat populer di kalangan pelajar SMA di Indonesia.'
        ]);
        Author::create([
            'name' => 'Mark Manson',
            'photo' => 'mark-manson.jpg',
            'bio' => 'Penulis, narablog, dan veteran pengembangan diri asal Amerika yang dikenal karena pendekatan motivasi yang inkonvensional, pragmatis, dan blak-blakan.'
        ]);
        Author::create([
            'name' => 'Ferdiriva Hamzah',
            'photo' => 'ferdiriva-hamzah.jpg',
            'bio' => 'Dokter spesialis mata (retina) sekaligus penulis novel yang dikenal lewat karya trilogi buku komedi populer, Cado-Cado (Catatan Dodol Calon Dokter).'

        ]);
        Author::create([
            'name' => 'Tan Malaka',
            'photo' => 'tan-malaka.jpg',
            'bio' => 'Seorang pejuang kemerdekaan, politikus, dan pemikir yang berperan besar dalam sejarah Indonesia.'
        ]);
    }
}
