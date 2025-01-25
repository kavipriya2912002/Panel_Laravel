<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCharge;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServicechargeController extends Controller
{
    public function showForm()
    {
        $services = Service::all();
        $users = User::all();
        $serviceProviders = ServiceProvider::all(); 

        return view('admin.dashboard', compact('services', 'users', 'serviceProviders')); 
    }

    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,service_id',
            'service_provider_id' => 'required|exists:service_providers,id',
            'range_from' => 'required|numeric|min:0',
            'range_to' => 'required|numeric|min:0|gte:range_from',
            'company_type' => 'required|in:flat,percentage',
            'company_value' => 'required|numeric|min:0',
            'distributor_type' => 'required|in:flat,percentage',
            'distributor_value' => 'required|numeric|min:0',
            'retailer_type' => 'required|in:flat,percentage',
            'retailer_value' => 'required|numeric|min:0',
        ]);

        Log::info('Validated data: ', $validated);

        ServiceCharge::create($validated);

        return redirect()->back()->with('success', 'Service charge set successfully.');
    } catch (\Exception $e) {
        Log::error('Error saving service charge: ' . $e->getMessage());
        return redirect()->back()->with('error', 'There was an error saving the service charge.');
    }
}


    public function getCharge()
    {
        $services = Service::all();
        $users = User::all();
        $serviceProviders = ServiceProvider::all();

        return view('admin.dashboard', compact('services', 'users', 'serviceProviders'));
    }
}
