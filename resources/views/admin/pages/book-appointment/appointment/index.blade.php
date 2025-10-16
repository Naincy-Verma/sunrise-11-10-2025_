@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Appointments</h4>
      <div>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-sm {{ !$status ? 'active' : '' }}">
          All ({{ $pendingCount + $confirmedCount + $cancelledCount }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'pending']) }}" 
           class="btn btn-warning btn-sm {{ $status === 'pending' ? 'active' : '' }}">
          Pending ({{ $pendingCount }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'confirmed']) }}" 
           class="btn btn-success btn-sm {{ $status === 'confirmed' ? 'active' : '' }}">
          Confirmed ({{ $confirmedCount }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'cancelled']) }}" 
           class="btn btn-danger btn-sm {{ $status === 'cancelled' ? 'active' : '' }}">
          Cancelled ({{ $cancelledCount }})
        </a>
      </div>
    </div>

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Patient</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Doctor</th>
              <th>Date</th>
              <th>Status</th>
              <th>Source</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($appointments as $index => $appointment)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $appointment->title }} {{ $appointment->first_name }} {{ $appointment->last_name }}</td>
              <td>{{ $appointment->email }}</td>
              <td>{{ $appointment->mobile_no }}</td>
              <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
              <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
              <td>
                @if($appointment->status === 'pending')
                  <span class="badge bg-warning ">Pending</span>
                @elseif($appointment->status === 'confirmed')
                  <span class="badge bg-success">Confirmed</span>
                @else
                  <span class="badge bg-danger">Cancelled</span>
                @endif
              </td>
              <td>{{ $appointment->source }}</td>
              <td>
                 <!-- View Button -->
                <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-info btn-sm" title="View">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $appointment->first_name }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="text-center text-muted">No appointments found.</td>
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
        text: `You are about to delete the appointment for "${title}".`,
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
