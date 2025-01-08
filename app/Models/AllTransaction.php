<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTransaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alltransactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_type',
        'transaction_id',
        'datetime',
        'user_id',
        'status',
        'amount',
    ];

    /**
     * The user who performed the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the transaction details (BBPS or Recharge).
     */
    public function transactionDetails()
    {
        return $this->morphTo();
    }
}
