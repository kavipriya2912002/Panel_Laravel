<?php

// app/Services/ServiceProviderFactory.php
namespace App\Services;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ServiceProviderFactory
{
    public static function make($providerName)
    {
        // Instantiate the appropriate service provider based on the name
        switch (strtolower($providerName)) {
            case 'airtel':
                return new AirtelServiceProvider();
            case 'vi':
                return new VodafoneServiceProvider();
            case 'bsnl topup':
                return new BSNLTopupServiceProvider();
            case 'bsnl special':
                return new BSNLSpecialServiceProvider();
            case 'jio':
                return new JioServiceProvider();
            case 'videocon d2h':
                return new VideoconD2HServiceProvider();
            case 'airtel dth':
                return new AirtelDTHServiceProvider();
            case 'dtsh tv':
                return new DTSHTVServiceProvider();
            case 'sun direct':
                return new SunDirectServiceProvider();
            case 'tata sky':
                return new TataSkyServiceProvider();
            case 'jio pos lite':
                return new JioPosLiteServiceProvider();
            default:
                throw new \Exception('Unsupported service provider.');
        }
    }
}

class AirtelServiceProvider
{
    public function recharge($details)
    {
        $userId = Auth::id();

        return $this->sendRechargeRequest($details);
    }

    //     public function checkBalanceAndRecharge($details)
    // {
    //     // Step 1: Check balance before initiating recharge
    //     $balanceResponse = $this->getBalance();

    //     // Step 2: Check if the balance is sufficient
    //     if ($balanceResponse['STATUS'] !== 1 || $balanceResponse['AMOUNT'] < $details['amount']) {
    //         return response()->json(['error' => 'Insufficient balance to proceed with recharge.'], 400);
    //     }

    //     // Step 3: Proceed with the recharge request
    //     $rechargeResponse = $this->sendRechargeRequest($details);

    //     return $rechargeResponse;
    // }

    private function getBalance()
    {
        // Set the API URL for balance check
        $apiUrl = "https://Apibox.co.in/Api/service/Balance";
        $apiToken = env('API_TOKEN'); // Replace with your actual token

        // Make the GET request to check the balance
        $response = Http::get($apiUrl, [
            'at' => $apiToken,
        ]);

        // Handle any errors from the balance API
        if ($response->failed()) {
            throw new \Exception('Failed to check balance: ' . $response->body());
        }

        // Return the balance response as an array (assuming JSON response)
        return $response->json();
    }

    private function sendRechargeRequest($details)
    {
        $apiUrl = "https://Apibox.co.in/Api/Service/Recharge2";
        // Replace with your actual token
        $queryParams = http_build_query([
            'ApiToken' => env('API_TOKEN'),
            'MobileNo' => $details['mobile_number'],
            'Amount' => $details['amount'],
            'OpId' => $details['operator_code'],
            'RefTxnId' => uniqid('txn_'), // Unique transaction ID
        ]);

        Log::info($queryParams);

        $response = Http::withoutVerifying()->get($apiUrl . '?' . $queryParams);

        if ($response->failed()) {
            throw new \Exception('API request failed: ' . $response->body());
        }

        return $response->json();
    }
}

// Repeat the structure for other service providers
class VodafoneServiceProvider
{
    public function recharge($details)
    {
        return $this->sendRechargeRequest($details);
    }

    private function sendRechargeRequest($details)
    {
        $apiUrl = "https://Apibox.co.in/Api/Service/Recharge2";
        $apiToken = "xxxxxxxx-xxx-xxx"; // Replace with your actual token

        $queryParams = http_build_query([
            'ApiToken' => env('API_TOKEN'),
            'MobileNo' => $details['mobile_number'],
            'Amount' => $details['amount'],
            'OpId' => $details['operator_code'],
            'RefTxnId' => uniqid('txn_'), // Unique transaction ID
        ]);

        $response = Http::get($apiUrl . '?' . $queryParams);

        if ($response->failed()) {
            throw new \Exception('API request failed: ' . $response->body());
        }

        return $response->json();
    }
}




// Placeholder classes for other service providers
class BSNLTopupServiceProvider extends AirtelServiceProvider {}
class BSNLSpecialServiceProvider extends AirtelServiceProvider {}
class JioServiceProvider extends AirtelServiceProvider {}
class VideoconD2HServiceProvider extends AirtelServiceProvider {}
class AirtelDTHServiceProvider extends AirtelServiceProvider {}
class DTSHTVServiceProvider extends AirtelServiceProvider {}
class SunDirectServiceProvider extends AirtelServiceProvider {}
class TataSkyServiceProvider extends AirtelServiceProvider {}
class JioPosLiteServiceProvider extends AirtelServiceProvider {}
