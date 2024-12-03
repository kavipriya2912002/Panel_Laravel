<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Display all bookings (user-specific or admin overview)
    public function index(Request $request)
    {
        if ($request->user()->is_admin) {
            $bookings = Booking::with(['route.bus', 'user'])->get(); // Admin sees all
        } else {
            $bookings = Booking::where('user_id', $request->user()->id)->with(['route.bus'])->get(); // User-specific
        }

        return response()->json($bookings);
    }

    // Create a new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'seat_numbers' => 'required|string',
            'fare' => 'required|numeric',
            
        ]);
        $userId = Auth::id();
        $booking = Booking::create([
            'user_id' => $userId,
            'route_id' => $validated['route_id'],
            'seat_numbers' => $validated['seat_numbers'],
            'total_fare' => $validated['fare'],
            'status' => 'booked',
        ]);
    
        return response()->json(['message' => 'Booking successful!', 'booking' => $booking], 201);
    }

    // Cancel a booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'cancelled') {
            return response()->json(['message' => 'Booking already cancelled'], 400);
        }

        $booking->update(['status' => 'cancelled']);
        return response()->json(['message' => 'Booking cancelled successfully']);
    }

    // Display a specific booking
    public function show($id)
    {
        $booking = Booking::with(['route.bus', 'user'])->findOrFail($id);
        return response()->json($booking);
    }


    
    public function getAllBookings()
{
    try {
        // Fetch all bookings with their related route details
        $bookings = Booking::all();

        // Create an empty array to hold the combined data
        $combinedData = [];

        // Loop through each booking to fetch its related route and bus details
        foreach ($bookings as $booking) {
            // Fetch the route details based on route_id
            $routeDetails = Route::where('id', $booking->route_id)->first();

            // If route details exist, fetch the bus details
            if ($routeDetails) {
                $busDetails = Bus::where('id', $routeDetails->bus_id)->first();

                // Combine booking, route, and bus details
                $combinedData[] = [
                    'booking' => $booking,
                    'route' => $routeDetails,
                    'bus' => $busDetails
                ];
            }
        }

        // Return the combined data as JSON
        return response()->json($combinedData, 200);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500); // Handle exceptions
    }
}

    
    
}
