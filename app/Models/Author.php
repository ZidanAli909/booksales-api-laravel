<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Leila Chudori',
            'photo' => 'leila-chudori.jpg',
            'bio' => 'Penulis, jurnalis, dan kritikus film terkemuka asal Indonesia. Ia dikenal karena karyanya yang sering kali mengangkat isu-isu sejarah dan politik Indonesia.'
        ],
        [
            'id' => 2,
            'name' => 'Om Jero',
            'photo' => 'om-jero.jpg',
            'bio' => 'Kreator dan penyusun buku bimbingan belajar "Wangsit" untuk SNBT (SBMPTN) yang sangat populer di kalangan pelajar SMA di Indonesia.'
        ],
        [
            'id' => 3,
            'name' => 'Mark Manson',
            'photo' => 'mark-manson.jpg',
            'bio' => 'Penulis, narablog, dan veteran pengembangan diri asal Amerika yang dikenal karena pendekatan motivasi yang inkonvensional, pragmatis, dan blak-blakan.'
        ],
        [
            'id' => 4,
            'name' => 'Ferdiriva Hamzah',
            'photo' => 'ferdiriva-hamzah.jpg',
            'bio' => 'Dokter spesialis mata (retina) sekaligus penulis novel yang dikenal lewat karya trilogi buku komedi populer, Cado-Cado (Catatan Dodol Calon Dokter).'
        ],
        [
            'id' => 5,
            'name' => 'Tan Malaka',
            'photo' => 'tan-malaka.jpg',
            'bio' => 'Seorang pejuang kemerdekaan, politikus, dan pemikir yang berperan besar dalam sejarah Indonesia.'
        ],
    ];

    public function getAuthors() {
        return $this->authors;
    }
}