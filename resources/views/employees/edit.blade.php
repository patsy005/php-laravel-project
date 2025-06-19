@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">
                <a class="go-back" href="{{ route('employees.index') }}">
                    <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                </a>
                <section class="section section__bookings mt-5">
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1 class="mt-4">Edit employee</h1>
                    </div>
                </section>

                <section class="section section__form">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label>Name</label>
                                <input type="text" name="name" class="input-box" value="{{ old('name', $employee->name) }}">
                                @error('name') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                            <div class="input-container col-6 pe-0">
                                <label>Surname</label>
                                <input type="text" name="surname" class="input-box" value="{{ old('surname', $employee->surname) }}">
                                @error('surname') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="input-container">
                            <label>Email</label>
                            <input type="email" name="email" class="input-box" value="{{ old('email', $employee->email) }}">
                            @error('email') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label>Phone</label>
                            <input type="text" name="phone" class="input-box" value="{{ old('phone', $employee->phone) }}">
                            @error('phone') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label>Street</label>
                            <input type="text" name="street" class="input-box" value="{{ old('street', $employee->street) }}">
                        </div>
                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label>Street number</label>
                                <input type="text" name="street_number" class="input-box" value="{{ old('street_number', $employee->street_number) }}">
                            </div>
                            <div class="input-container col-6 pe-0">
                                <label>House number</label>
                                <input type="text" name="house_number" class="input-box" value="{{ old('house_number', $employee->house_number) }}">
                            </div>
                        </div>
                        <div class="input-container">
                            <label>City</label>
                            <input type="text" name="city" class="input-box" value="{{ old('city', $employee->city) }}">
                        </div>
                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label>Country</label>
                                <input type="text" name="country" class="input-box" value="{{ old('country', $employee->country) }}">
                            </div>
                            <div class="input-container col-6 pe-0">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" class="input-box" value="{{ old('postal_code', $employee->postal_code) }}">
                            </div>
                        </div>

                        <div class="input-container">
                            <label>Role</label>
                            <select name="role_id" class="input-box">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $employee->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-container input-container--checkbox">
                            <label>Image (optional)</label>
                            <input type="file" name="image" class="input-box" />
                            @if ($employee->image)
                            <p class="mt-2">Current: <img src="{{ asset('images/employees/' . $employee->image) }}" width="60"></p>
                            @endif
                        </div>

                        <button type="submit" class="button col-2 align-self-end">Update</button>
                    </form>
                </section>
            </main>
        </div>
    </div>
</div>
@endsection