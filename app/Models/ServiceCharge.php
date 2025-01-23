<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'service_provider_id',
        'range_from',
        'range_to',
        'company_type',
        'company_value',
        'distributor_type',
        'distributor_value',
        'retailer_type',
        'retailer_value',
    ];
}
