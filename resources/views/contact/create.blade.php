@extends('layouts.main')

@section('title')
Add Contact
@endsection

@section('content')


    <div class="container-fluid px-4">
        <h1 class="mt-4">Contact</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Contact / Add</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card mb-4">
           <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-address-book me-1"></i>
                    Add New Contact
                </div>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to list
                </a>
            </div>

            <div class="card-body">

                <form id="form" method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <label for="first_name" class="form-label mt-2">
                        First Name <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('first_name') }}" id="first_name" type="text" name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        placeholder="e.g. John"
                        aria-describedby="first_name_help">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert" id="first_name_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="last_name" class="form-label mt-2">
                        Last Name <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('last_name') }}" id="last_name" type="text" name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        placeholder="e.g. Smith"
                        aria-describedby="last_name_help">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert" id="last_name_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="phone" class="form-label mt-2">
                        Phone <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('phone') }}" id="phone" type="tel" name="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        placeholder="e.g. +123456789"
                        aria-describedby="phone_help">
                    @error('phone')
                        <span class="invalid-feedback" role="alert" id="phone_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="email" class="form-label mt-2">Email</label>
                    <input value="{{ old('email') }}" id="email" type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="e.g. john@example.com"
                        aria-describedby="email_help">
                    @error('email')
                        <span class="invalid-feedback" role="alert" id="email_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="address" class="form-label mt-2">Address</label>
                    <input value="{{ old('address') }}" id="address" type="text" name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="e.g. 123 Main St"
                        aria-describedby="address_help">
                    @error('address')
                        <span class="invalid-feedback" role="alert" id="address_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="notes" class="form-label mt-2">Notes</label>
                    <textarea name="notes" id="notes"
                        class="form-control @error('notes') is-invalid @enderror"
                        placeholder="Any additional notes"
                        aria-describedby="notes_help">{{ old('notes') }}</textarea>
                    @error('notes')
                        <span class="invalid-feedback" role="alert" id="notes_help">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-dark">Save Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    {{-- Prevent double submission --}}
    <script>
        document.getElementById('form').addEventListener('submit', function () {
            const btn = this.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerText = 'Saving...';
        });
    </script>

@endsection
