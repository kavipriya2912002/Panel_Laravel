<?php

namespace App\Http\Controllers;

use App\Models\Billpayment;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BillPaymentController extends Controller
{
    public function BillPay(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'amount' => 'required|numeric',
            'provider' => 'required|string',
            'operator_id' => 'required|numeric',
        ]);
    
        try {
            // Step 1: Get the logged-in user's ID
            $userId = Auth::id();
            Log::info('User ID: ' . $userId);
    
            // Step 2: Get the user's wallet balance
            $wallet = Wallet::where('user_id', $userId)->first();
            if (!$wallet) {
                return response()->json(['error' => 'Wallet not found'], 404);
            }
            Log::info('User Wallet Balance: ' . $wallet->balance);
    
            $amount = $request->input('amount');
    
            // Step 3: Validate wallet balance
            if ($wallet->balance < $amount) {
                return response()->json(['error' => 'Insufficient balance to proceed with Bill Payment, Add AMOUNT IN WALLET'], 400);
            }
    
            // Step 4: Deduct the amount from the wallet
            $wallet->balance -= $amount;
            $wallet->save();
            Log::info('Wallet balance after deduction: ' . $wallet->balance);
    
            // Step 5: Fetch the operator code from the database
            $operatorMapping = DB::table('billpayment')
                ->where('operator_id', $request->input('operator_id'))
                ->first();
    
            if (!$operatorMapping) {
                throw new \Exception('Invalid Operator ID.');
            }
    
            $operatorCode = $operatorMapping->value;
            Log::info("Operator code", ['operator_code' => $operatorCode]);
    
            // Step 6: Prepare the API request parameters
            $apiUrl = "https://Apibox.co.in/Api/Service/OnlineBillPay";
            $queryParams = [
                'Mode' => 'online', // Assuming 'online' as default mode, change if required
                'at' => env('API_TOKEN'), // Replace with actual token
                'op' => $operatorCode,
                'num' => $request->input('mobile_number'),
                'acno' => $request->input('account_number', ''), // Optional account number
                'acoth' => $request->input('account_other', ''), // Optional additional info
                'amt' => $amount,
                'rq' => uniqid(), // Unique request ID
                'ez1' => $request->input('ez1', ''), // Optional parameter 1
                'ez2' => $request->input('ez2', ''), // Optional parameter 2
                'ez3' => $request->input('ez3', ''), // Optional parameter 3
            ];
    
            // Step 7: Make the API call
            $response = Http::withoutVerifying()->get($apiUrl, $queryParams);
    
            // Step 8: Handle the API response
            if ($response->successful()) {
                $apiResponse = $response->json();
    
                if ($apiResponse['STATUS'] === 'SUCCESS') {
                    // Log and return success response
                    Log::info('Bill payment successful', ['api_response' => $apiResponse]);
                    return response()->json([
                        'message' => 'Bill Payment successful',
                        'data' => $apiResponse,
                    ], 200);
                } else {
                    // Handle failure response
                    Log::error('Bill payment failed', ['api_response' => $apiResponse]);
                    return response()->json([
                        'error' => $apiResponse['ERROR_MESSAGE'] ?? 'Bill Payment failed',
                    ], 400);
                }
            } else {
                // Handle API request failure
                Log::error('API request failed', ['response_status' => $response->status()]);
                return response()->json([
                    'error' => 'Failed to connect to the Bill Payment API',
                ], 500);
            }
        } catch (\Exception $e) {
            // Log unexpected exceptions
            Log::error('Bill payment failed: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    public function getBills()
    {
        $bills = Billpayment::all();
        Log::info($bills);
        return response()->json($bills);
    }
}
