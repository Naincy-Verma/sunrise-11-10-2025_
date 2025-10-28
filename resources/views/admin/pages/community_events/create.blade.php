@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: none;
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
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Add Community Event</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.community-events.index') }}">Community Events</a></li>
        <li class="breadcrumb-item active">Add Event</li>
      </ol>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Event Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.community-events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">🏥 Basic Information</div>
            </div>

            <!-- Title -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Event Title <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter event title" required>
                </div>
            </div>

            <!-- Auto Slug -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Slug (Auto Generated)</label>
                    <input type="text" id="slug" name="slug" class="form-control" readonly>
                </div>
            </div>

            <!-- Short Description -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" placeholder="Brief summary">
                </div>
            </div>

            <!-- Long Description -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control" rows="8" placeholder="Detailed event description"></textarea>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Main Image</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form custom_file_input">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" id="event_image" name="image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp">
                        <label class="custom-file-label">Choose image</label>
                      </div>
                    </div>
                    <img id="imagePreview" class="preview-img" alt="Event Preview">
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Event</button>
            <a href="{{ route('admin.community-events.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    titleInput.addEventListener('keyup', function() {
        let val = this.value.trim().toLowerCase();
        val = val.replace(/[^a-z0-9\s-]/g, '');   // remove invalid chars
        val = val.replace(/\s+/g, '-');           // replace spaces with -
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
