@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title mb-0">Program Registrations</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Program</th>
              <th>Location</th>
              <th>Document</th>
              <th>Message</th>
              <th>Submitted At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($registrations as $index => $reg)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $reg->name }}</td>
              <td>{{ $reg->email }}</td>
              <td>{{ $reg->mobile }}</td>
              <td>{{ $reg->trainingProgram?->name ?? 'N/A' }}</td>
              <td>{{ $reg->location }}</td>
              <td>
                @if($reg->document && file_exists(public_path($reg->document)))
                  <a href="{{ asset($reg->document) }}" target="_blank" class="text-primary">View</a>
                @else
                  <span class="text-muted">No Document</span>
                @endif
              </td>
              <td>{{ \Illuminate\Support\Str::limit($reg->message, 50) }}</td>
              <td>{{ $reg->created_at->format('d-m-Y H:i') }}</td>
              <td>
                <form action="{{ route('admin.program_registration.destroy', $reg->id) }}" method="POST" class="delete-form" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $reg->name }}">
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="10" class="text-center text-muted">No registrations found.</td>
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
                text: `You are about to delete the registration of "${title}"! This action cannot be undone.`,
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
