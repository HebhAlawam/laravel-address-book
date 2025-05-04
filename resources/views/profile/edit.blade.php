@extends('layouts.main')

@section('title')
Your Profile
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Your Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Manage your profile settings</li>
    </ol>

    {{-- Profile Info --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Profile Information
        </div>
        <div class="card-body">
             @if (session('status') === 'profile-updated')
                <div class="alert alert-success mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i> Profile Information updated successfully.
                </div>
            @endif
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', auth()->user()->name) }}" required autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input id="email" name="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Update Password --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-lock me-1"></i>
            Update Password
        </div>
        <div class="card-body">
            @if (session('status') === 'password-updated')
                <div class="alert alert-success mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i> Password updated successfully.
                </div>
            @endif
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                    <input id="current_password" name="current_password" type="password"
                        class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}"
                        autocomplete="current-password" required>
                    @if ($errors->updatePassword->has('current_password'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('current_password') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                    <input id="password" name="password" type="password"
                        class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}"
                        autocomplete="new-password" required>
                    @if ($errors->updatePassword->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}"
                        autocomplete="new-password">
                    @if ($errors->updatePassword->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>

        </div>
    </div>

    {{-- Delete Account --}}
    <div class="card mb-4">
        <div class="card-header bg-danger text-white">
            <i class="fas fa-trash me-1"></i>
            Delete Account
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.destroy') }}" class="delete-account-form">

                @csrf
                @method('delete')

                <p class="mb-3 text-danger">
                    Once your account is deleted, all of its resources and data will be permanently deleted.
                </p>

                <div class="mb-3">
                    <label for="delete_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input id="delete_password" name="password" type="password"
                        class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Enter your password to confirm" required>

                    @if ($errors->userDeletion->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>


                <button type="submit" class="btn btn-danger">Delete Account</button>


            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.querySelector('.delete-account-form').addEventListener('submit', function(e) {
        e.preventDefault(); // منع الإرسال المبدئي

        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete your account.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // أرسل النموذج فعليًا
            }
        });
    });
</script>
@endsection
