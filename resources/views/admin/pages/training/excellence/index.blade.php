@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Excellences</h4>
      <a href="{{ route('admin.excellences.create') }}" class="btn btn-primary">Add Excellence</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Heading</th>
              <th>Description</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($excellences as $index => $item)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $item->heading }}</td>
              <td>{!! \Illuminate\Support\Str::limit(strip_tags($item->description), 50) !!}</td>
              <td>
                @if($item->image && file_exists(public_path('admin-assets/images/admin-image/excellences/'.$item->image)))
                  <img src="{{ asset('admin-assets/images/admin-image/excellences/'.$item->image) }}" width="80" class="rounded">
                @else
                  <span class="text-muted">No Image</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.excellences.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.excellences.destroy', $item->id) }}" method="POST" style="display:inline;" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $item->heading }}">
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center text-muted">No Excellences found.</td>
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
                text: `You are about to delete "${title}"!`,
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
