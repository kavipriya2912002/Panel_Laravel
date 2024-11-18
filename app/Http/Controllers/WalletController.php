<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
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
    
}
