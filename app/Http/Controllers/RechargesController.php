<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Recharge;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RechargesController extends Controller
{
    public function initiateRecharge(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|digits:10',
            'operator_id' => 'required|exists:operators,id',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $user = auth()->user();
        $plan = Plan::findOrFail($request->plan_id);

        // Check wallet balance
        if ($user->wallet->balance < $plan->amount) {
            return response()->json(['error' => 'Insufficient wallet balance'], 400);
        }

        // Deduct amount
        $user->wallet->balance -= $plan->amount;
        $user->wallet->save();

        // Call operator API
        $response = Http::post('https://operator-api.example.com/recharge', [
            'mobile' => $request->mobile_number,
            'operator' => $request->operator_id,
            'amount' => $plan->amount,
        ]);

        if ($response->successful()) {
            $recharge = Recharge::create([
                'user_id' => $user->id,
                'operator_id' => $request->operator_id,
                'plan_id' => $request->plan_id,
                'status' => 'success',
                'transaction_id' => $response->json('transaction_id'),
            ]);

            return response()->json(['success' => 'Recharge successful', 'recharge' => $recharge]);
        } else {
            // Handle API failure
            return response()->json(['error' => 'Recharge failed. Please try again.'], 500);
        }
    }


    // Initiate a recharge
    public function initiateRecharges(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'operator_id' => 'required|exists:operators,id',
            'phone_number' => 'required|digits:10',
            'amount' => 'required|numeric|min:1',
        ]);

        $wallet = Wallet::where('user_id', $request->user_id)->first();
        if ($wallet->balance < $request->amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        // Deduct the amount
        $wallet->balance -= $request->amount;
        $wallet->save();

        // Call operator API (mock)
        $operatorApiResponse = [
            'transaction_id' => 'TXN' . rand(1000, 9999),
            'status' => 'success',
        ];

        // Save recharge details
        $recharge = Recharge::create([
            'user_id' => $request->user_id,
            'operator_id' => $request->operator_id,
            'amount' => $request->amount,
            'phone_number' => $request->phone_number,
            'status' => $operatorApiResponse['status'],
            'transaction_id' => $operatorApiResponse['transaction_id'],
        ]);

        return response()->json($recharge);
    }

    // Check recharge status
    public function checkStatus($transactionId)
    {
        $recharge = Recharge::where('transaction_id', $transactionId)->firstOrFail();

        // Mock status update
        $recharge->status = 'success';
        $recharge->save();

        return response()->json(['status' => $recharge->status]);
    }

    // Retry a failed recharge
    public function retryRecharge($transactionId)
    {
        $recharge = Recharge::where('transaction_id', $transactionId)->firstOrFail();

        if ($recharge->status !== 'failed') {
            return response()->json(['error' => 'Recharge cannot be retried'], 400);
        }

        // Mock retry
        $recharge->status = 'success';
        $recharge->save();

        return response()->json(['message' => 'Recharge retried successfully']);
    }
}
