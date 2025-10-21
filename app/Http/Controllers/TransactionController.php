<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $transaction = Transaction::with('user', 'book')->get();

        if ($transaction->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Transactions is empty.",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all transaction.",
            "data" => $transaction
        ], 200);
    }

    public function show() {

    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make(request()->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Error in form/request validation!",
                "errors" => $validator->errors()
            ], 422);
        }
        // End-of Validator

        // Verify User
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "No user detected!",
            ], 401);
        }

        // Verify Book (stock and existance)
        $book = Book::find($request->book_id);

        if ($book->stock < $request->quantity) {
            return response()->json([
                "success" => false,
                "message" => "Not enough stock(s)!",
            ], 400);
        }

        $totalAmount = $book->price * $request->quantity; // total_amount calculation

        $uniqueCode = "ORD-" . strtoupper(uniqid()); // order_number generator
        
        // Update book's stocks
        $book->stock -= $request->quantity;
        $book->save();

        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Transaction created successfully!",
            "data" => $transaction
        ], 201);
    }

    public function update() {

    }

    public function destroy() {

    }
}
