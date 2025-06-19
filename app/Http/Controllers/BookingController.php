<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Igloo;
use App\Models\PaymentMethod;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['igloo', 'customer']);

        // Search
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->whereHas('customer', function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('surname', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        // Sort
        switch ($request->input('sort')) {
            case 'name':
                $query->join('igloos', 'booking.igloo_id', '=', 'igloos.id')
                    ->orderBy('igloos.name')
                    ->select('booking.*');
                break;
            case 'checkIn':
                $query->orderBy('check_in_date');
                break;
            case 'checkOut':
                $query->orderBy('check_out_date');
                break;
            case 'amount':
                $query->orderBy('amount');
                break;
            case 'bookingStatus':
                $query->orderBy('status');
                break;
            default:
                $query->latest('booking_date');
        }

        $bookings = $query->get();

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $igloos = Igloo::all();
        $customers = Customer::all();
        $paymentMethods = PaymentMethod::all();
        $employees = Employee::all();

        return view('bookings.create', compact('igloos', 'customers', 'paymentMethods', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:customer,id',
            'igloo_id' => 'required|exists:igloos,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'notes' => 'nullable|string|max:1000',
            'early_check_in' => 'nullable|boolean',
            'late_check_out' => 'nullable|boolean'
        ], [
            'user_id.required' => 'The user field is required.',
            'igloo_id.required' => 'The igloo field is required.',
            'check_in_date.required' => 'The check-in date field is required.',
            'check_out_date.required' => 'The check-out date field is required.',
            'payment_method_id.required' => 'The payment method field is required.',
            'check_out_date.after' => 'The check-out date must be after the check-in date.',
            'notes.max' => 'The notes may not be greater than 1000 characters.'
        ]);

        $igloo = Igloo::with('discount')->findOrFail($validatedData['igloo_id']);
        $nights = (strtotime($validatedData['check_out_date']) - strtotime($validatedData['check_in_date'])) / (60 * 60 * 24);
        $amount = $igloo->price_per_night * $nights;
        if ($igloo->discount) {
            $amount -= $amount * ($igloo->discount->discount_percentage / 100);
        }
        $amount = round($amount, 2); // Round to 2 decimal places
        // $validatedData['amount'] = $amount;

        logger([
            'nights' => $nights,
            'price_per_night' => $igloo->price_per_night,
            'amount' => $amount,
        ]);


        Booking::create([
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
        $booking->load(['igloo', 'customer', 'paymentMethod', 'employee']);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $igloos = Igloo::all();
        $customers = Customer::all();
        $paymentMethods = PaymentMethod::all();
        $employees = Employee::all();

        return view('bookings.edit', compact('booking', 'igloos', 'customers', 'paymentMethods', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:customer,id',
            'igloo_id' => 'required|exists:igloos,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'notes' => 'nullable|string|max:1000',
            'early_check_in' => 'nullable|boolean',
            'late_check_out' => 'nullable|boolean'
        ], [
            'user_id.required' => 'The user field is required.',
            'igloo_id.required' => 'The igloo field is required.',
            'check_in_date.required' => 'The check-in date field is required.',
            'check_out_date.required' => 'The check-out date field is required.',
            'payment_method_id.required' => 'The payment method field is required.',
            'check_out_date.after' => 'The check-out date must be after the check-in date.',
            'notes.max' => 'The notes may not be greater than 1000 characters.'
        ]);

        $igloo = Igloo::with('discount')->findOrFail($validatedData['igloo_id']);
        $nights = (strtotime($validatedData['check_out_date']) - strtotime($validatedData['check_in_date'])) / (60 * 60 * 24);
        $amount = $igloo->price_per_night * $nights;
        if ($igloo->discount) {
            $amount -= $amount * ($igloo->discount->discount_percentage / 100);
        }
        $amount = round($amount, 2); // Round to 2 decimal places
        // $validatedData['amount'] = $amount;

        $booking->update([
            'user_id' => $validatedData['user_id'],
            'igloo_id' => $validatedData['igloo_id'],
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'payment_method_id' => $validatedData['payment_method_id'],
            'amount' => $amount,
            'notes' => $request->input('notes', ''),
            'early_check_in' => $request->input('early_check_in', false),
            'late_check_out' => $request->input('late_check_out', false),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
