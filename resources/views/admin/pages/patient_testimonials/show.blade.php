@extends('admin.layouts.master')

@section('css')
<style>
    .preview-video {
        width: 480px;
        height: 360px;
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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Patient Testimonial Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.patient_testimonials.index') }}">Testimonials</a></li>
                <li class="breadcrumb-item active">View Testimonial</li>
            </ol>
        </div>
    </div>

    <!-- Testimonial Details -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $testimonial->patient_name }}</h4>
        </div>
        <div class="card-body">
            <div class="section-title">🧑‍⚕️ Patient Information</div>
            <p><strong>Name:</strong> {{ $testimonial->patient_name }}</p>
            <p><strong>Title:</strong> {{ $testimonial->title ?? '-' }}</p>
            <p><strong>Testimonial:</strong></p>
            <p>{{ $testimonial->testimonial }}</p>

            @if($testimonial->video)
            <div class="section-title">🎬 Testimonial Video</div>
            <video class="preview-video" controls>
                <source src="{{ asset('admin-assets/images/admin-image/testimonials/' . $testimonial->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            @endif

            <div class="mt-3">
                <a href="{{ route('admin.patient_testimonials.index') }}" class="btn btn-light">Back</a>
                <a href="{{ route('admin.patient_testimonials.edit', $testimonial->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
