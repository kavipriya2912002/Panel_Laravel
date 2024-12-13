<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
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
        try {
            Log::info('Request data:', $request->all()); // Log incoming request data

            $request->merge([
                'departure_time' => str_replace('T', ' ', $request->departure_time),
                'arrival_time' => str_replace('T', ' ', $request->arrival_time),
            ]);
            
            $validated = $request->validate([
                'source' => 'required|string|max:255',
                'destination' => 'required|string|max:255',
                'departure_time' => 'required|date_format:Y-m-d H:i', // Validate 24-hour format
                'arrival_time' => 'required|date_format:Y-m-d H:i',   // Validate 24-hour format
                'departure_date' => 'required|date|after_or_equal:today', // Ensure the date is today or in the future
                'bus_id' => 'required|exists:buses,id', // Ensure the bus_id exists in the buses table
                'fare' => 'required|numeric|min:0', // Ensure fare is a positive number
            ]);
            


            
            // Create the route record
            $route = Route::create($validated);
            
            // Log the created route for debugging purposes
            Log::info('Route created:', $route->toArray());
             // Log created route data
            $rows = ['A', 'B', 'C', 'D'];
            $columns = range(1, 10);

            foreach ($rows as $row) {
                foreach ($columns as $column) {
                    Seat::create([
                        'seat_number' => $row . $column,
                        'status' => 'available',
                        'route_id' => $route->id,
                    ]);
                }
            }

            return response()->json(['message' => 'Route and seats created successfully', 'route' => $route]);
        } catch (QueryException $e) {
            Log::error("Database error: " . $e->getMessage());
            return response()->json(['error' => 'Database error occurred', 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            Log::error("General error: " . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
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


    public function search(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'source' => 'required|string',
            'destination' => 'required|string',
            'departure_date' => 'required|date',
        ]);
    
        // Log incoming request
        Log::debug('Search request data:', $validated);
    
        // Fetch routes with eager loading
        $routes = Route::with('bus') // Assuming the Route model has a relation defined: `bus()`
            ->where('source', $validated['source'])
            ->where('destination', $validated['destination'])
            ->whereDate('departure_date', $validated['departure_date'])
            ->get();
    
        if ($routes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No routes found for the given criteria.',
            ], 404);
        }
    
        // Transform routes to include duration
        $routes->transform(function ($route) {
            $route->duration = $this->calculateDuration($route->departure_time, $route->arrival_time);
            return $route;
        });
    
        return response()->json([
            'success' => true,
            'data' => $routes,
        ], 200);
    }



    public function getAllRoutes()
    {
        try {
            // Fetch all routes with eager loading for bus information
            $routes = Route::with('bus')->get();

            if ($routes->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No routes found.',
                ], 404);
            }

            // Add duration for each route
            $routes->transform(function ($route) {
                $route->duration = $this->calculateDuration($route->departure_time, $route->arrival_time);
                return $route;
            });

            return response()->json([
                'success' => true,
                'data' => $routes,
            ], 200);

        } catch (\Exception $e) {
            // Log any unexpected errors
            Log::error('Error fetching all routes: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching routes.',
            ], 500);
        }
    }


    
    
    private function calculateDuration($departure, $arrival)
    {
        try {
            $departureTime = new \DateTime($departure);
            $arrivalTime = new \DateTime($arrival);
            $interval = $departureTime->diff($arrivalTime);
            return $interval->format('%h hours %i minutes');
        } catch (\Exception $e) {
            Log::error('Error calculating duration: ' . $e->getMessage());
            return 'Unknown'; // Default value for errors
        }
    }
    
}
