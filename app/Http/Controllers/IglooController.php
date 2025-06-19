<?php

namespace App\Http\Controllers;

use App\Models\Igloo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class IglooController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getJson()
    {
        return response()->json(Igloo::all());
    }

    public function index(Request $request)
    {
        $query = Igloo::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        switch ($request->input('sort')) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'capacity':
                $query->orderBy('capacity');
                break;
            case 'pricePerNight':
                $query->orderBy('price_per_night');
                break;
            default:
                $query->latest('created_at');
                break;
        }

        $igloos = $query->get();

        return view('igloos.index', compact('igloos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('igloos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'The name field is required.',
            'capacity.required' => 'The capacity field is required.',
            'price_per_night.required' => 'The price per night field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2MB.',
            'capacity.integer' => 'The capacity must be an integer.',
            'capacity.min' => 'The capacity must be at least 1.',
            'price_per_night.numeric' => 'The price per night must be a number.',
            'price_per_night.min' => 'The price per night must be at least 0.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 1000 characters.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $baseName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $baseName . '_' . Str::uuid() . '.' . $extension;


            $destination = public_path('images/igloos');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $image->move($destination, $fileName);
            $data['image'] = $fileName;
        }

        Igloo::create($data);
        return redirect()->route('igloos.index')->with('success', 'Igloo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Igloo $igloo)
    {
        return view('igloos.show', compact('igloo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Igloo $igloo)
    {
        return view('igloos.edit', compact('igloo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Igloo $igloo)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $baseName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $baseName . '_' . Str::uuid() . '.' . $extension;

            $destination = public_path('images/igloos');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $image->move($destination, $fileName);
            $data['image'] = $fileName;
        }

        $igloo->update($data);

        return redirect()->route('igloos.index')->with('success', 'Igloo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Igloo $igloo)
    {
        if($igloo->image && Storage::disk('public')->exists('images/igloos/' . $igloo->image)) {
            Storage::disk('public')->delete('images/igloos/' . $igloo->image);
        }

        $igloo->delete();
        return redirect()->route('igloos.index')->with('success', 'Igloo deleted successfully.');
    }
}
