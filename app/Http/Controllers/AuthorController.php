<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $data = new Author();
        $authors = $data->getAuthors();

        return view('authors', ['authors' => $authors]);
    }
}