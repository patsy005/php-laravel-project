@extends('layouts.app')

@section('title', 'Booking ' . $booking->id)

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">
                <section class="item-section section mt-5">
                    <a class="go-back" href="{{ route('bookings.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>

                    <div class="heading section-margin">
                        <h1 class="mt-4">Booking {{ $booking->id }}</h1>
                    </div>

                    <div class="item-section__overview section-box section-margin flex-md-row">
                        <div class="item-img col-12 col-md-5 col-lg-4">
                            <img src="{{ asset('images/igloos/' . $booking->igloo->image) }}" alt="Igloo Image" />
                        </div>
                        <div class="item-section__info col-12 col-md-7 justify-content-between">
                            <h3 class="item-section__title">{{ $booking->igloo->name }}</h3>

                            <div class="item-section__booking--info d-flex gap-4 align-items-center">
                                <div>
                                    <p class="promo uppercase-text">Amount</p>
                                    <p class="promo-title mt-2">${{ $booking->amount }}</p>
                                </div>
                                <div>
                                    <span class="status status__{{ $booking->status ?? 'pending' }} me-3">
                                        {{ ucfirst($booking->status ?? 'Pending') }}
                                    </span>
                                </div>
                            </div>

                            <div class="item-section__boxes flex-lg-row gap-lg-5 flex-wrap">
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Name</p>
                                        <p class="overview-card__stats--number">
                                            {{ $booking->customer->name }} {{ $booking->customer->surname }}
                                        </p>
                                    </div>
                                </div>
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Phone</p>
                                        <p class="overview-card__stats--number">
                                            {{ $booking->customer->phone_number }}
                                        </p>
                                    </div>
                                </div>
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Email</p>
                                        <p class="overview-card__stats--number">
                                            {{ $booking->customer->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="item-section__actions mt-3 d-flex gap-3">
                                <a href="{{ route('bookings.edit', $booking->id) }}">
                                    <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                </a>

                                <button
                                    class="svg-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $booking->id }}"
                                    data-name="{{ $booking->name }} {{ $booking->surname }}"
                                    data-url="{{ route('bookings.destroy', $booking->id) }}">
                                    <img src="{{ asset('icons/delete.svg') }}" alt="Delete" />
                                </button>

                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

@include('components.modals.delete')

@endsection