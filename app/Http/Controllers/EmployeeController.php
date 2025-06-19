<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        switch ($request->input('sort')) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'role':
                $query->join('employee_role', 'employee.role_id', '=', 'employee_role.id')
                    ->orderBy('employee_role.name')
                    ->select('employee.*');
                break;
            default:
                $query->latest('created_at');
                break;
        }

        $employees = $query->with('role')->get();

        return view('employees.index', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = EmployeeRole::all();
        return view('employees.create', compact('roles'));
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
            'postal_code' => 'required|string|max:20',
            'role_id' => 'required|exists:employee_role,id',
            'image' => 'nullable|image|max:2048',
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
            'postal_code.required' => 'The postal code field is required.',
            'role_id.required' => 'The role field is required.',
            'role_id.exists' => 'The selected role is invalid.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $baseName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $baseName . '_' . Str::uuid() . '.' . $extension;


            $destination = public_path('images/employees');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $image->move($destination, $fileName);
            $data['image'] = $fileName;
        }

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $roles = EmployeeRole::all();
        return view('employees.show', compact('employee', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $roles = EmployeeRole::all();
        return view('employees.edit', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employee', 'email')->ignore($employee->id),
            ],

            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:10',
            'house_number' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'role_id' => 'required|exists:employee_role,id',
            'image' => 'nullable|image|max:2048',
        ], [
            // Custom validation messages
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $baseName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $baseName . '_' . Str::uuid() . '.' . $extension;

            $destination = public_path('images/employees');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $image->move($destination, $fileName);
            $data['image'] = $fileName;
        }

        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->image && file_exists(public_path('images/employees/' . $employee->image))) {
            unlink(public_path('images/employees/' . $employee->image));
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
