<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    // Create a transaction
    public function createTransaction($data)
    {
        return Transaction::create($data);
    }

    // Get transaction details
    public function getTransaction($transactionId)
    {
        $transaction = Transaction::where('transaction_id', $transactionId)->firstOrFail();
        return response()->json($transaction);
    }

    // List transactions for a user
    public function listTransactions($userId)
    {
        $transactions = Transaction::where('wallet_id', $userId)->get();
        return response()->json($transactions);
    }
}
