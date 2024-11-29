<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function bookSeat(Request $request) {
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
        ]);
    
        $seat = Seat::find($validated['seat_id']);
    
        if ($seat->status === 'booked') {
            return response()->json(['message' => 'Seat is already booked'], 400);
        }
    
        $seat->status = 'booked';
        $seat->save();
    
        return response()->json(['message' => 'Seat booked successfully'], 200);
    }

    public function unBookSeat(Request $request) {
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
        ]);
    
        $seat = Seat::find($validated['seat_id']);
    
        if ($seat->status === 'available') {
            return response()->json(['message' => 'Seat is already available'], 400);
        }
    
        $seat->status = 'available';
        $seat->save();
    
        return response()->json(['message' => 'Seat unbooked successfully'], 200);
    }

    public function getSeats($routeId) {
        $seats = Seat::where('route_id', $routeId)->get();
    
        return response()->json($seats);
    }

    public function bookSeatadmin($seatId)
    {
        $seat = Seat::find($seatId);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found'], 404);
        }

        // Ensure the seat is available before booking
        if ($seat->status !== 'available') {
            return response()->json(['message' => 'Seat is already booked'], 400);
        }

        // Mark the seat as booked
        $seat->status = 'booked';  // 'unavailable' is used as the booked status
        $seat->save();

        return response()->json(['success' => true, 'message' => 'Seat booked successfully']);
    
    }
    
}
