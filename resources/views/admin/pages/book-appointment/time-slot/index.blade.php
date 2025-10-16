@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="card-title mb-0">Time Slots</h4>
      <a href="{{ route('admin.time-slots.create') }}" class="btn btn-primary">Add Time Slot</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($timeslots as $index => $timeslot)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ date('h:i A', strtotime($timeslot->start_time)) }}</td>
              <td>{{ date('h:i A', strtotime($timeslot->end_time)) }}</td>
              <td>
                  @if($timeslot->status == 'active')
                    <span class="badge bg-success text-white">Active</span>
                  @else
                    <span class="badge bg-secondary text-white">Inactive</span>
                  @endif
              </td>

              <td>
                <a href="{{ route('admin.time-slots.edit', $timeslot->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.time-slots.destroy', $timeslot->id) }}" method="POST" class="d-inline delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="Time Slot {{ $timeslot->id }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center text-muted">No time slots found.</td>
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
      if (result.isConfirmed) form.submit();
    });
  });
});
</script>
@endsection
