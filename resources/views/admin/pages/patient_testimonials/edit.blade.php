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
        <h4>Edit Patient Testimonial</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.patient_testimonials.index') }}">Testimonials</a></li>
        <li class="breadcrumb-item active">Edit Testimonial</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Testimonial Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.patient_testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">🧑‍⚕️ Patient Information</div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Patient Name <span class="text-danger">*</span></label>
                    <input type="text" name="patient_name" class="form-control" placeholder="Enter patient name" value="{{ old('patient_name', $testimonial->patient_name) }}" required>
                </div>

                <div class="form-group">
                    <label>Title / Subject</label>
                    <input type="text" name="title" class="form-control" placeholder="Optional title for testimonial" value="{{ old('title', $testimonial->title) }}">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Testimonial Content <span class="text-danger">*</span></label>
                    <textarea name="testimonial" class="form-control" rows="6" placeholder="Enter testimonial content" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                </div>
            </div>

            <!-- 🎬 VIDEO UPLOAD -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Testimonial Video</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="video" id="testimonial_video" class="custom-file-input" accept=".mp4,.mov,.avi,.webm">
                                    <label class="custom-file-label" for="testimonial_video">{{ $testimonial->video ? basename($testimonial->video) : 'Choose video' }}</label>
                                </div>
                            </div>
                            <video id="videoPreview" class="preview-video" controls {{ $testimonial->video ? 'style=display:block;' : '' }}>
                                @if($testimonial->video)
                                <source src="{{ asset('storage/' . $testimonial->video) }}" type="video/mp4">
                                @endif
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Update Testimonial</button>
            <a href="{{ route('admin.patient_testimonials.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const testimonialVideo = document.getElementById('testimonial_video');
    const videoPreview = document.getElementById('videoPreview');

    if (testimonialVideo) {
        testimonialVideo.addEventListener('change', function() {
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
