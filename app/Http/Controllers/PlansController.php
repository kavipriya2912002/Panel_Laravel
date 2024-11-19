<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function getPlans($operatorId)
    {
        $plans = Plan::where('operator_id', $operatorId)->get();
        return response()->json($plans);
    }

    // Store plans from the API
    public function storePlans(Request $request)
    {
        $request->validate([
            'operator_id' => 'required|exists:operators,id',
            'plans' => 'required|array',
        ]);

        foreach ($request->plans as $planData) {
            Plan::updateOrCreate(
                ['operator_id' => $request->operator_id, 'plan_name' => $planData['plan_name']],
                $planData
            );
        }

        return response()->json(['message' => 'Plans saved successfully']);
    }
}
