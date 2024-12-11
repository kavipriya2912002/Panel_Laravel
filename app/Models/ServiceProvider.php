<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['sp_name'];

    public function mobileOperators()
    {
        return $this->belongsToMany(Operator::class, 'sp_operator_mapping', 'service_provider_id', 'operator_id')
                    ->withPivot('value', 'circle')
                    ->withTimestamps();
    }
}
