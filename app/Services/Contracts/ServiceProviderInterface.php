
<?php
// app/Services/Contracts/ServiceProviderInterface.php
namespace App\Services\Contracts;

interface ServiceProviderInterface
{
    public function recharge(array $data): array; // Handles the recharge request
    public function getStatus(string $transactionId): array; // Gets the status of a recharge
}
