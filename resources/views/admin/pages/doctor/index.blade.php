@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Doctors List</h4>
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">Add Doctor</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <p class="text-success mb-3">{{ session('success') }}</p>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Speciality</th>
                                    <th>Designation</th>
                                    <th>Experience</th>
                                    <th>Qualification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $index => $doctor)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($doctor->profile_image)
                                                <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" width="50" class="rounded">
                                            @endif
                                        </td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->speciality->title ?? '—' }}</td>
                                        <td>{{ $doctor->designation }}</td>
                                        <td>{{ $doctor->experience }}</td>
                                        <td>{{ $doctor->qualification }}</td>
                                        <td>
                                            <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $doctor->name }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No doctors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const title = this.getAttribute('data-title');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete "${title}". This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
});
</script>
@endsection
