<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Process a payment
    public function process(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $booking = Booking::findOrFail($validated['booking_id']);

        if ($booking->status === 'cancelled') {
            return response()->json(['message' => 'Cannot process payment for a cancelled booking'], 400);
        }

        $payment = Payment::create([
            'booking_id' => $validated['booking_id'],
            'amount' => $validated['amount'],
            'status' => 'success', // Assume success for simplicity; real systems will interact with payment gateways
        ]);

        return response()->json(['message' => 'Payment processed successfully', 'payment' => $payment]);
    }

    // Handle successful payment
    public function success(Request $request)
    {
        $validated = $request->validate([
            'payment_id' => 'required|exists:payments,id',
        ]);

        $payment = Payment::findOrFail($validated['payment_id']);
        $payment->update(['status' => 'success']);

        return response()->json(['message' => 'Payment marked as successful']);
    }

    // Handle payment failure
    public function failure(Request $request)
    {
        $validated = $request->validate([
            'payment_id' => 'required|exists:payments,id',
        ]);

        $payment = Payment::findOrFail($validated['payment_id']);
        $payment->update(['status' => 'failure']);

        return response()->json(['message' => 'Payment marked as failed']);
    }
}
