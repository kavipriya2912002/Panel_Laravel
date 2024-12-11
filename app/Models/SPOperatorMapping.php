<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPOperatorMapping extends Model
{
    use HasFactory;

    protected $table = 'sp_operator_mapping';

    protected $fillable = ['operator_id', 'service_provider_id', 'value', 'circle'];
}
