@extends('layouts.guest')

@section('title', 'Employee Login')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <main class="main">
                <section class="section section__form section__form--login">
                    <form action="{{ route('employee.login.submit') }}" method="POST" class="form w-50">
                        @csrf

                        {{-- Login --}}
                        <div class="input-container">
                            <label for="login">Login:</label>
                            <input
                                type="text"
                                name="login"
                                id="login"
                                class="input-box"
                                placeholder="Enter your login"
                                required
                                value="{{ old('login') }}" />
                            @error('login')
                            <p style="color: #FF4D4D">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="input-container">
                            <label for="password">Password:</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="input-box"
                                placeholder="Enter your password"
                                required />
                            @error('password')
                            <p style="color: #FF4D4D">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- General error --}}
                        @if ($errors->has('login') && !$errors->has('password'))
                        <p style="color: #FF4D4D">{{ $errors->first('login') }}</p>
                        @endif

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="button col-2 align-self-end">Login</button>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </div>
</div>
@endsection