<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Genres is empty.",
            ], 404);
        }
        
        return response()->json([
            "success" => true,
            "message" => "Get all genres.",
            "data" => $genres
        ], 200);
    }

    public function show(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "The targeted genre not found.",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get the targeted genre.",
            "data" => $genre
        ], 200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in form/request validation!",
                "errors" => $validator->errors()
            ], 400);
        }
        // End-of Validator

        $newgenre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            "success" => true,
            "message" => "A genre created successfully.",
            'data' => $newgenre
        ], 201);
    }

    public function update(string $id, Request $request) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "The targeted genre not found.",
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in form/request validation!",
                "errors" => $validator->errors()
            ], 400);
        }
        // End-of Validator

        $newgenre = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $genre->update($newgenre);

        return response()->json([
            "success" => true,
            "message" => "A genre updated successfully.",
            'data' => $genre
        ], 200);
    }

    public function destroy(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "The targeted genre not found.",
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "A genre deleted successfully!",
        ], 200);
    }
}