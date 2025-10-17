<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "No books found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all books",
            "data" => $books
        ], 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:128',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in validation",
                "errors" => $validator->errors()
            ], 400);
        }

        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        $newbook = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id
        ]);

        return response()->json([
            "success" => true,
            "message" => "Book created successfully",
            'data' => $newbook
        ], 201);
    }

    public function show(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Book not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $book
        ], 200);
    }

    public function update(string $id, Request $request) {
        $book = Book::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:128',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Book not found",
            ], 404);
        }

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in validation",
                "errors" => $validator->errors()
            ], 422);
        }

        $newbook = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id
        ];

        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $image->store('books', 'public');

            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $newbook['cover_photo'] = $image->hashName();
        }

        $book->update($newbook);

        return response()->json([
            "success" => true,
            "message" => "Book updated successfully",
            "data" => $book
        ], 200);
    }

    public function destroy(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Book not found",
            ], 404);
        }

        if ($book->cover_photo) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();

        return response()->json([
            "success" => true,
            "message" => "Book deleted successfully",
        ], 200);
    }
}