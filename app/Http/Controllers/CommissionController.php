<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommissionController extends Controller
{

  
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
        $commission = Commission::all();
        $commissioncharge = Commission::find($id);
        $users = User::all(); // Fetch users for dropdown
        $services = Service::all(); // Fetch services for dropdown
        $serviceProviders = ServiceProvider::all(); // Fetch service providers for dropdown
    
        if (!$commissioncharge) {
            return response()->json(['message' => 'Commission not found'], 404);
        }

        Log::info($commissioncharge);
        return view('admin.showcommission', compact('commissioncharge','commission','users', 'services', 'serviceProviders'));

    }
   
    public function update(Request $request, $id)
    {
        $commission = Commission::findOrFail($id);
        $commission->update($request->all());

        return redirect()->route('admin.showcommission')->with('success', 'Commission updated successfully!');
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

        return redirect()->back()->with('success', 'Commission deleted successfully');

    }
    
}
