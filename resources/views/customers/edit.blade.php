@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">


                <section class="section section__bookings mt-5">
                    <a class="go-back" href="{{ route('customers.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1 class="mt-4">Edit Customer</h1>
                    </div>
                </section>

                <section class="section section__form">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="input-box" value="{{ old('name', $customer->name) }}">
                                @error('name') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" class="input-box" value="{{ old('surname', $customer->surname) }}">
                                @error('surname') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="input-box" value="{{ old('email', $customer->email) }}">
                            @error('email') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="phone">Phone number</label>
                            <input type="text" name="phone" class="input-box" value="{{ old('phone', $customer->phone) }}">
                            @error('phone') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="street">Street</label>
                            <input type="text" name="street" class="input-box" value="{{ old('street', $customer->street) }}">
                            @error('street') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="street_number">Street number</label>
                                <input type="text" name="street_number" class="input-box" value="{{ old('street_number', $customer->street_number) }}">
                                @error('street_number') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="house_number">House number</label>
                                <input type="text" name="house_number" class="input-box" value="{{ old('house_number', $customer->house_number) }}">
                                @error('house_number') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="city">City</label>
                            <input type="text" name="city" class="input-box" value="{{ old('city', $customer->city) }}">
                            @error('city') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="input-box" value="{{ old('country', $customer->country) }}">
                                @error('country') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" name="postal_code" class="input-box" value="{{ old('postal_code', $customer->postal_code) }}">
                                @error('postal_code') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="nationality">Nationality</label>
                            <input type="text" name="nationality" class="input-box" value="{{ old('nationality', $customer->nationality) }}">
                            @error('nationality') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <button class="button col-2 align-self-end">Update</button>
                    </form>
                </section>

            </main>
        </div>
    </div>
</div>
@endsection