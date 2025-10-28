@extends('admin.layouts.master')

@section('css')
<style>
    .preview-video {
        width: 320px;
        height: 240px;
        margin-top: 10px;
        display: none;
        border: 2px solid #ccc;
        border-radius: 10px;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        background: #f1f5f9;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        margin-top: 15px;
    }
    hr {
        border-top: 2px dashed #ccc;
        margin: 25px 0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Header -->
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Add Video Testimonial</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.video_testimonials.index') }}">Video Testimonials</a></li>
        <li class="breadcrumb-item active">Add Video Testimonial</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Video Testimonial Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.video_testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">🧑‍⚕️ Patient Information</div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Patient Name <span class="text-danger">*</span></label>
                    <input type="text" name="patient_name" class="form-control" placeholder="Enter patient name" required>
                </div>

                <div class="form-group">
                    <label>Title / Subject</label>
                    <input type="text" name="title" class="form-control" placeholder="Optional title for video testimonial">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="6" placeholder="Enter short description (optional)"></textarea>
                </div>
            </div>

            <!-- 🎬 VIDEO UPLOAD -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Upload Video</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="video" id="video_testimonial" class="custom-file-input" accept=".mp4,.mov,.avi,.webm" required>
                                    <label class="custom-file-label" for="video_testimonial">Choose video</label>
                                </div>
                            </div>
                            <video id="videoPreview" class="preview-video" controls></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Video Testimonial</button>
            <a href="{{ route('admin.video_testimonials.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- ✅ Video Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoInput = document.getElementById('video_testimonial');
    const videoPreview = document.getElementById('videoPreview');

    if (videoInput) {
        videoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                videoPreview.src = url;
                videoPreview.style.display = 'block';

                const label = this.nextElementSibling;
                if(label) label.textContent = file.name;
            }
        });
    }
});
</script>
@endsection
