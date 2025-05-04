@extends('layouts.main')

@section('title')
Add Contact
@endsection

@section('content')
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Contact Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Contacts</li>
            <li class="breadcrumb-item active">{{ $contact->first_name }} {{ $contact->last_name }}</li>
        </ol>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-user me-1"></i>
                    {{ $contact->first_name }} {{ $contact->last_name }}
                </div>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>  Back to list
                </a>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Phone:</strong>
                        <div class="text-muted">{{ $contact->phone }}</div>
                    </div>

                    <div class="col-md-4">
                        <strong>Email:</strong>
                        <div class="text-muted">{{ $contact->email ?? '-' }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Address:</strong>
                    <div class="border rounded p-2 bg-light text-wrap">
                        {{ $contact->address ?? '-' }}
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Notes:</strong>
                    <div class="border rounded p-2 bg-light">
                        {!! nl2br(e($contact->notes ?? '-')) !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>
</div>
@endsection
