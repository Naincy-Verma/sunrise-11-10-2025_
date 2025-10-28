@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Community Event Gallery</h4>
        <a href="{{ route('admin.community-events.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Events
        </a>
    </div>

    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card shadow-sm border-0 position-relative overflow-hidden">
                    <div class="image-container" style="overflow:hidden; height:180px;">
                        <img src="{{ asset('admin-assets/images/admin-image/community-events/gallery/'.$gallery->images) }}" 
                             class="card-img-top img-fluid" 
                             alt="{{ $gallery->caption ?? 'Gallery Image' }}"
                             style="height:180px; width:100%; object-fit:cover; transition:transform 0.4s ease;">
                    </div>
                    <div class="card-body text-center p-3">
                        @if($gallery->caption)
                            <p class="card-text text-muted small mb-2">{{ $gallery->caption }}</p>
                        @endif
                        <form action="{{ route('admin.community-gallery.destroy', $gallery->id) }}" method="POST" class="delete-form d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                    class="btn btn-sm btn-danger delete-btn px-3">
                                <i class="fas fa-trash-alt me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-5 mt-4">No gallery images found for this event.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hover zoom effect
    document.querySelectorAll('.card img').forEach(img => {
        img.addEventListener('mouseover', () => img.style.transform = 'scale(1.05)');
        img.addEventListener('mouseout', () => img.style.transform = 'scale(1)');
    });

    // Delete confirmation popup
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This image will be permanently deleted.",
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
