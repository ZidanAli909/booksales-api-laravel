<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Genre yang menekankan pada cerita fiksi dan fantasi.'
        ],
        [
            'id' => 2,
            'name' => 'Edukasi',
            'description' => 'Genre yang menekankan pada ilmu pengetahuan dan pendidikan.'
        ],
        [
            'id' => 3,
            'name' => 'Self-help',
            'description' => 'Genre yang menekankan pada motivasi, kekuatan diri, dan peningkatan keterampilan.'
        ],
        [
            'id' => 4,
            'name' => 'Comedy',
            'description' => 'Genre yang menekankan pada humor dan hiburan.'
        ],
        [
            'id' => 5,
            'name' => 'Filosofis',
            'description' => 'Genre yang menekankan pada ilmu pengetahuan dan filosofi.'
        ],
    ];

    public function getGenres() {
        return $this->genres;
    }
}