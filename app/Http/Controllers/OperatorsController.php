<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorsController extends Controller
{
    // Fetch and list all operators
    public function index()
    {
        $operators = Operator::all();
        return response()->json($operators);
    }

    // Call the operator's API to get updated operator details
    public function fetchFromAPI()
    {
        // Mock API response
        $apiResponse = [
            ['name' => 'Operator1', 'code' => 'OP1', 'type' => 'prepaid'],
            ['name' => 'Operator2', 'code' => 'OP2', 'type' => 'postpaid'],
        ];

        foreach ($apiResponse as $operatorData) {
            Operator::updateOrCreate(
                ['code' => $operatorData['code']],
                $operatorData
            );
        }

        return response()->json(['message' => 'Operators updated successfully']);
    }

    // Display details of a specific operator
    public function show($id)
    {
        $operator = Operator::findOrFail($id);
        return response()->json($operator);
    }
}
