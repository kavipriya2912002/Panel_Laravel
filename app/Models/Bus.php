<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['operator_name', 'bus_type', 'total_seats'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
