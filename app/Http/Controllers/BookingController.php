<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Route;
use Illuminate\Http\Request;

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
        ]);

        $route = Route::findOrFail($validated['route_id']);
        $totalFare = $route->fare * count(explode(',', $validated['seat_numbers']));

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'route_id' => $validated['route_id'],
            'seat_numbers' => $validated['seat_numbers'],
            'total_fare' => $totalFare,
        ]);

        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking]);
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
}
