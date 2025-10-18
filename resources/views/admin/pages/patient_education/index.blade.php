@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Patient Education</h4>
      <a href="{{ route('admin.patient-education.create') }}" class="btn btn-primary">Add Patient Education</a>
    </div>

    <div class="table-responsive mt-3">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
          <tr>
            <th>No.</th>
            <th>Heading</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
              $grouped = $educations->groupBy('heading');
          @endphp

          @forelse($grouped as $heading => $items)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $heading }}</td>
              <td>{!! \Illuminate\Support\Str::limit($items->first()->description, 100) !!}</td>
              <td>
                <!-- Show Page -->
                <a href="{{ route('admin.patient-education.show', $items->first()->id) }}" class="btn btn-secondary btn-sm" title="View">
                  <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('admin.patient-education.edit', $items->first()->id) }}" class="btn btn-info btn-sm" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('admin.patient-education.destroy', $items->first()->id) }}" method="POST" class="d-inline delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $heading }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-muted">No Patient Education records found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
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
