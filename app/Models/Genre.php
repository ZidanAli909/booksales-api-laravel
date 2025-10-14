<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiction',
        ],
        [
            'id' => 2,
            'name' => 'Educational',
        ],
        [
            'id' => 3,
            'name' => 'Non-fiction',
        ],
        [
            'id' => 4,
            'name' => 'Komedi',
        ],
        [
            'id' => 5,
            'name' => 'Thriller',
        ],
    ];

    public function getGenres() {
        return $this->genres;
    }
}