@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="card-title mb-0">Countries</h4>
      <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">Add Country</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Country Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($countries as $index => $country)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $country->name }}</td>
              <td>
                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>

                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" class="d-inline delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $country->name }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="text-center text-muted">No countries found.</td>
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
        text: `You are about to delete "${title}"! This action cannot be undone.`,
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
