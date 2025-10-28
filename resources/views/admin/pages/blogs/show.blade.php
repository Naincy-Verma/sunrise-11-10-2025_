@extends('admin.layouts.master')

@section('css')
<style>
    /* Card styling for content */
    .blog-content {
        border: 1px solid #e2e8f0;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    /* Blog image styling */
    .blog-image {
        width: 100%;
        max-width: 350px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Section titles */
    .section-title {
        font-weight: 600;
        font-size: 16px;
        margin-top: 20px;
        margin-bottom: 10px;
        border-left: 4px solid #007bff;
        padding-left: 10px;
        color: #333;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Blog Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                <li class="breadcrumb-item active">View Blog</li>
            </ol>
        </div>
    </div>

    <!-- Blog Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <!-- Title and Image -->
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h3 class="card-title">{{ $blog->title }}</h3>
                    <p class="text-muted mb-1"><strong>Slug:</strong> {{ $blog->slug }}</p>
                    <p class="text-muted mb-1"><strong>Author:</strong> {{ $blog->author ?? '-' }}</p>
                    <p class="text-muted mb-1"><strong>Published Date:</strong> 
                        {{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('d M Y') : '-' }}
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    @if($blog->image)
                        <img src="{{ asset('admin-assets/images/admin-image/blogs/' . $blog->image) }}" 
                             alt="Blog Image" 
                             class="blog-image">
                    @endif
                </div>
            </div>

            <!-- Short Description -->
            <div>
                <h5 class="section-title">Short Description</h5>
                <p>{{ $blog->short_description ?? '-' }}</p>
            </div>

            <!-- Full Content -->
            <div class="mt-3">
                <h5 class="section-title">Full Content</h5>
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
