@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="section section__bookings mt-5">
                    <a class="go-back" href="{{ route('bookings.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1 class="mt-4">Edit Booking</h1>
                    </div>
                </section>

                <section class="section section__form">
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')

                        {{-- Customer --}}
                        <div class="input-container">
                            <label for="user_id">Select customer</label>
                            <select name="user_id" class="input-box">
                                <option value="">--</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ (old('user_id', $booking->user_id) == $customer->id) ? 'selected' : '' }}>
                                    {{ $customer->name }} {{ $customer->surname }}
                                </option>
                                @endforeach
                            </select>
                            @error('user_id') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        {{-- Igloo --}}
                        <div class="input-container">
                            <label for="igloo_id">Select igloo</label>
                            <select name="igloo_id" class="input-box">
                                <option value="">--</option>
                                @foreach($igloos as $igloo)
                                <option value="{{ $igloo->id }}" {{ (old('igloo_id', $booking->igloo_id) == $igloo->id) ? 'selected' : '' }}>
                                    {{ $igloo->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('igloo_id') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        {{-- Dates --}}
                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="check_in_date">Check-in date</label>
                                <input type="date" name="check_in_date" class="input-box" value="{{ old('check_in_date', $booking->check_in_date->format('Y-m-d')) }}" />
                                @error('check_in_date') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="check_out_date">Check-out date</label>
                                <input type="date" name="check_out_date" class="input-box" value="{{ old('check_out_date', $booking->check_out_date->format('Y-m-d')) }}" />
                                @error('check_out_date') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Payment --}}
                        <div class="input-container">
                            <label for="payment_method_id">Select payment method</label>
                            <select name="payment_method_id" class="input-box">
                                <option value="">--</option>
                                @foreach($paymentMethods as $method)
                                <option value="{{ $method->id }}" {{ (old('payment_method_id', $booking->payment_method_id) == $method->id) ? 'selected' : '' }}>
                                    {{ $method->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('payment_method_id') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        {{-- Notes --}}
                        <div class="input-container">
                            <label for="notes">Notes</label>
                            <textarea name="notes" id="notes" class="input-box">{{ old('notes', $booking->notes) }}</textarea>
                            @error('notes') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        {{-- Checkboxes --}}
                        <div class="form-box d-flex gap-5">
                            <div class="input-container input-container--checkbox">
                                <label for="early_check_in">Early check-in request</label>
                                <input type="checkbox" name="early_check_in" id="early_check_in" value="1" {{ old('early_check_in', $booking->early_check_in) ? 'checked' : '' }} />
                            </div>

                            <div class="input-container input-container--checkbox">
                                <label for="late_check_out">Late check-out request</label>
                                <input type="checkbox" name="late_check_out" id="late_check_out" value="1" {{ old('late_check_out', $booking->late_check_out) ? 'checked' : '' }} />
                            </div>
                        </div>

                        <button class="button col-2 align-self-end">Update booking</button>
                    </form>
                </section>
            </main>
        </div>
    </div>
</div>
@endsection