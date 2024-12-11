<?php

namespace App\Http\Controllers;

use App\Models\MobileOperator;
use Illuminate\Http\Request;

class MobileOperatorsController extends Controller
{
    public function getAllOperators()
    {
        try {
            // Fetch all operators from the database
            $operators = MobileOperator::all();

            // Return the data as a JSON response
            return response()->json([
                'success' => true,
                'data' => $operators
            ], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch operators',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
