@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #ccc;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        background: #f1f5f9;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        margin-top: 15px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Header -->
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Edit Community Event</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.community-events.index') }}">Community Events</a></li>
        <li class="breadcrumb-item active">Edit Event</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Update Event Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.community-events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">🏥 Basic Information</div>
            </div>

            <!-- Title -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Event Title <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" 
                           value="{{ old('title', $event->title) }}" required>
                </div>
            </div>

            <!-- Slug -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Slug (Auto Generated)</label>
                    <input type="text" id="slug" name="slug" 
                           class="form-control" 
                           value="{{ old('slug', $event->slug) }}" readonly>
                </div>
            </div>

            <!-- Short Description -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" 
                           value="{{ old('short_description', $event->short_description) }}">
                </div>
            </div>

            <!-- Long Description -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control" rows="8">{{ old('long_description', $event->long_description) }}</textarea>
                </div>
            </div>

            <!-- Main Image -->
            <div class="col-lg-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload / Change Main Image</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form custom_file_input">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" id="event_image" name="image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp">
                        <label class="custom-file-label">Choose new image</label>
                      </div>
                    </div>

                    <!-- Show current image -->
                    @if($event->image)
                      <p class="mt-2 mb-1 fw-bold">Current Image:</p>
                      <img src="{{ asset('admin-assets/images/admin-image/community-events/'.$event->image) }}" 
                           alt="{{ $event->title }}" 
                           class="preview-img mb-2">
                    @endif

                    <!-- New image preview -->
                    <img id="imagePreview" class="preview-img" style="display:none;" alt="New Preview">
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-success">Update Event</button>
            <a href="{{ route('admin.community-events.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    titleInput.addEventListener('keyup', function() {
        let val = this.value.trim().toLowerCase();
        val = val.replace(/[^a-z0-9\s-]/g, '');
        val = val.replace(/\s+/g, '-');
        slugInput.value = val;
    });

    // Image preview
    const eventImage = document.getElementById('event_image');
    const imagePreview = document.getElementById('imagePreview');
    if (eventImage) {
        eventImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endsection
