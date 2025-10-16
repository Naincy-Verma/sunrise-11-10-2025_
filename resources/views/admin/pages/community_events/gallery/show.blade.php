@extends('admin.layouts.master')
 @section('styles') 
 <style>
  .gallery-card {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
    border-radius: 10px;
  }

  .gallery-card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  .gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.2s;
  }

  .gallery-card:hover .gallery-overlay {
    opacity: 1;
  }

  .gallery-overlay button {
    background: rgba(255, 0, 0, 0.8);
    border: none;
  }
</style>
 @endsection 
 @section('content') 
 <div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Gallery for Event: <span class="text-primary">{{ $event->title }}</span>
    </h4>
  </div>
  <div class="row g-3">
     @forelse($galleries as $gallery) <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow-sm gallery-card">
        <div class="position-relative overflow-hidden">
          <img src="{{ asset('admin-assets/images/admin-image/community-events/gallery/'.$gallery->images) }}" class="card-img-top" style="height:200px; object-fit:cover;"> @if($gallery->caption) <div class="card-body py-2 px-3">
            <p class="mb-0 text-truncate">
              <strong>Caption:</strong> {{ $gallery->caption }}
            </p>
          </div> @endif
        </div>
        <div class="gallery-overlay d-flex flex-column justify-content-center align-items-center py-3">
          <form action="{{ route('community-gallery.destroy', $gallery->id) }}" method="POST" class="delete-form"> @csrf @method('DELETE') <button type="button" class="btn btn-sm btn-danger delete-btn">
              <i class="fas fa-trash-alt"></i> Delete </button>
          </form>
        </div>
      </div>
    </div> 
    @empty <p class="text-muted">No gallery images found for this event.</p> @endforelse </div>
  <div class="row">
    <div class="col-12">
      <a href="{{ route('community-events.index') }}" class="btn btn-primary text-white">
        <i class="fas fa-arrow-left"></i> Back to Events </a>
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