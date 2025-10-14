<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $data = new Genre();
        $genres = $data->getGenres();

        return view('genres', ['genres' => $genres]);
    }
}