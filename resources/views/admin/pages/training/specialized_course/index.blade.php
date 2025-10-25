@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Specialized Courses</h4>
      <a href="{{ route('admin.specialized_course.create') }}" class="btn btn-primary">Add Course</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Badge</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($courses as $index => $course)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $course->title }}</td>
              <td>{{ $course->sub_title ?: 'N/A' }}</td>
              <td>{{ $course->badge_label }}</td>
              <td>${{ $course->price }}</td>
              <td>{{ ucfirst($course->status) }}</td>
              <td>
                <a href="{{ route('admin.specialized_course.edit', $course->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.specialized_course.destroy', $course->id) }}" method="POST" style="display:inline;" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $course->title }}">
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted">No courses found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
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
                text: `You are about to delete "${title}"!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then(result => {
                if(result.isConfirmed) form.submit();
            });
        });
    });
});
</script>
@endsection
