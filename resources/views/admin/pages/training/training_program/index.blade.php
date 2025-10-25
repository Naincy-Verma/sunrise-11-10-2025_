@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Training Programs</h4>
      <a href="{{ route('admin.training_program.create') }}" class="btn btn-primary">Add Program</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>S.No</th>
              <th>Course</th>
              <th>Duration</th>
              <th>Schedule</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($programs as $index => $program)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $program->s_no }}</td>
              <td>{{ $program->training_course }}</td>
              <td>{{ $program->duration }}</td>
              <td>{{ $program->schedule }}</td>
              <td>
                <a href="{{ route('admin.training_program.edit', $program->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.training_program.destroy', $program->id) }}" method="POST" style="display:inline;" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $program->training_course }}">
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted">No Training Programs found.</td>
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
