@extends('admin.layouts.master')

@section('css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">About Sections List</h4>
                    <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Add About</a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Heading</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Small Image 1</th>
                                    <th>Small Image 2</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($abouts as $index => $about)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $about->heading }}</td>
                                        <td>{{ $about->slug }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($about->description, 50) !!}</td>
                                        <td>
                                            @if($about->image)
                                                <img src="{{ asset('admin-assets/images/admin-image/abouts/'. $about->image) }}" alt="About Image" style="width:50px; height:50px; object-fit:cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($about->image_small1)
                                                <img src="{{ asset('admin-assets/images/admin-image/abouts/' . $about->image_small1) }}" alt="Small Image 1" style="width:50px; height:50px; object-fit:cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($about->image_small2)
                                                <img src="{{ asset('admin-assets/images/admin-image/abouts/' . $about->image_small2) }}" alt="Small Image 2" style="width:50px; height:50px; object-fit:cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- View -->
                                                <a href="{{ route('admin.about.show', $about->id) }}" class="btn btn-info btn-sm me-2" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="delete-form m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $about->heading }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No About sections found.</td>
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
