<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Seat;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        // Validate the request
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'seat_numbers' => 'required|string',
            'fare' => 'required|numeric',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the user's wallet
        $wallet = Wallet::where('user_id', $userId)->first();

        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found'], 404);
        }

        // Check if the wallet has sufficient balance
        if ($wallet->balance < $validated['fare']) {
            return response()->json(['error' => 'Insufficient wallet balance'], 400);
        }

        // Deduct the fare from the wallet balance
        $wallet->balance -= $validated['fare'];
        $wallet->save();

        // Create the booking record
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



    public function getOneUserBookings()
    {
        try {
            $userId = Auth::id(); // Get the authenticated user ID
            $userBooking = Booking::where('user_id', $userId)->get(); // Fetch all bookings for this user

            $combinedData = [];

            // Loop through each booking to fetch related route and bus details
            foreach ($userBooking as $booking) {
                // Fetch the route details based on route_id, avoiding unnecessary queries if it doesn't exist
                $routeDetails = Route::find($booking->route_id);

                if ($routeDetails) {
                    // Fetch the bus details for the route if route exists
                    $busDetails = Bus::find($routeDetails->bus_id);

                    if ($busDetails) {
                        // Combine booking, route, and bus details
                        $combinedData[] = [
                            'booking' => $booking,
                            'route' => $routeDetails,
                            'bus' => $busDetails
                        ];
                    }
                }
            }

            // Return the combined data as JSON
            return response()->json($combinedData, 200);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Error fetching user bookings: ' . $e->getMessage());

            // Return the error message as JSON
            return response()->json(['error' => 'Unable to fetch user bookings. Please try again later.'], 500);
        }
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


    public function deleteBooking(Request $request, $id)
{
    try {
        // Find the booking by ID
        $booking = Booking::find($id);

        if (!$booking) {
            Log::error("Booking with ID $id not found");
            return response()->json(['error' => 'Booking not found'], 404);
        }

        // Retrieve the total fare
        $fare = $booking->total_fare;

        // Get the authenticated user ID
        $userId = Auth::id();

        // Retrieve the user's wallet
        $wallet = Wallet::where('user_id', $userId)->first();

        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found'], 404);
        }

        // Add the fare back to the wallet balance
        $wallet->balance += $fare;
        $wallet->save();

        // Retrieve seat numbers and route ID from the booking
        $seatNumbers = explode(',', $booking->seat_numbers);
        $routeId = $booking->route_id;

        // Check if the seats exist in the database for the given route
        $seats = Seat::whereIn('seat_number', $seatNumbers)
            ->where('route_id', $routeId)
            ->get();

        if ($seats->isEmpty()) {
            Log::error("Seats not found for route ID $routeId and seat numbers: " . implode(',', $seatNumbers));
            return response()->json(['error' => 'Seats not found for the specified route'], 404);
        }

        // Update the status of the seats to 'available'
        foreach ($seats as $seat) {
            $seat->status = 'available';
            $seat->save();
        }

        // Log successful seat status update
        Log::info("Seats updated successfully for route ID $routeId");

        // Delete the booking
        $booking->delete();

        // Return a success response
        return response()->json(['message' => 'Booking deleted and seats updated successfully'], 200);
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error deleting booking: ' . $e->getMessage(), ['exception' => $e]);

        // Return an error response
        return response()->json(['error' => 'Unable to delete booking. Please try again later.'], 500);
    }
}

}
