<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    try {
        // Construct the query parameters
        $queryParams = [
            'Mode' => 'online', // Adjust as required: online/offline/bbps
            'at' => 'your_token_here', // Replace with the actual token
            'op' => $validatedData['operator_id'], // Use operator ID
            'num' => $validatedData['mobile_number'], // Phone number
            'acno' => '', // Account number if applicable
            'acoth' => '', // Other account details
            'amt' => $validatedData['amount'], // Amount to be paid
            'rq' => uniqid(), // Unique request ID
            'ez1' => '', // Optional fields
            'ez2' => '',
            'ez3' => '',
        ];

        // Make the GET request to the external API
        $apiUrl = 'https://Apibox.co.in/Api/Service/OnlineBillPay';
        $apiResponse = Http::get($apiUrl, $queryParams);

        // Handle response from the external API
        if ($apiResponse->successful()) {
            $responseBody = $apiResponse->json();

            if (isset($responseBody['STATUS']) && $responseBody['STATUS'] === 1) {
                return response()->json([
                    'STATUS' => 1,
                    'MESSAGE' => $responseBody['MESSAGE'],
                    'REQUESTTXNID' => $responseBody['REQUESTTXNID'],
                    'TXNNO' => $responseBody['TXNNO'],
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
        return response()->json([
            'STATUS' => 0,
            'ERROR_MESSAGE' => 'An error occurred while processing the request.',
            'DETAILS' => $e->getMessage(),
        ], 500);
    }
}

}
