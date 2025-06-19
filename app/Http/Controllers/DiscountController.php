<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Discount::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        switch ($request->sort) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'discount':
                $query->orderBy('discount_percentage');
                break;
            case 'description':
                $query->orderBy('description');
                break;
            case 'iglooName':
                $query->join('igloos', 'discount.igloo_id', '=', 'igloos.id')
                    ->orderBy('igloos.name')
                    ->select('discount.*');
                break;
            default:
                $query->latest();
                break;
        }

        $discounts = $query->get();

        return view('discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $igloos = \App\Models\Igloo::all(); // Assuming you have an Igloo model
        return view('discounts.create', compact('igloos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'igloo_id' => 'required|exists:igloos,id',
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'description' => 'nullable|string|max:500',
            'valid_from' => 'nullable|date',
            'valid_to' => 'nullable|date|after_or_equal:valid_from',
        ], [
            'igloo_id.required' => 'The igloo field is required.',
            'igloo_id.exists' => 'The selected igloo does not exist.',
            'name.required' => 'The name field is required.',
            'discount_percentage.required' => 'The discount percentage field is required.',
            'discount_percentage.numeric' => 'The discount percentage must be a number.',
            'discount_percentage.min' => 'The discount percentage must be at least 0.',
            'discount_percentage.max' => 'The discount percentage may not be greater than 100.',
            'valid_to.after_or_equal' => 'The valid to date must be after or equal to the valid from date.',
            'valid_from.date' => 'The valid from date must be a valid date.',
            'valid_to.date' => 'The valid to date must be a valid date.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 500 characters.',
        ]);

        Discount::create($data);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $igloos = \App\Models\Igloo::all(); // Assuming you have an Igloo model
        return view('discounts.edit', compact('discount', 'igloos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $data = $request->validate([
            'igloo_id' => 'required|exists:igloos,id',
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'description' => 'nullable|string|max:500',
            'valid_from' => 'nullable|date',
            'valid_to' => 'nullable|date|after_or_equal:valid_from',
        ], [
            'igloo_id.required' => 'The igloo field is required.',
            'igloo_id.exists' => 'The selected igloo does not exist.',
            'name.required' => 'The name field is required.',
            'discount_percentage.required' => 'The discount percentage field is required.',
            'discount_percentage.numeric' => 'The discount percentage must be a number.',
            'discount_percentage.min' => 'The discount percentage must be at least 0.',
            'discount_percentage.max' => 'The discount percentage may not be greater than 100.',
            'valid_to.after_or_equal' => 'The valid to date must be after or equal to the valid from date.',
            'valid_from.date' => 'The valid from date must be a valid date.',
            'valid_to.date' => 'The valid to date must be a valid date.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 500 characters.',
        ]);

        $discount->update($data);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}
