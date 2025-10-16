@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Specialties List</h4>
                    <a href="{{ route('specialties.create') }}" class="btn btn-primary">Add Specialties</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($specialties as $index => $specialty)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $specialty->title }}</td>
                                        <td>{{ $specialty->slug }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($specialty->description, 80) !!}</td>
                                        <td>
                                            @if($specialty->image)
                                                <img src="{{ asset($specialty->image) }}" alt="Image" style="width:50px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($specialty->icon)
                                                <img src="{{ asset($specialty->icon) }}" alt="Icon" style="width:50px;">
                                            @endif
                                        </td>
                                        <td>{{ $specialty->status ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <!-- View Button -->
                                            <a href="{{ route('specialties.show', $specialty->id) }}" class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('specialties.destroy', $specialty->id) }}" method="POST" class="delete-form" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $specialty->title }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($specialties->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">No specialties found.</td>
                                    </tr>
                                @endif
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
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const title = this.getAttribute('data-title');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete "${title}"! This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection