<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'type'];

    // Relationship: An operator has many recharges
    public function recharges()
    {
        return $this->hasMany(Recharge::class);
    }
}
