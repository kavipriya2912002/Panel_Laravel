<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'operator_id',
        'plan_name',
        'price',
        'validity',
        'data',
        'benefits',
    ];

    /**
     * Relationship: Plan belongs to an Operator.
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }
}
