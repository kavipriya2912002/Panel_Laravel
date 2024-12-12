<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Services\ServiceProviderFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RechargesController extends Controller
{
    public function recharge(Request $request)
{
    $request->validate([
        'mobile_number' => 'required',
        'amount' => 'required|numeric',
        'provider' => 'required|string', // e.g., 'airtel', 'vodafone'
        'operator_id' => 'required|numeric',
    ]);
    

    try {
        // Step 1: Get the logged-in user's ID
        $userId = Auth::id();
        Log::info('User ID: ' . $userId);

        // Step 2: Get the user's wallet balance
        $wallet = Wallet::where('user_id', $userId)->first();
        Log::info('User Wallet Balance: ' . $wallet->balance);

        $amount=$request->input('amount');
        // Step 3: Validate wallet balance before proceeding with recharge
        if ($wallet->balance < $request->input('amount')) {
            return response()->json(['error' => 'Insufficient balance to proceed with recharge, Add AMOUNT IN WALLET'], 400);
        }



        $wallet->balance -= $amount;
        $wallet->save();

        Log::info('Wallet balance after deduction: ' . $wallet->balance);
        // Step 4: Fetch the operator code from the database
        $operatorMapping = DB::table('sp_operator_mapping')
            ->where('operator_id', $request->input('operator_id'))
            ->first();

        if (!$operatorMapping) {
            throw new \Exception('Invalid Operator ID.');
        }

        $operatorCode = $operatorMapping->value; // Assuming column name is 'operator_code'
        Log::info("Operator code", ['operator_code' => $operatorCode]);

        // Step 5: Prepare the request data
        $data = [
            'mobile_number' => $request->input('mobile_number'),
            'amount' => $request->input('amount'),
            'operator_code' => $operatorCode,
        ];

        // Step 6: Get the service provider instance
        $service = ServiceProviderFactory::make($request->input('provider'));

        // Step 7: Perform the recharge using the external API
        $apiResponse = $service->recharge([
            'mobile_number' => $data['mobile_number'],
            'amount' => $data['amount'],
            'operator_code' => $data['operator_code'],
        ]);

        // Step 8: Return the API response
        return response()->json($apiResponse);

    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Recharge failed: ' . $e->getMessage());

        // Handle errors and return a JSON response
        return response()->json(['error' => $e->getMessage()], 400);
    }
}

public function getStatus(Request $request)
{
    $request->validate([
        'transaction_id' => 'required|string',
        'provider' => 'required|string',
    ]);

    try {
        $service = ServiceProviderFactory::make($request->input('provider'));

        // Call the appropriate provider service
        $response = $service->getStatus($request->input('transaction_id'));

        return response()->json($response);
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error fetching status: ' . $e->getMessage());

        return response()->json(['error' => 'Unable to fetch status. Please try again later.'], 400);
    }
}



}


  