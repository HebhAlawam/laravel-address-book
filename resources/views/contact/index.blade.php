@extends('layouts.main')

@section('title')
Your Contacts
@endsection

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Contacts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Your Contacts</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <i class="fas fa-address-book me-1"></i>
                    All Contacts
                </div>
                <a class="btn btn-dark btn-sm" href="{{ route('contacts.create') }}">
                    <i class="fas fa-plus"></i> Add New
                </a>
            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('contacts.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name or phone..."
                            value="{{ request()->search }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                        @if(request()->has('search') && request()->search != '')
                            <a href="{{ route('contacts.index') }}" class="btn btn-outline-dark">
                                <i class="fas fa-times"></i> All
                            </a>
                        @endif
                    </div>
                </form>


                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif

                @if ($contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                                        <td>{{ $contact->first_name }}</td>
                                        <td>{{ $contact->last_name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->email ?? '-' }}</td>
                                        <td>{{ Str::limit($contact->notes, 50, '...')  ?? '-' }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')

                                                <div class="d-flex flex-wrap justify-content-center gap-2">

                                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-secondary" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-info" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-sm btn-danger btn-delete" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination links --}}
                    <div class="mt-3">
                        {{ $contacts->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="text-center text-muted mt-3">
                        <i class="fas fa-info-circle"></i> No contacts found.
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('script')

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This contact will be deleted permanently.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection

