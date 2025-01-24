<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{

    /**
     * Display a listing of commissions.
     */
    public function index()
    {
        $commissions = Commission::all();
        return response()->json($commissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'required|exists:sp_mapping_table,id',
            'range_from' => 'required|numeric',
            'range_to' => 'required|numeric',
            'company_type' => 'required|in:flat,percentage',
            'company_value' => 'required|numeric',
            'distributor_type' => 'required|in:flat,percentage',
            'distributor_value' => 'required|numeric',
            'retailer_type' => 'required|in:flat,percentage',
            'retailer_value' => 'required|numeric',
        ]);

        $commission = Commission::create($request->all());

        return response()->json(['message' => 'Commission created successfully', 'data' => $commission], 201);
    }

    /**
     * Display the specified commission.
     */
    public function show($id)
    {
        $commission = Commission::find($id);

        if (!$commission) {
            return response()->json(['message' => 'Commission not found'], 404);
        }

        return response()->json($commission);
    }

    /**
     * Update the specified commission in storage.
     */
    public function update(Request $request, $id)
    {
        $commission = Commission::find($id);

        if (!$commission) {
            return response()->json(['message' => 'Commission not found'], 404);
        }

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'service_id' => 'sometimes|exists:services,id',
            'service_provider_id' => 'sometimes|exists:sp_mapping_table,id',
            'range_from' => 'sometimes|numeric',
            'range_to' => 'sometimes|numeric',
            'company_type' => 'sometimes|in:flat,percentage',
            'company_value' => 'sometimes|numeric',
            'distributor_type' => 'sometimes|in:flat,percentage',
            'distributor_value' => 'sometimes|numeric',
            'retailer_type' => 'sometimes|in:flat,percentage',
            'retailer_value' => 'sometimes|numeric',
        ]);

        $commission->update($request->all());

        return response()->json(['message' => 'Commission updated successfully', 'data' => $commission]);
    }

    /**
     * Remove the specified commission from storage.
     */
    public function destroy($id)
    {
        $commission = Commission::find($id);

        if (!$commission) {
            return response()->json(['message' => 'Commission not found'], 404);
        }

        $commission->delete();

        return response()->json(['message' => 'Commission deleted successfully']);
    }
    
}
