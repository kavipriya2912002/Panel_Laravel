<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeatController extends Controller
{
    public function bookSeat(Request $request)
    {
        try {
            // Validate the basic structure
            $validated = $request->validate([
                'seat_ids' => 'required|array',
                'seat_ids.*' => 'required|string',
                'route_id' => 'required|integer|exists:routes,id', // Validate route_id
            ]);

            $routeId = $validated['route_id'];
            $seatIds = $validated['seat_ids'];

            Log::info("Booking request received", ['route_id' => $routeId, 'seat_ids' => $seatIds]);

            // Query the database to ensure all seats exist for the given route
            $validSeats = Seat::where('route_id', $routeId)
                ->whereIn('seat_number', $seatIds)
                ->pluck('seat_number')
                ->toArray();

            // Check for invalid seats
            $invalidSeats = array_diff($seatIds, $validSeats);
            if (!empty($invalidSeats)) {
                return response()->json([
                    'message' => 'Some seats are invalid for the selected route.',
                    'invalid_seats' => $invalidSeats,
                ], 400);
            }

            $responseMessages = [];

            foreach ($seatIds as $seatNumber) {
                $seat = Seat::where('route_id', $routeId)
                    ->where('seat_number', $seatNumber)
                    ->first();

                if ($seat->status === 'booked') {
                    $responseMessages[] = "Seat number {$seatNumber} is already booked for route ID {$routeId}.";
                    continue;
                }

                // Book the seat
                $seat->status = 'booked';
                $seat->save();

                $responseMessages[] = "Seat number {$seatNumber} has been booked successfully for route ID {$routeId}.";
            }

            return response()->json([
                'message' => 'Seat booking completed.',
                'details' => $responseMessages,
            ], 200);
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
    // Fetch seats for the given route
    $seats = Seat::where('route_id', $routeId)->get();

    // Fetch the fare for the route
    $route = Route::find($routeId);

    if (!$route) {
        return response()->json(['error' => 'Route not found'], 404);
    }

    // Include the route fare in the response
    return response()->json([
        'seats' => $seats,
        'routeFare' => $route->fare, // Assuming the 'fare' column exists in the 'routes' table
    ]);
}


public function getAdminSeats($routeId)
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
