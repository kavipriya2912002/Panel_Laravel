<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // Validate the incoming data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'required|exists:service_providers,id',
            'range_from' => 'required|numeric',
            'range_to' => 'required|numeric',
            'company_type' => 'required|in:flat,percentage',
            'company_value' => 'required|numeric',
            'distributor_type' => 'required|in:flat,percentage',
            'distributor_value' => 'required|numeric',
            'retailer_type' => 'required|in:flat,percentage',
            'retailer_value' => 'required|numeric',
        ]);

        // Create a new commission record
        Commission::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Commission created successfully!');
    }
    public function showcommission()
    {
        $commission = Commission::all();
        return view('admin.showcommission', compact('commission'));
    }


    // In your controller's edit method
    public function edit($id)
    {
        $commission = Commission::find($id);
    
        if (!$commission) {
            return response()->json(['message' => 'Commission not found'], 404);
        }

        Log::info($commission);
    
        return response()->json($commission);
    }
   
    public function update(Request $request, $id)
    {

        Log::info("uqwrjyfjhfksj");
        Log::info('Incoming request data:', $request->all());

        // Validate the incoming data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'required|exists:service_providers,id',
            'range_from' => 'required|numeric',
            'range_to' => 'required|numeric',
            'company_type' => 'required|in:flat,percentage',
            'company_value' => 'required|numeric',
            'distributor_type' => 'required|in:flat,percentage',
            'distributor_value' => 'required|numeric',
            'retailer_type' => 'required|in:flat,percentage',
            'retailer_value' => 'required|numeric',
        ]);

        Log::info("validatedddd",$validated);
        // Find the commission record
        $commission = Commission::findOrFail($id);

        // Update the commission record with the new values
        $commission->update($validated);

        // Redirect back with a success message
        return redirect()->route('admin.index')->with('success', 'Commission updated successfully');
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
