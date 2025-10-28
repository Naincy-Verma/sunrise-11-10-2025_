@extends('admin.layouts.master')

@section('css')
<style>
    .preview-video {
        width: 480px;
        height: 360px;
        border: 2px solid #ccc;
        border-radius: 10px;
        margin: 15px 0; /* ✅ Added vertical spacing */
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
                <h4>Video Testimonial Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.video_testimonials.index') }}">Video Testimonials</a></li>
                <li class="breadcrumb-item active">View Video Testimonial</li>
            </ol>
        </div>
    </div>

    <!-- Testimonial Details -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $video->patient_name }}</h4>
        </div>
        <div class="card-body">
            <div class="section-title">🧑‍⚕️ Patient Information</div>
            <p><strong>Name:</strong> {{ $video->patient_name }}</p>
            <p><strong>Title:</strong> {{ $video->title ?? '-' }}</p>
            <p><strong>Description:</strong> {{ $video->description ?? 'No description provided.' }}</p>
            

            @if($video->video && file_exists(public_path('admin-assets/images/admin-image/video-testimonials/' . $video->video)))
                <div class="section-title">🎬 Video Testimonial</div>
                @php
                    $ext = pathinfo($video->video, PATHINFO_EXTENSION);
                @endphp
                <video class="preview-video" controls>
                    <source src="{{ asset('admin-assets/images/admin-image/video-testimonials/' . $video->video) }}" type="video/{{ $ext }}">
                    Your browser does not support the video tag.
                </video>
            @else
                <div class="section-title">🎬 Video Testimonial</div>
                <p class="text-muted">No video uploaded.</p>
            @endif

            <div class="mt-3">
                <a href="{{ route('admin.video_testimonials.index') }}" class="btn btn-light">Back</a>
                <a href="{{ route('admin.video_testimonials.edit', $video->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
