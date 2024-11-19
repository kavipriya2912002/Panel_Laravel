<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'wallet_id',
        'type',
        'amount',
        'reason',
        'transaction_id',
    ];

    /**
     * Relationship: Transaction belongs to a Wallet.
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
