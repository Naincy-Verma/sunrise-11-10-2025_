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
                    <h4 class="card-title mb-0">Vision & Mission List</h4>
                    <a href="{{ route('admin.vision-mission.create') }}" class="btn btn-primary">Add Vision/Mission</a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Vission Icon</th>
                                    <th>VissionHeading</th>
                                    <th>Vission Description</th>
                                    <th>Mission Icon </th>
                                    <th>Mission Heading</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($visions as $index => $vision)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $vision->icon_vission }}</td>
                                        <td>{{ $vision->heading_vission }}</td>
                                        <td>{{ $vision->vission_description }}</td>
                                        <td>{{ $vision->icon_mission }}</td>
                                        <td>{{ $vision->heading_mission }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.vision-mission.show', $vision->id) }}" class="btn btn-info btn-sm me-2" title="View"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.vision-mission.edit', $vision->id) }}" class="btn btn-primary btn-sm me-2" title="Edit"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.vision-mission.destroy', $vision->id) }}" method="POST" class="delete-form m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-title="{{ $vision->heading }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No Vision/Mission found.</td>
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
                text: `You are about to delete "${title}"!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
});
</script>
@endsection
