@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Community Events List</h4>
                    <a href="{{ route('admin.community-events.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Community Event
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 15%;">Title</th>
                                    <th style="width: 15%;">Slug</th>
                                    <th style="width: 20%;">Short Description</th>
                                    <th style="width: 25%;">Long Description</th>
                                    <th style="width: 10%;">Image</th>
                                    <th style="width: 10%;">Actions</th>
                                     <th style="width: 10%;">Gallery</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($events as $index => $event)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->slug }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($event->short_description, 20) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($event->long_description, 40) }}</td>

                                        <td>
                                            @if($event->image)
                                                <img src="{{ asset('admin-assets/images/admin-image/community-events/'.$event->image) }}" 
                                                     alt="{{ $event->title }}" 
                                                     class="img-thumbnail" 
                                                     style="width:70px; height:70px; object-fit:cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <!-- View Event -->
                                                <a href="{{ route('admin.community-events.show', $event->id) }}" 
                                                class="btn btn-info btn-sm" 
                                                title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Edit Event -->
                                                <a href="{{ route('admin.community-events.edit', $event->id) }}" 
                                                class="btn btn-primary btn-sm" 
                                                title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete Event -->
                                                <form action="{{ route('admin.community-events.destroy', $event->id) }}" 
                                                    method="POST" 
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="btn btn-danger btn-sm delete-btn" 
                                                            data-title="{{ $event->title }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.community-gallery.create', ['event_id' => $event->id]) }}" 
                                                class="btn btn-sm text-white" 
                                                style="background: linear-gradient(45deg, #fbb034, #ffdd00); border:none;">
                                                <i class="fas fa-images me-1"></i> Add
                                                </a>
                                                <a href="{{ route('admin.community-gallery.show', $event->id) }}" 
                                                class="btn btn-sm text-white" 
                                                style="background: linear-gradient(45deg, #38ef7d, #11998e); border:none;">
                                                <i class="fas fa-photo-video me-1"></i> View
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No community events found.</td>
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
                text: `You are about to delete "${title}"! This action cannot be undone.`,
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
