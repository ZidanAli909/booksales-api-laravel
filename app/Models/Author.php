<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Leila Chudori',
        ],
        [
            'id' => 2,
            'name' => 'Om Jero',
        ],
        [
            'id' => 3,
            'name' => 'Mark Manson',
        ],
        [
            'id' => 4,
            'name' => 'Ferdiriva Hamzah',
        ],
        [
            'id' => 5,
            'name' => 'Tan Malaka',
        ],
    ];

    public function getAuthors() {
        return $this->authors;
    }
}