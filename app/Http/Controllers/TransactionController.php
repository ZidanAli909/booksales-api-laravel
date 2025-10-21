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

    public function show(string $id) {
        $transaction = Transaction::with('user', 'book')->find($id);

        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "The targeted transaction not found.",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all transaction.",
            "data" => $transaction
        ], 200);
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

    public function update(Request $request, string $id) {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "The targeted transaction not found.",
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
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

        $oldBook = Book::find($transaction->book_id);

        // Calculating quantity, since the migration doesn't have quantity field
        $oldQuantity = (int) round($transaction->total_amount / $oldBook->price); // total_amount / price, TODO: integer validator
        $oldBook->stock += $oldQuantity;
        $oldBook->save();

        // Verify new book (stock and existance, if different)
        $book = Book::find($request->book_id);

        if ($book->stock < $request->quantity) {
            // Restoring book stock (since the new one fails)
            $oldBook->stock -= $oldQuantity;
            $oldBook->save();

            return response()->json([
                "success" => false,
                "message" => "Not enough stock(s)!",
            ], 400);
        }

        // Redoing book stocks
        $book->stock -= $request->quantity;
        $book->save();

        $totalAmount = $book->price * $request->quantity; // total_amount recalculation

        $newTransaction = [
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ];

        $transaction->update($newTransaction);

        return response()->json([
            "success" => true,
            "message" => "Transaction updated successfully!",
            "data" => $transaction
        ], 200);
    }

    public function destroy(string $id) {
        // Is this cancelling or just erasing? For this function, it's for the latter...
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "The targeted transaction not found.",
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            "success" => true,
            "message" => "Transaction deleted successfully!",
        ], 200);
    }
}
