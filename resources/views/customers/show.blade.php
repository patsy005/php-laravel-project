@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">


                <section class="item-section section mt-5">
                    <a class="go-back" href="{{ route('customers.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>

                    <div class="heading section-margin">
                        <h1 class="mt-4">Customer</h1>
                    </div>

                    <div class="item-section__overview section-box section-margin flex-md-row">
                        <div class="item-section__info col-12 col-md-7 justify-content-between">
                            <h3 class="item-section__title">
                                {{ $customer->name }} {{ $customer->surname }}
                            </h3>

                            <div class="item-section__booking--info d-flex gap-4">
                                <div>
                                    <p class="promo uppercase-text">email address</p>
                                    <p class="promo-title mt-2">{{ $customer->email }}</p>
                                </div>
                            </div>

                            <div class="item-section__boxes flex-lg-row gap-lg-5 flex-wrap">
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats">
                                        <div class="overview-card__stats--box">
                                            <p class="overview-card__stats--title">Phone no</p>
                                            <p class="overview-card__stats--number">
                                                {{ $customer->phone }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats">
                                        <div class="overview-card__stats--box">
                                            <p class="overview-card__stats--title">Nationality</p>
                                            <p class="overview-card__stats--number">
                                                {{ $customer->nationality }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-section__actions">
                                <a href="{{ route('customers.edit', $customer->id) }}" class="d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                </a>

                                <button
                                    class="svg-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $customer->id }}"
                                    data-name="{{ $customer->name }} {{ $customer->surname }}"
                                    data-url="{{ route('customers.destroy', $customer->id) }}">
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