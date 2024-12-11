<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileOperator extends Model
{
    use HasFactory;

    protected $fillable = ['operator_name'];

    public function serviceProviders()
    {
        return $this->belongsToMany(ServiceProvider::class, 'sp_operator_mapping', 'operator_id', 'service_provider_id')
                    ->withPivot('value', 'circle')
                    ->withTimestamps();
    }
}
