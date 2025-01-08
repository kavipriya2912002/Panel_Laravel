<?php

namespace App\Http\Controllers;

use App\Models\AllTransaction;
use App\Models\Wallet;
use App\Services\ServiceProviderFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RechargesController extends Controller
{
    public function recharge(Request $request)
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
        Log::info('User Wallet Balance: ' . $wallet->balance);

        $amount = $request->input('amount');

        // Step 3: Validate wallet balance before proceeding with recharge
        if ($wallet->balance < $amount) {
            return response()->json(['error' => 'Insufficient balance to proceed with recharge, Add AMOUNT IN WALLET'], 400);
        }

        // Step 4: Deduct the amount from the wallet
        $wallet->balance -= $amount;
        $wallet->save();
        Log::info('Wallet balance after deduction: ' . $wallet->balance);

        // Step 5: Fetch the operator code from the database
        $operatorMapping = DB::table('sp_operator_mapping')
            ->where('operator_id', $request->input('operator_id'))
            ->first();

        if (!$operatorMapping) {
            throw new \Exception('Invalid Operator ID.');
        }

        $operatorCode = $operatorMapping->value;
        Log::info("Operator code", ['operator_code' => $operatorCode]);

        // Step 6: Prepare the request data
        $data = [
            'mobile_number' => $request->input('mobile_number'),
            'amount' => $amount,
            'operator_code' => $operatorCode,
        ];

        // Step 7: Get the service provider instance
        $service = ServiceProviderFactory::make($request->input('provider'));
        Log::info("service", ['service' => $service]);

        // Step 8: Perform the recharge using the external API
        $apiResponse = $service->recharge([
            'mobile_number' => $data['mobile_number'],
            'amount' => $data['amount'],
            'operator_code' => $data['operator_code'],
        ]);

        Log::info("apiResponse", ['apiResponse' => $apiResponse]);

        // Step 9: Store the transaction in `alltransactions` table
        $transactionData = [
            'transaction_type' => 'recharge',
            'transaction_id' => $apiResponse['REQUESTTXNID'] ?? 0,
            'datetime' => now(),
            'user_id' => $userId,
            'status' => $apiResponse['STATUS'] == 1 ? 'success' : 'failed',
            'amount' => $amount,
            'operator_txn_id' => $apiResponse['OPTXNID'] ?? null,
        ];
        AllTransaction::create($transactionData);

        // Step 10: Handle API response status
        if ($apiResponse['STATUS'] == 3) { // Failure case
            // Refund the amount back to the wallet
            $wallet->balance += $amount;
            $wallet->save();
            Log::info('Refunded amount to wallet. New balance: ' . $wallet->balance);

            // Return the failure response
            return response()->json([
                'apiResponse' => [
                    'STATUS' => 3,
                    'MESSAGE' => $apiResponse['MESSAGE'] ?? 'Request failed!',
                    'ERROR_MASSAGE' => $apiResponse['ERROR_MASSAGE'] ?? 'Unknown error',
                    'ERRORCODE' => $apiResponse['ERRORCODE'] ?? '38',
                    'REQUESTTXNID' => $apiResponse['REQUESTTXNID'] ?? 'txn_unknown',
                    'HTTPCODE' => 200
                ]
            ], 400);
        }

        // Step 11: Return the successful API response
        return response()->json([
            'apiResponse' => $apiResponse
        ]);

    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Recharge failed: ' . $e->getMessage());

        // Store the failed transaction in the `alltransactions` table
        AllTransaction::create([
            'transaction_type' => 'recharge',
            'transaction_id' => 0,
            'datetime' => now(),
            'user_id' => Auth::id(),
            'status' => 'failed',
            'amount' => $request->input('amount'),
        ]);

        // Handle any unexpected exceptions
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


  