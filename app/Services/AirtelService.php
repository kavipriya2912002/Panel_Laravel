<?php

// app/Services/AirtelService.php
namespace App\Services;

use App\Services\Contracts\ServiceProviderInterface;

class AirtelService implements ServiceProviderInterface
{
    public function recharge(array $data): array
    {
        // Logic for Airtel recharge
        return [
            'status' => 'success',
            'message' => 'Airtel recharge successful',
        ];
    }

    public function getStatus(string $transactionId): array
    {
        // Logic to check Airtel recharge status
        return [
            'status' => 'success',
            'transaction_id' => $transactionId,
        ];
    }
}
