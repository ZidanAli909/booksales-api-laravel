<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $data = new Book();
        $books = $data->getBooks();

        return view('books', ['books' => $books]);
    }
}