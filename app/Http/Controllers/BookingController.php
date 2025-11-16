<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function index()
    {
        // Show user's bookings
        return BookingResource::collection(
            auth()->user()->bookings()->with('property')->get()
        );
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = auth()->user()->bookings()->create([
            'property_id' => $request->property_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return new BookingResource($booking->load('property'));
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        return new BookingResource($booking->load('property'));
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        $booking->update($request->validate([
            'status' => 'in:confirmed,cancelled'
        ]));
        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        $booking->delete();
        return response()->noContent();
    }
}