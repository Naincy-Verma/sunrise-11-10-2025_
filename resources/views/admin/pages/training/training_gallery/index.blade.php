@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Training Gallery</h4>
                    <a href="{{ route('admin.training-gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Images
                    </a>
                </div>

                <div class="card-body">

                    @if($gallery->count() > 0)
                        <div class="row">
                            @foreach($gallery as $index => $item)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card border-0 shadow-sm">
                                       <img src="{{ asset('admin-assets/images/admin-image/training_gallery/' . $item->image) }}" 
                                            class="card-img-top" 
                                            style="height:200px; object-fit:cover; border-radius:10px;">
                                        <div class="card-body text-center">
                                            <form action="{{ route('admin.training-gallery.destroy', $item->id) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm delete-btn" 
                                                        data-title="Image {{ $index + 1 }}">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center mb-0">No gallery images found.</p>
                    @endif
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
                text: `You are about to delete ${title}!`,
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
