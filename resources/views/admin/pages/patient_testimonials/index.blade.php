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
                    <h4 class="card-title mb-0">Patient Testimonials</h4>
                    <a href="{{ route('admin.patient_testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Patient Name</th>
                                    <th>Title</th>
                                    <th>Testimonial</th>
                                    <th>Video</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $index => $testimonial)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $testimonial->patient_name }}</td>
                                        <td>{{ $testimonial->title ?? '-' }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit(strip_tags($testimonial->testimonial), 50) !!}</td>
                                        <td>
                                            @if($testimonial->video && file_exists(public_path('admin-assets/images/admin-image/testimonials/' . $testimonial->video)))
                                                @php
                                                    $ext = pathinfo($testimonial->video, PATHINFO_EXTENSION);
                                                @endphp
                                                <video width="160" height="120" controls preload="metadata">
                                                    <source src="{{ asset('admin-assets/images/admin-image/testimonials/' . $testimonial->video) }}" type="video/{{ $ext }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <span class="text-muted">No Video</span>
                                            @endif
                                        </td>

                                     <td>
                                        <a href="{{ route('admin.patient_testimonials.edit', $testimonial->id) }}" class="btn btn-info btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.patient_testimonials.show', $testimonial->id) }}" class="btn btn-secondary btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                       <form action="{{ route('admin.patient_testimonials.destroy', $testimonial->id) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $testimonial->patient_name }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No testimonials found.</td>
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
                text: `You are about to delete the testimonial of "${title}"! This action cannot be undone.`,
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
