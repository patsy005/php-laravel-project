<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        switch ($request->input('sort')) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'address':
                $query->orderBy('street')->orderBy('city');
                break;
            case 'nationality':
                $query->orderBy('nationality');
                break;
            default:
                $query->latest('created_at');
                break;
        }

        $customers = $query->get();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:10',
            'house_number' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'nationality' => 'nullable|string|max:100',
            'postal_code' => 'required|string|max:20',
        ], [
            'name.required' => 'The name field is required.',
            'surname.required' => 'The surname field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'The phone field is required.',
            'street.required' => 'The street field is required.',
            'street_number.required' => 'The street number field is required.',
            'house_number.required' => 'The house number field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
            'nationality.required' => 'The nationality field is required.',
            'postal_code.required' => 'The postal code field is required.',
        ]);

        Customer::create($data);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:10',
            'house_number' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'nationality' => 'nullable|string|max:100',
            'postal_code' => 'required|string|max:20',
        ], [
            'name.required' => 'The name field is required.',
            'surname.required' => 'The surname field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'The phone field is required.',
            'street.required' => 'The street field is required.',
            'street_number.required' => 'The street number field is required.',
            'house_number.required' => 'The house number field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.', 
            'nationality.required' => 'The nationality field is required.',
            'postal_code.required' => 'The postal code field is required.',
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
