@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow border-0 rounded-lg mt-5">
                <div class="card-header bg-dark text-white">
                    <h3 class="text-center my-2">Login</h3>
                </div>
                <div class="card-body bg-light">

                    {{-- Session Status --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror"
                                   id="inputEmail"
                                   type="email"
                                   name="email"
                                   placeholder="name@example.com"
                                   value="{{ old('email') }}"
                                   required autofocus>
                            <label for="inputEmail">Email address</label>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password') is-invalid @enderror"
                                   id="inputPassword"
                                   type="password"
                                   name="password"
                                   placeholder="Password"
                                   required>
                            <label for="inputPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="remember" type="checkbox" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                         <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small text-muted" href="{{ route('register') }}">Need an account? Sign up!</a>
                            <button class="btn btn-dark" type="submit">Login</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
