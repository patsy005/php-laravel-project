@extends('layouts.app')

@section('title', 'Promotion')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="item-section section mt-5">
                    <a class="go-back" href="{{ route('discounts.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>

                    <div class="heading section-margin">
                        <h1 class="mt-4">Promotion</h1>
                    </div>

                    <div class="item-section__overview section-box section-margin flex-md-row">
                        <div class="item-section__info col-12 col-md-7 justify-content-between">
                            <h3 class="item-section__title">{{ $discount->name }}</h3>

                            <div class="item-section__booking--info d-flex gap-4">
                                <div>
                                    <p class="promo uppercase-text">Description</p>
                                    <p class="promo-title mt-2">{{ $discount->description ?: '-' }}</p>
                                </div>
                            </div>

                            <div class="item-section__boxes flex-lg-row gap-lg-5 flex-wrap">
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats">
                                        <div class="overview-card__stats--box">
                                            <p class="overview-card__stats--title">Discount</p>
                                            <p class="overview-card__stats--number">{{ $discount->discount_percentage }}%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-section__promo mt-3">
                                <p class="promo uppercase-text">Igloo</p>
                                <div class="item-section__promo--igloos my-3 d-flex gap-5 flex-wrap">
                                    <div class="item-section__promo--igloo-box">{{ $discount->igloo?->name ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="item-section__actions">
                                <a href="{{ route('discounts.edit', $discount->id) }}">
                                    <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                </a>

                                <button
                                    class="svg-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $discount->id }}"
                                    data-name="{{ $discount->name }} {{ $discount->surname }}"
                                    data-url="{{ route('discounts.destroy', $discount->id) }}">
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