@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="card-title mb-0">Quick Enquiries</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Mobile Number</th>
              <th>Preferred Time Slot</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($enquiries as $index => $enquiry)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $enquiry->name }}</td>
              <td>{{ $enquiry->mobile_number }}</td>
              <td>
                    @if ($enquiry->timeSlot)
                        {{ \Carbon\Carbon::parse($enquiry->timeSlot->start_time)->format('g:i A') }}
                        -
                        {{ \Carbon\Carbon::parse($enquiry->timeSlot->end_time)->format('g:i A') }}
                    @else
                        N/A
                    @endif
              </td>


              <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
              <td>
                <a href="{{ route('admin.quick-enquiries.show', $enquiry->id) }}" class="btn btn-secondary btn-sm">
                  <i class="fas fa-eye"></i>
                </a>
                <form action="{{ route('admin.quick-enquiries.destroy', $enquiry->id) }}" method="POST" style="display:inline;" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $enquiry->name }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted">No enquiries found.</td>
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
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            const title = this.getAttribute('data-title');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete enquiry from "${title}". This action cannot be undone.`,
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
