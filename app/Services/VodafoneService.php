<?php

// app/Services/VodafoneService.php
namespace App\Services;

use App\Services\Contracts\ServiceProviderInterface;

class VodafoneService implements ServiceProviderInterface
{
    public function recharge(array $data): array
    {
        // Logic for Vodafone recharge
        return [
            'status' => 'success',
            'message' => 'Vodafone recharge successful',
        ];
    }

    public function getStatus(string $transactionId): array
    {
        // Logic to check Vodafone recharge status
        return [
            'status' => 'success',
            'transaction_id' => $transactionId,
        ];
    }
}
