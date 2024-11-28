<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::with('bus')->get();
        return response()->json($routes);
    }

    // Store a new route
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all()); // Log incoming request data

        $validated = $request->validate([
            'source' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'bus_id' => 'required|exists:buses,id',
            'fare' => 'required|numeric|min:0',
        ]);

        $route = Route::create($validated);

        Log::info('Route created:', $route->toArray()); // Log created route data
        return response()->json(['message' => 'Route added successfully', 'route' => $route]);
    }


    public function edit($id)
{
    $route = Route::findOrFail($id);
    return response()->json(['data' => $route], 200);
}


    // Update an existing route
    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'source' => 'string|max:255',
            'destination' => 'string|max:255',
            'departure_time' => 'nullable',
            'arrival_time' => 'nullable',
            'bus_id' => 'exists:buses,id',
            'fare' => 'numeric|min:0',
        ]);

        $route = Route::findOrFail($id);
        $route->update($validated);

        return response()->json(['message' => 'Route updated successfully', 'route' => $route]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    

    // Delete a route
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return response()->json(['message' => 'Route deleted successfully']);
    }
}
