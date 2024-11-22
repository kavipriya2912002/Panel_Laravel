<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    // Display all buses
    public function index()
    {
        $buses = Bus::all(); // Get all buses

        if (request()->expectsJson()) {
            return response()->json($buses); // Return JSON response for API calls
        }

        // Return view for web requests
        return view('admin.bus', ['bus' => $buses]);
    }


    // Add a new bus
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'operator_name' => 'required|string|max:255', // Validate as a required string
            'bus_type' => 'required|string|max:255',     // Validate as a required string
            'total_seats' => 'required|integer|min:1',   // Validate as a required integer
        ]);

        // Create a new bus using the validated data
        $bus = Bus::create($validated);

        // Return a JSON response
        return response()->json(['message' => 'Bus added successfully', 'bus' => $bus]);
    }


    public function edit($id)
    {
        // Retrieve the bus using findOrFail. It automatically throws an exception if not found.
        $bus = Bus::findOrFail($id);
    
        // Return the bus data as a JSON response
        return response()->json(['data' => $bus], 200);
    }
    
    // Update an existing bus
    public function update(Request $request, $id)
    {
        // Use findOrFail directly. No need to check twice for bus existence.
        $bus = Bus::findOrFail($id);
    
        // Validate the input
        $validated = $request->validate([
            'operator_name' => 'required|string|max:255',
            'bus_type' => 'required|string|max:255',
            'total_seats' => 'required|integer|min:1',
        ]);
    
        // Update the bus with the validated data
        $bus->update($validated);
    
        // Return a success response with the updated bus data
        return response()->json(['message' => 'Bus updated successfully', 'bus' => $bus]);
    }
    
    // Delete a bus
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        if (!$bus) {
            return response(['message' => 'bus Not found'], 404);
        }
        $bus->delete();

        return response()->json(['message' => 'Bus deleted successfully']);
    }
}
