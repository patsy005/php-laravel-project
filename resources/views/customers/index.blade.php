@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="section section__bookings mt-5">
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1>Customers</h1>
                        <a href="{{ route('customers.create') }}" class="button">Add customer</a>
                    </div>
                </section>

                <section class="section section__customers-table mt-5">
                    <div class="table-actions mb-5">
                        <form method="GET" class="table-actions__search">
                            <input name="search" type="text" class="input-box" placeholder="Search" value="{{ request('search') }}" />
                            <button class="button">Search</button>
                        </form>

                        <form method="GET" class="table-actions__sort">
                            <select name="sort" id="sort" class="input-box">
                                <option value="all" {{ request('sort') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="nationality" {{ request('sort') == 'nationality' ? 'selected' : '' }}>Nationality</option>
                                <option value="street" {{ request('sort') == 'street' ? 'selected' : '' }}>Address</option>
                            </select>
                            <button class="button">Sort</button>
                        </form>
                    </div>

                    <table class="table bookings-table customers-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Nationality</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="bookings-table__guest">
                                        <span class="name">{{ $customer->name }} {{ $customer->surname }}</span>
                                        <span class="email">{{ $customer->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="customers-table__phone">{{ $customer->phone }}</div>
                                </td>
                                <td>
                                    <div class="customers-table__address">
                                        <span class="street">{{ $customer->street }} {{ $customer->street_number }}</span>
                                        <span class="city">{{ $customer->city }} {{ $customer->postal_code }}</span>
                                        <span class="country">{{ $customer->country }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="employees-table__nationality">{{ $customer->nationality }}</div>
                                </td>
                                <td>
                                    <div class="bookings-table__actions">
                                        <a href="{{ route('customers.edit', $customer->id) }}">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                        </a>
                                        <a href="{{ route('customers.show', $customer->id) }}">
                                            <img src="{{ asset('icons/view.svg') }}" alt="View" />
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