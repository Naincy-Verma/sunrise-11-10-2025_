    @extends('admin.layouts.master')

    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Specialities List</h4>
                        <a href="{{ route('admin.specialities.create') }}" class="btn btn-primary">Add Speciality</a>
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
                                    @forelse($specialities as $index => $speciality)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $speciality->title }}</td>
                                            <td>{{ $speciality->slug }}</td>
                                            <td>{!! Str::limit($speciality->description, 80) !!}</td>
                                            <td>
                                                @if($speciality->image)
                                                    <img src="{{ asset($speciality->image) }}" alt="Image" style="width:50px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if($speciality->icon)
                                                    <img src="{{ asset($speciality->icon) }}" alt="Icon" style="width:50px;">
                                                @endif
                                            </td>
                                            <td>{{ $speciality->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('admin.specialities.show', $speciality->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.specialities.edit', $speciality->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.specialities.destroy', $speciality->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $speciality->title }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No specialities found.</td>
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
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    });
    </script>
    @endsection
