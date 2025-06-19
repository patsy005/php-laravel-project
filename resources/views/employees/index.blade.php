@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">

                <section class="section section__bookings mt-5">
                    <div class="heading d-flex justify-content-between mb-5">
                        <h1>Employees</h1>
                        <a href="{{ route('employees.create') }}" class="button">Add employee</a>
                    </div>
                </section>

                <section class="section section__users-table mt-5">
                    <div class="table-actions mb-5">
                        <form method="GET" class="table-actions__search">
                            <input type="text" name="search" class="input-box" placeholder="Search" value="{{ request('search') }}" />
                            <button class="button">Search</button>
                        </form>

                        <form method="GET" class="table-actions__sort">
                            <select name="sort" id="sort" class="input-box">
                                <option value="all" {{ request('sort') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="role" {{ request('sort') == 'role' ? 'selected' : '' }}>Role</option>
                            </select>
                            <button class="button">Sort</button>
                        </form>
                    </div>

                    <table class="table bookings-table users-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $emp)
                            <tr>
                                <td><img class="igloos-table__img" src="{{ asset('images/employees/' . $emp->image) }}" alt="Employee photo" /></td>
                                <td>
                                    <div class="users-table__name">
                                        <span class="name">{{ $emp->name }} {{ $emp->surname }}</span>
                                        <span class="email">{{ $emp->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="users-table__address">
                                        <span class="street">{{ $emp->street }} {{ $emp->street_number }}</span>
                                        <span class="city">{{ $emp->city }} {{ $emp->postal_code }}</span>
                                        <span class="country">{{ $emp->country }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="users-table__role">{{ $emp->role->name ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="status status__active">Active</div>
                                </td>
                                <td>
                                    <div class="bookings-table__actions">
                                        <a href="{{ route('employees.edit', $emp->id) }}">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit" />
                                        </a>

                                        <a href="{{ route('employees.show', $emp->id) }}">
                                            <img src="{{ asset('icons/view.svg') }}" alt="View" />
                                        </a>

                                        <button
                                            class="svg-button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $emp->id }}"
                                            data-name="{{ $emp->name }} {{ $emp->surname }}"
                                            data-url="{{ route('employees.destroy', $emp->id) }}">
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