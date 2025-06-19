@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="section section__bookings mt-5">
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1>Bookings</h1>
                        <a href="{{ route('bookings.create') }}" class="button">Add booking</a>
                    </div>
                </section>

                <section class="section section__bookings-table mt-5">
                    <div class="table-actions mb-5">
                        <form method="GET" class="table-actions__search">
                            <input type="text" name="search" class="input-box" placeholder="Search" value="{{ request('search') }}" />
                            <button class="button">Search</button>
                        </form>

                        <form method="GET" class="table-actions__sort">
                            <select name="sort" id="sort" class="input-box">
                                <option value="all" {{ request('sort') === 'all' ? 'selected' : '' }}>All</option>
                                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Igloo name</option>
                                <option value="checkIn" {{ request('sort') === 'checkIn' ? 'selected' : '' }}>Check in</option>
                                <option value="checkOut" {{ request('sort') === 'checkOut' ? 'selected' : '' }}>Check out</option>
                                <option value="amount" {{ request('sort') === 'amount' ? 'selected' : '' }}>Amount</option>
                                <option value="bookingStatus" {{ request('sort') === 'bookingStatus' ? 'selected' : '' }}>Status</option>
                            </select>
                            <button class="button">Sort</button>
                        </form>
                    </div>

                    <table class="table bookings-table">
                        <thead>
                            <tr>
                                <th>Igloo</th>
                                <th>Guest</th>
                                <th>Dates</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->igloo->name ?? '-' }}</td>
                                <td>
                                    <div class="bookings-table__guest">
                                        <span class="name">{{ $booking->customer->name ?? '' }} {{ $booking->customer->surname ?? '' }}</span>
                                        <span class="email">{{ $booking->customer->email ?? '' }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($booking->check_in_date)->format('Y-m-d') }} -
                                    {{ \Carbon\Carbon::parse($booking->check_out_date)->format('Y-m-d') }}
                                </td>
                                <td>${{ $booking->amount }}</td>
                                <td>
                                    <div class="status status__{{ strtolower($booking->status ?? 'pending') }}">
                                        {{ ucfirst($booking->status ?? 'Pending') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="bookings-table__actions">
                                        <a href="{{ route('bookings.edit', $booking->id) }}">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                        </a>
                                        <a href="{{ route('bookings.show', $booking->id) }}">
                                            <img src="{{ asset('icons/view.svg') }}" alt="View" />
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>
</div>

@include('components.modals.delete')

@endsection