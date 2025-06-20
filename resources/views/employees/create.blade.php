@extends('layouts.app')

@section('title', 'Add Employee')

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
                        <h1 class="mt-4">Add employee</h1>
                    </div>
                </section>

                <section class="section section__form">
                    <form action="{{ route('employees.store') }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="input-box" value="{{ old('name') }}">
                                @error('name') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" class="input-box" value="{{ old('surname') }}">
                                @error('surname') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="input-box" value="{{ old('email') }}">
                            @error('email') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="input-box" value="{{ old('phone') }}">
                            @error('phone') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="street">Street</label>
                            <input type="text" name="street" class="input-box" value="{{ old('street') }}">
                            @error('street') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="street_number">Street number</label>
                                <input type="text" name="street_number" class="input-box" value="{{ old('street_number') }}">
                                @error('street_number') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="house_number">House number</label>
                                <input type="text" name="house_number" class="input-box" value="{{ old('house_number') }}">
                                @error('house_number') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="city">City</label>
                            <input type="text" name="city" class="input-box" value="{{ old('city') }}">
                            @error('city') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="input-box" value="{{ old('country') }}">
                                @error('country') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" name="postal_code" class="input-box" value="{{ old('postal_code') }}">
                                @error('postal_code') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="role_id">Role</label>
                            <select name="role_id" class="input-box">
                                <option value="">--</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('role_id') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container input-container--checkbox">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="input-box">
                            @error('image') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="login">Login</label>
                                <input type="text" name="login" class="input-box" value="{{ old('login') }}">
                                @error('login') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="input-box">
                                @error('password') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <button type="submit" class="button col-2 align-self-end">Add</button>
                    </form>
                </section>
            </main>
        </div>
    </div>
</div>
@endsection