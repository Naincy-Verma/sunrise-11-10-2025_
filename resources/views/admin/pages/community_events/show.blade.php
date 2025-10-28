@extends('admin.layouts.master')

@section('css')
<style>
    .event-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .event-header h4 {
        margin: 0;
    }
    .event-image {
        width: 100%;
        max-width: 500px;
        height: auto;
        border-radius: 10px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .detail-label {
        font-weight: 600;
        color: #333;
    }
    .detail-value {
        color: #555;
        line-height: 1.6;
    }
    .section-divider {
        border-top: 2px dashed #ddd;
        margin: 20px 0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Community Event Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.community-events.index') }}">Community Events</a></li>
                <li class="breadcrumb-item active">View Event</li>
            </ol>
        </div>
    </div>

    <!-- Event Details Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <!-- Title & Image -->
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-2 text-primary">{{ $event->title }}</h3>
                <p class="text-muted mb-3">Slug: <strong>{{ $event->slug }}</strong></p>
                @if($event->image)
                    <img src="{{ asset('admin-assets/images/admin-image/community-events/' . $event->image) }}" 
                         alt="{{ $event->title }}" 
                         class="event-image mb-3">
                @else
                    <p class="text-muted fst-italic">No image available</p>
                @endif
            </div>

            <hr class="section-divider">

            <!-- Event Details -->
            <div class="row">
                <div class="col-lg-6">
                    <p class="detail-label">Short Description:</p>
                    <p class="detail-value">{{ $event->short_description ?? 'N/A' }}</p>
                </div>
                <div class="col-lg-6">
                    <p class="detail-label">Slug:</p>
                    <p class="detail-value">{{ $event->slug }}</p>
                </div>
            </div>

            <hr class="section-divider">

            <div class="col-12">
                <p class="detail-label">Long Description:</p>
                <p class="detail-value">{!! nl2br(e($event->long_description ?? 'N/A')) !!}</p>
            </div>

            <div class="text-end mt-4">
                <a href="{{ route('admin.community-events.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
