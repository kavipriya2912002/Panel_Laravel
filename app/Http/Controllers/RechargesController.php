<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Recharge;
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
}
