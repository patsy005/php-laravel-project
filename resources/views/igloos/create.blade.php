@extends('layouts.app')

@section('title', 'Igloos create')

@section('content')

<div class="wrapper">
    <div class="row">
        <div class="col-12">

            <section class="section section__bookings mt-5">
                <a class="go-back" href="{{ url()->previous() ?? route('home') }}">
                    <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                </a>
                <div class="heading d-flex justify-content-between mb-5">
                    <h1 class="mt-4">Add igloo</h1>
                </div>
            </section>


            <section class="section section__form">

                <form action="{{ route('igloos.store') }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf

                    <div class="input-container">
                        <label for="name">Igloo name</label>
                        <input type="text" name="name" id="name" class="input-box" value="{{ old('name') }}" />
                        @error('name') <p style='color: #FF4D4D'>{{ $message }}</p> @enderror
                    </div>

                    <div class="input-container">
                        <label for="capacity">Igloo capacity</label>
                        <input type="number" name="capacity" id="capacity" class="input-box" value="{{ old('capacity') }}" />
                        @error('capacity') <p style='color: #FF4D4D'>{{ $message }}</p> @enderror
                    </div>

                    <div class="input-container">
                        <label for="pricePerNight">Price per night</label>
                        <input type="number" step=".1" name="price_per_night" id="pricePerNight" class="input-box" value="{{ old('price_per_night') }}" />

                        @error('price_per_night') <p style='color: #FF4D4D'>{{ $message }}</p> @enderror
                    </div>

                    <div class="input-container input-container--checkbox">
                        <label for="image">Image</label>
                        <input type="file" lang="en" name="image" id="image" class="input-box" />
                    </div>

                    <button class="button col-2 align-self-end" type="submit" name="submit">Add igloo</button>
                </form>
            </section>
        </div>
    </div>
</div>

@endsection