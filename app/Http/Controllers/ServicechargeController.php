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
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_identifier' => 'required|exists:services,service_identifier',
            'service_provider_id' => 'required|exists:service_providers,id', // Corrected model name
            'range_from' => 'required|numeric|min:0',
            'range_to' => 'required|numeric|min:0|gte:range_from',
            'company_type' => 'required|in:flat,percentage',
            'company_value' => 'required|numeric|min:0',
            'distributor_type' => 'required|in:flat,percentage',
            'distributor_value' => 'required|numeric|min:0',
            'retailer_type' => 'required|in:flat,percentage',
            'retailer_value' => 'required|numeric|min:0',
        ]);

        Log::info($validated);

        ServiceCharge::create($validated);

        return redirect()->back()->with('success', 'Service charge set successfully.');
    }

    public function getCharge()
    {
        $services = Service::all();
        $users = User::all();
        $serviceProviders = ServiceProvider::all();

        return view('admin.dashboard', compact('services', 'users', 'serviceProviders'));
    }
}
