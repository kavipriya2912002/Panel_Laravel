<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ElectricityController extends Controller
{
    public function PayElectricity(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'mobile_number' => 'required', // Removed digits:10 as service numbers vary
        'amount' => 'required|numeric|min:1',
        'provider' => 'required|string',
        'operator_id' => 'required',
    ]);

    // Fetch operator mapping from the database
    $operatorMapping = DB::table('sp_operator_mapping')
        ->where('operator_id', $request->input('operator_id'))
        ->first();

    if (!$operatorMapping) {
        return response()->json([
            'STATUS' => 0,
            'ERROR_MESSAGE' => 'Invalid Operator ID.',
        ], 400);
    }

    $operatorCode = $operatorMapping->value;
    Log::info("Operator code", ['operator_code' => $operatorCode]);

    try {
        // Construct query parameters
        $queryParams = [
            'Mode' => 'online', // Adjust as required: online/offline/bbps
            'at' => env('API_TOKEN'), // Replace with the actual token
            'op' => $operatorCode, // Use operator ID
            'num' => $validatedData['mobile_number'], // Phone number
            'acno' => '', // Account number if applicable
            'acoth' => '', // Other account details
            'amt' => $validatedData['amount'], // Amount to be paid
            'rq' => uniqid(), // Unique request ID
            'ez1' => '', // Optional fields
            'ez2' => '',
            'ez3' => '',
        ];

        // Log the constructed URL and query parameters
        $apiUrl = 'https://Apibox.co.in/Api/Service/OnlineBillPay';
        Log::info('API Request', ['url' => $apiUrl, 'params' => $queryParams]);

        // Make the GET request to the external API
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_TOKEN'),
            'Accept' => 'application/json',
        ])->get($apiUrl, $queryParams);
        

        // Handle response from the external API
        if ($apiResponse->successful()) {
            $responseBody = $apiResponse->json();

            if (isset($responseBody['STATUS']) && $responseBody['STATUS'] === 1) {
                return response()->json([
                    'STATUS' => 1,
                    'MESSAGE' => $responseBody['MESSAGE'],
                    'REQUESTTXNID' => $responseBody['REQUESTTXNID'] ?? '',
                    'TXNNO' => $responseBody['TXNNO'] ?? '',
                ]);
            } else {
                return response()->json([
                    'STATUS' => 0,
                    'ERROR_MESSAGE' => $responseBody['ERROR_MESSAGE'] ?? 'Payment failed.',
                ], 400);
            }
        } else {
            return response()->json([
                'STATUS' => 0,
                'ERROR_MESSAGE' => 'Failed to connect to the payment API.',
            ], 500);
        }
    } catch (\Exception $e) {
        // Log the exception details
        Log::error('Error in PayElectricity', ['error' => $e->getMessage()]);

        return response()->json([
            'STATUS' => 0,
            'ERROR_MESSAGE' => 'An error occurred while processing the request.',
            'DETAILS' => $e->getMessage(),
        ], 500);
    }
}

}
