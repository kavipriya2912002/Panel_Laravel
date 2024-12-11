<?php

namespace App\Http\Controllers;


use App\Services\ServiceProviderFactory;
use Illuminate\Http\Request;
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
            // Fetch the operator code from the database
            $operatorMapping = DB::table('sp_operator_mapping')
                ->where('operator_id', $request->input('operator_id'))
                ->first();
    
            if (!$operatorMapping) {
                throw new \Exception('Invalid Operator ID.');
            }
    
            $operatorCode = $operatorMapping->value; // Assuming column name is 'operator_code'
            Log::info("Operator code", ['operator_code' => $operatorCode]);
    
            // Prepare the request data
            $data = [
                'mobile_number' => $request->input('mobile_number'),
                'amount' => $request->input('amount'),
                'operator_code' => $operatorCode,
            ];
    
            // Get the service provider instance
            $service = ServiceProviderFactory::make($request->input('provider'));
    
            // Perform the recharge using the external API
            $apiResponse = $service->recharge([
                'mobile_number' => $data['mobile_number'],
                'amount' => $data['amount'],
                'operator_code' => $data['operator_code'],
            ]);
    
            // Return the API response
            return response()->json($apiResponse);
        } catch (\Exception $e) {
            // Handle errors and return a JSON response
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
}


//     public function getStatus(Request $request)
//     {
//         $request->validate([
//             'transaction_id' => 'required',
//             'provider' => 'required|string',
//         ]);

//         try {
//             $service = ServiceProviderFactory::make($request->input('provider'));

//             $response = $service->getStatus($request->input('transaction_id'));

//             return response()->json($response);
//         } catch (\Exception $e) {
//             return response()->json(['error' => $e->getMessage()], 400);
//         }
//     }