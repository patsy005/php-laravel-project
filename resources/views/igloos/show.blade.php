{{-- resources/views/igloos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Igloo details')

@section('content')
<main class="main">
    <section class="section section__bookings item-section">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">

                    <div class="heading d-flex flex-column gap-5 align-items-start mb-4">
                        <h1 class="mb-5">Igloo #{{ $igloo->id }}</h1>

                        <a href="{{ url()->previous() ?? route('igloos.index') }}" class="back-icon">
                            <img src="{{ asset('icons/arrow-left.svg') }}" alt="Back" />
                        </a>
                    </div>

                    <div class="item-section__overview section-box section-margin d-flex flex-md-row user-item">

                        <div class="item-img col-12 col-md-5 col-lg-4">
                            <img src="{{ asset('images/igloos/' . $igloo->image) }}" alt="Igloo photo" />
                        </div>

                        <div class="item-section__info col-12 col-md-7">
                            <h3 class="item-section__title">{{ $igloo->name }}</h3>

                            <div class="item-section__boxes flex-lg-row gap-lg-5 flex-wrap flex-xxl-nowrap">

                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats">
                                        <div class="overview-card__stats--box">
                                            <p class="overview-card__stats--title">Capacity</p>
                                            <p class="overview-card__stats--number">{{ $igloo->capacity }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Cena za noc --}}
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats">
                                        <div class="overview-card__stats--box">
                                            <p class="overview-card__stats--title">Price per night</p>
                                            <p class="overview-card__stats--number">${{ $igloo->price_per_night }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-section__actions mt-3 d-flex gap-3">
                                    <a href="{{ route('igloos.edit', $igloo) }}" class="custom-table__actions--icon bg-transparent border-1">
                                        <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                    </a>

                                    <button
                                        class="svg-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $igloo->id }}"
                                        data-name="{{ $igloo->name }}"
                                        data-url="{{ route('igloos.destroy', $igloo->id) }}">
                                        <img src="{{ asset('icons/delete.svg') }}" alt="Delete" />
                                    </button>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

@include('components.modals.delete')

@endsection