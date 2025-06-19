<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Igloo;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate(([
            'user_id' => 'required|exists:customer, id',
            'igloo_id' => 'required|exists:igloos,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]));

        $igloo = Igloo::with('discount')->findOrFail($validatedData['igloo_id']);
        $nights = (strtotime($validatedData['check_out_date']) - strtotime($validatedData['check_in_date'])) / (60 * 60 * 24);
        $amount = $igloo->price * $nights;
        if ($igloo->discount) {
            $amount -= $amount * ($igloo->discount->discount_percentage / 100);
        }
        $booking = Booking::create([
            'user_id' => $validatedData['user_id'],
            'igloo_id' => $validatedData['igloo_id'],
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'payment_method_id' => $validatedData['payment_method_id'],
            'amount' => $amount,
            'booking_date' => now(),
            'notes' => $request->input('notes', ''),
            'early_check_in' => $request->input('early_check_in', false),
            'late_check_out' => $request->input('late_check_out', false),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(([
            'user_id' => 'required|exists:customer, id',
            'igloo_id' => 'required|exists:igloos,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]));

        $igloo = Igloo::with('discount')->findOrFail($validatedData['igloo_id']);
        $nights = (strtotime($validatedData['check_out_date']) - strtotime($validatedData['check_in_date'])) / (60 * 60 * 24);
        $amount = $igloo->price * $nights;
        if ($igloo->discount) {
            $amount -= $amount * ($igloo->discount->discount_percentage / 100);
        }
        $booking = Booking::create([
            'user_id' => $validatedData['user_id'],
            'igloo_id' => $validatedData['igloo_id'],
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'payment_method_id' => $validatedData['payment_method_id'],
            'amount' => $amount,
            'booking_date' => now(),
            'notes' => $request->input('notes', ''),
            'early_check_in' => $request->input('early_check_in', false),
            'late_check_out' => $request->input('late_check_out', false),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
