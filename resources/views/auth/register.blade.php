@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow border-0 rounded-lg mt-5">
                <div class="card-header bg-dark text-white">
                    <h3 class="text-center my-2">Register</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required autofocus>
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required>
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   type="password"
                                   name="password"
                                   required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation"
                                   type="password"
                                   name="password_confirmation"
                                   required>
                            <label for="password_confirmation">Confirm Password</label>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small text-muted" href="{{ route('login') }}">Already have an account?</a>
                            <button class="btn btn-dark" type="submit">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
