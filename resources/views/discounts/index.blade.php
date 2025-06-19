@extends('layouts.app')

@section('title', 'Discounts')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">
                <section class="section section__bookings mt-5">
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1>Discounts</h1>
                        <a href="{{ route('discounts.create') }}" class="button">Add discount</a>
                    </div>
                </section>

                <section class="section section__customers-table mt-5">
                    {{-- Search & Sort Forms --}}
                    <div class="table-actions mb-5">
                        <form method="GET" action="{{ route('discounts.index') }}" class="table-actions__search">
                            <input name="search" type="text" class="input-box" placeholder="Search" value="{{ request('search') }}" />
                            <button class="button">Search</button>
                        </form>

                        <form method="GET" action="{{ route('discounts.index') }}" class="table-actions__sort">
                            <select name="sort" id="sort" class="input-box">
                                <option value="all" {{ request('sort') === 'all' ? 'selected' : '' }}>All</option>
                                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
                                <option value="validPeriod" {{ request('sort') === 'validPeriod' ? 'selected' : '' }}>Valid period</option>
                                <option value="discount" {{ request('sort') === 'discount' ? 'selected' : '' }}>Discount</option>
                                <option value="description" {{ request('sort') === 'description' ? 'selected' : '' }}>Description</option>
                                <option value="iglooName" {{ request('sort') === 'iglooName' ? 'selected' : '' }}>Igloo</option>
                            </select>
                            <button class="button">Sort</button>
                        </form>
                    </div>

                    {{-- Table --}}
                    <table class="table bookings-table promo-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Valid period</th>
                                <th scope="col">Description</th>
                                <th scope="col">Igloo</th>
                                <th scope="col">Discount</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $discount->name }}</td>
                                <td>
                                    {{ optional($discount->valid_from)->format('Y-m-d') }} -
                                    {{ optional($discount->valid_to)->format('Y-m-d') }}
                                </td>
                                <td>{{ $discount->description }}</td>
                                <td>{{ $discount->igloo?->name ?? '—' }}</td>
                                <td>{{ $discount->discount_percentage }}%</td>
                                <td>
                                    <div class="bookings-table__actions d-flex">
                                        <a href="{{ route('discounts.edit', $discount->id) }}">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                        </a>

                                        <a href="{{ route('discounts.show', $discount->id) }}" class="ms-2">
                                            <img src="{{ asset('icons/view.svg') }}" alt="View" />
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