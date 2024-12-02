<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeatController extends Controller
{
    public function bookSeat(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'seat_ids' => 'required|array',
                'seat_ids.*' => 'exists:seats,seat_number', // Validate against seat_number
            ]);
    
            Log::info("Booking request received", ['seat_ids' => $validated['seat_ids']]);
    
            $responseMessages = [];
    
            foreach ($validated['seat_ids'] as $seatNumber) {
                // Find the seat by its seat_number
                $seat = Seat::where('seat_number', $seatNumber)->first();
    
                if (!$seat) {
                    // Handle case where the seat is not found
                    $responseMessages[] = "Seat number {$seatNumber} does not exist.";
                    continue; // Skip to the next seat
                }
    
                if ($seat->status === 'booked') {
                    // Seat is already booked
                    $responseMessages[] = "Seat number {$seatNumber} is already booked.";
                    continue; // Skip to the next seat
                }
    
                // Book the seat
                $seat->status = 'booked';
                $seat->save();
    
                $responseMessages[] = "Seat number {$seatNumber} has been booked successfully.";
            }
    
            if (count($responseMessages) === count($validated['seat_ids'])) {
                return response()->json([
                    'message' => 'All seats booked successfully!',
                    'details' => $responseMessages,
                ], 200);
            }
    
            return response()->json([
                'message' => 'Some seats could not be booked.',
                'details' => $responseMessages,
            ], 400);
        } catch (\Exception $e) {
            Log::error('Error booking seats', [
                'exception' => $e->getMessage(),
                'request' => $request->all(),
            ]);
            return response()->json(['error' => 'Something went wrong while booking seats.'], 500);
        }
    }
    



    public function unBookSeat(Request $request)
    {
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

    public function getSeats($routeId)
    {
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
    
    public function unbookSeatadmin($seatId)
    {
        $seat = Seat::find($seatId);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found'], 404);
        }

        // Ensure the seat is available before booking
        if ($seat->status !== 'booked') {
            return response()->json(['message' => 'Seat is already unbooked'], 400);
        }

        // Mark the seat as booked
        $seat->status = 'available';  // 'unavailable' is used as the booked status
        $seat->save();

        return response()->json(['success' => true, 'message' => 'Seat booked successfully']);
    }
}
