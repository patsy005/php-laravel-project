@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="item-section section mt-5">
                    <a class="go-back" href="{{ route('employees.index') }}">
                        <img src="{{ asset('icons/arrow-left.svg') }}" alt="Go back" />
                    </a>

                    <div class="heading section-margin">
                        <h1 class="mt-4">Employee</h1>
                    </div>

                    <div class="item-section__overview section-box section-margin flex-md-row">
                        <div class="item-img col-12 col-md-5 col-lg-4">
                            <img src="{{ asset('images/employees/' . $employee->image) }}" alt="Employee image" />
                        </div>

                        <div class="item-section__info col-12 col-md-7 justify-content-between">
                            <h3 class="item-section__title">
                                {{ $employee->name }} {{ $employee->surname }}
                            </h3>

                            <div class="item-section__booking--info d-flex gap-4">
                                <div>
                                    <p class="promo uppercase-text">Email address</p>
                                    <p class="promo-title mt-2">{{ $employee->email }}</p>
                                </div>
                            </div>

                            <div class="item-section__boxes flex-lg-row gap-lg-5 flex-wrap">
                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Phone no</p>
                                        <p class="overview-card__stats--number">{{ $employee->phone }}</p>
                                    </div>
                                </div>

                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Role</p>
                                        <p class="overview-card__stats--number">{{ $employee->role->name ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="overview-card col-9 col-sm-7 col-md-8 col-lg-5 col-xxl-4 mt-3">
                                    <div class="overview-card__stats--box">
                                        <p class="overview-card__stats--title">Address</p>
                                        <p class="overview-card__stats--number">
                                            {{ $employee->street }} {{ $employee->street_number }}
                                        </p>
                                        <p class="additional">{{ $employee->postal_code }}, {{ $employee->city }}</p>
                                        <p class="additional">{{ $employee->country }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item-section__actions d-flex gap-3 mt-4">
                                <a href="{{ route('employees.edit', $employee->id) }}" class="svg-button">
                                    <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                </a>

                                <button
                                    class="svg-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $employee->id }}"
                                    data-name="{{ $employee->name }} {{ $employee->surname }}"
                                    data-url="{{ route('employees.destroy', $employee->id) }}">
                                    <img src="{{ asset('icons/delete.svg') }}" alt="Delete" />
                                </button>
                            </div>

                        </div>
                    </div>

                </section>

                @include('components.modals.delete')

            </main>
        </div>
    </div>
</div>
@endsection