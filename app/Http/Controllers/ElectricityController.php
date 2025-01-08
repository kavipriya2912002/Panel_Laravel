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
            'mobile_number' => 'required|digits:10',
            'amount' => 'required|numeric|min:1',
            'provider' => 'required|string',
            'operator_id' => 'required',
        ]);

        try {
            // API call to the bill payment provider (mocking the API call here)
            $apiResponse = Http::post('https://api.billprovider.com/pay', [
                'mobile_number' => $validatedData['mobile_number'],
                'amount' => $validatedData['amount'],
                'provider' => $validatedData['provider'],
                'operator_id' => $validatedData['operator_id'],
            ]);

            // Handle response from the external API
            if ($apiResponse->successful()) {
                $responseBody = $apiResponse->json();

                // Example response handling
                if ($responseBody['STATUS'] === 1) {
                    return response()->json([
                        'STATUS' => 1,
                        'MESSAGE' => $responseBody['MESSAGE'],
                        'REQUESTTXNID' => $responseBody['REQUESTTXNID'],
                        'TXNNO' => $responseBody['TXNNO'],
                    ]);
                } else {
                    return response()->json([
                        'STATUS' => 0,
                        'ERROR_MASSAGE' => $responseBody['ERROR_MASSAGE'] ?? 'Payment failed.',
                    ], 400);
                }
            } else {
                return response()->json([
                    'STATUS' => 0,
                    'ERROR_MASSAGE' => 'Failed to connect to the payment API.',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'STATUS' => 0,
                'ERROR_MASSAGE' => 'An error occurred while processing the request.',
                'DETAILS' => $e->getMessage(),
            ], 500);
        }
    }
}
