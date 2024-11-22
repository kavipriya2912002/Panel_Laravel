<?php

namespace App\Http\Controllers;

use App\Models\Route;
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
        $validated = $request->validate([
            'source' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'bus_id' => 'required|exists:buses,id',
            'fare' => 'required|numeric|min:0',
        ]);

        $route = Route::create($validated);
        return response()->json(['message' => 'Route added successfully', 'route' => $route]);
    }

    // Update an existing route
    public function update(Request $request, $id)
    {
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
    }

    // Delete a route
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return response()->json(['message' => 'Route deleted successfully']);
    }
}
