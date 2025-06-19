@extends('layouts.app')

@section('title', 'Igloos')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">

            <section class="section section__bookings mt-5">
                <div class="heading d-flex justify-content-between mb-5">
                    <h1>Igloos</h1>
                    <a href="{{ route('igloos.create') }}" class="button">Add igloo</a>
                </div>
            </section>

            <section class="section section__bookings-table mt-5">
                <div class="table-actions mb-5">
                    <form method="GET" class="table-actions__search">
                        <input type="text" name="search" id="search" class="input-box" placeholder="Search by name"
                            value="{{ request('search') }}" />
                        <button class="button">Search</button>
                    </form>

                    <form method="GET" class="table-actions__sort">
                        <select name="sort" id="sort" class="input-box">
                            <option value="all" {{ request('sort') == 'all' ? 'selected' : '' }}>All</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="capacity" {{ request('sort') == 'capacity' ? 'selected' : '' }}>Capacity</option>
                            <option value="pricePerNight" {{ request('sort') == 'pricePerNight' ? 'selected' : '' }}>Price</option>
                        </select>
                        <button class="button">Sort</button>
                    </form>
                </div>


                <table class="table bookings-table igloos-table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">$ per night</th>
                            <th scope="col">Promotion</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($igloos as $igloo)
                        <tr>
                            <td>
                                <img loading="lazy" class="igloos-table__img" src="{{ asset('images/igloos/' . $igloo->image) }}" alt="Igloo Image" />
                            </td>
                            <td>
                                <div class="igloos-table__name">
                                    {{ $igloo->name }}
                                </div>
                            </td>
                            <td>
                                <div class="igloos-table__capacity">
                                    {{ $igloo->capacity }}
                                </div>
                            </td>
                            <td>
                                <div class="igloos-table__price">$
                                    {{ $igloo->price_per_night }}
                                </div>
                            </td>
                            <td>
                                <div class="igloos-table__promotion">
                                    {{ $igloo->discount ? $igloo->discount->discount_percentage . '%' : '-' }}
                                </div>
                            </td>

                            <td>
                                <div class="bookings-table__actions">
                                    <form class="d-flex align-items-center justify-content-center" method="get">
                                        <input type="hidden" name="id" value="{{ $igloo->id }}" />
                                        <a href="{{ route('igloos.edit', $igloo->id) }}">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                        </a>
                                    </form>


                                    <form class="d-flex align-items-center justify-content-center" method="get">
                                        <input type="hidden" name="id" value="{{ $igloo->id }}" />
                                        <a href="{{ route('igloos.show', $igloo->id) }}">
                                            <img src="{{ asset('icons/view.svg') }}" alt="View" />
                                        </a>

                                    </form>


                                    <button class="svg-button" data-bs-toggle="modal" data-bs-target="#deleteIglooModal" data-id="{{ $igloo->id }}" data-name="{{ $igloo->name }}">
                                        <img src="{{ asset('icons/delete.svg') }}" alt="Delete" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

        </div>
    </div>
</div>

<!-- Delete Igloo Modal -->

@include('components.modals.delete')


@endsection