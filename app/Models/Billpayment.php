<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billpayment extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'billpayment';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'operatorid',
        'operator_name',
        'parameter_name',
        'min_length',
        'max_length',
        'min_val',
        'max_val',
        'is_numeric',
        'errormessage',
        'placeholdertext',
        'is_mandatory',
        'value',
    ];

    // Cast fields to proper data types
    protected $casts = [
        'is_numeric' => 'boolean',
        'is_mandatory' => 'boolean',
        'min_val' => 'float',
        'max_val' => 'float',
        'min_length' => 'integer',
        'max_length' => 'integer',
    ];

    /**
     * Example of a relationship
     * If 'operatorid' relates to an Operator model, you can define it here.
     */
    public function operator()
    {
        return $this->belongsTo(MobileOperator::class, 'operatorid');
    }
}
