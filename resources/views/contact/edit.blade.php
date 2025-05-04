@extends('layouts.main')

@section('title')
Edit Contact
@endsection

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Contact</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Contact</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-user-edit me-1"></i>
                    Edit Contact
                </div>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to list
                </a>
            </div>

            <div class="card-body">
                <form id="form" method="POST" action="{{ route('contacts.update', $contact->id) }}">
                    @csrf
                    @method('PUT')

                    <label for="first_name" class="form-label mt-2">
                        First Name <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('first_name', $contact->first_name) }}" id="first_name" type="text"
                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                        placeholder="e.g. John">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="last_name" class="form-label mt-2">
                        Last Name <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('last_name', $contact->last_name) }}" id="last_name" type="text"
                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        placeholder="e.g. Smith">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="phone" class="form-label mt-2">
                        Phone <span class="text-danger">*</span>
                    </label>
                    <input value="{{ old('phone', $contact->phone) }}" id="phone" type="tel"
                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                        placeholder="e.g. +123456789">
                    @error('phone')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="email" class="form-label mt-2">Email</label>
                    <input value="{{ old('email', $contact->email) }}" id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="e.g. john@example.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="address" class="form-label mt-2">Address</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                        placeholder="e.g. 123 Main St">{{ old('address', $contact->address) }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="notes" class="form-label mt-2">Notes</label>
                    <textarea id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror"
                        placeholder="Any additional notes">{{ old('notes', $contact->notes) }}</textarea>
                    @error('notes')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-dark">Update Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')

{{-- Prevent double submit --}}
    <script>
        document.getElementById('form').addEventListener('submit', function () {
            const btn = this.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerText = 'Updating...';
        });
    </script>
@endsection

