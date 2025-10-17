<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        
        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Authors is empty.",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all authors.",
            "data" => $authors
        ], 200);
    }

    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "The targeted author not found.",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get the targeted author.",
            "data" => $author
        ], 200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in form/request validation!",
                "errors" => $validator->errors()
            ], 400);
        }
        // End-of Validator

        $image = $request->file('photo');
        $image->store('authors', 'public');

        $newauthor = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio
        ]);

        return response()->json([
            "success" => true,
            "message" => "An author created successfully!",
            'data' => $newauthor
        ], 201);
    }

    public function update(string $id, Request $request) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "The targeted author not found.",
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in form/request validation!",
                "errors" => $validator->errors()
            ], 400);
        }
        // End-of Validator

        $newauthor = [
            'name' => $request->name,
            'bio' => $request->bio
        ];
        
        // Photo replacement (if exist)
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $newauthor['photo'] = $image->hashName();
        }

        $author->update($newauthor);

        return response()->json([
            "success" => true,
            "message" => "An author updated successfully!",
            'data' => $author
        ], 200);
    }

    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "The targeted author not found.",
            ], 404);
        }

        // Delete photo file from storage
        if ($author->photo) Storage::disk('public')->delete('authors/' . $author->photo);

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "An author deleted successfully!",
        ], 200);
    }
}