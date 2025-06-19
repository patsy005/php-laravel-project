@extends('layouts.app')

@section('title', 'Edit Discount')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">


                <section class="section section__bookings mt-5">
                    <a class="go-back" href="{{ route('discounts.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1 class="mt-4">Edit Discount</h1>
                    </div>
                </section>

                <section class="section section__form">
                    <form action="{{ route('discounts.update', $discount->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')

                        <div class="input-container">
                            <label for="igloo_id">Select igloo</label>
                            <select name="igloo_id" id="igloo_id" class="input-box">
                                <option value="">--</option>
                                @foreach ($igloos as $igloo)
                                <option value="{{ $igloo->id }}" {{ (old('igloo_id', $discount->igloo_id) == $igloo->id) ? 'selected' : '' }}>
                                    {{ $igloo->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('igloo_id') <p style="color: #FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-box d-flex justify-content-between row">
                            <div class="input-container col-6 ps-0">
                                <label for="valid_from">Valid from</label>
                                <input type="date" name="valid_from" class="input-box" value="{{ old('valid_from', $discount->valid_from) }}">
                                @error('valid_from') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>

                            <div class="input-container col-6 pe-0">
                                <label for="valid_to">Valid to</label>
                                <input type="date" name="valid_to" class="input-box" value="{{ old('valid_to', $discount->valid_to) }}">
                                @error('valid_to') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="name">Promotion name</label>
                            <input type="text" name="name" class="input-box" value="{{ old('name', $discount->name) }}">
                            @error('name') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="discount_percentage">Discount (%)</label>
                            <input type="number" name="discount_percentage" class="input-box" value="{{ old('discount_percentage', $discount->discount_percentage) }}">
                            @error('discount_percentage') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-container">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="input-box" value="{{ old('description', $discount->description) }}">
                            @error('description') <p style="color:#FF4D4D">{{ $message }}</p> @enderror
                        </div>

                        <button class="button col-2 align-self-end">Update</button>
                    </form>
                </section>

            </main>
        </div>
    </div>
</div>
@endsection