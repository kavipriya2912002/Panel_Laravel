<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'operator_id',
        'amount',
        'phone_number',
        'status',
        'transaction_id',
    ];

    /**
     * Relationship: Recharge belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Recharge belongs to an Operator.
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }
}
