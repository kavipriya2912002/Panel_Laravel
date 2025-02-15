<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class WalletController extends Controller
{
    public function addMoney(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
    
        $userId = Auth::id();
    
        // Check if user is authenticated
        if (!$userId) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    
        // Debugging to see user ID
        Log::info('User ID: ' . $userId);
    
        // Find or create wallet for the user
        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );
    
        // Debugging wallet after creation
        Log::info('Wallet: ', $wallet->toArray());
    
        // Update the balance
        $wallet->balance += $request->amount;
        $wallet->save();
    
        // Return response with the updated wallet
        return response()->json([
            'message' => 'Money added successfully to your wallet.',
            'wallet' => $wallet->balance,
        ]);
    }



    public function AddMoneyToUser(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'userId' => 'required|exists:users,id', // Ensure the user exists
            'amount' => 'required|numeric|min:1', // Ensure amount is a positive number
        ]);
    
        $userId = $validatedData['userId'];
        $amount = $validatedData['amount'];
    
        // Check if the user has a wallet entry
        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId], // Search by user_id
            ['balance' => 0]        // Default balance if no entry exists
        );
    
        // Update the wallet balance
        $wallet->balance += $amount;
        $wallet->save();
    
        // Create an entry in wallet history
        WalletHistory::create([
            'wallet_id' => $wallet->id,
            'admin_id' => Auth::id(), // Assuming the admin is logged in
            'amount' => $amount,
        ]);
    
        // Return a response with the updated wallet balance
        return response()->json([
            'message' => 'Amount added to wallet successfully!',
            'wallet' => $wallet->balance,
        ]);
    }



    public function getWalletAmount()
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    // Retrieve the user's wallet
    $wallet = Wallet::where('user_id', $userId)->first();

    // Check if the wallet exists
    if (!$wallet) {
        return response()->json(['error' => 'Wallet not found'], 404);
    }

    // Return the wallet balance
    return response()->json([
        'balance' => $wallet->balance,
    ], 200);
}

    
}
