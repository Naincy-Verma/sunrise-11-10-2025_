@extends('admin.layouts.master')

@section('css')
<style>
    .vision-content {
        border: 1px solid #e2e8f0;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        margin-bottom: 20px;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 10px;
        border-left: 4px solid #007bff;
        padding-left: 10px;
        color: #333;
    }
    .vision-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }
    .vision-icon {
        font-size: 24px;
        color: #007bff;
    }
    .stats-row {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .stats-card {
        text-align: center;
        flex: 1 1 200px;
        margin: 5px;
        padding: 15px;
        border: 1px solid #007bff;
        border-radius: 8px;
        background-color: #e6f0ff;
    }
    .stats-card h4 {
        margin-bottom: 5px;
    }
    .stats-card p {
        margin-bottom: 0;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Vision & Mission Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.vision-mission.index') }}">Vision & Mission</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="vision-content">
        <h4 class="section-title">Vision</h4>
        <div class="vision-meta">
            <span class="vision-icon"><i class="{{ $vision->icon_vission }}"></i></span>
        </div>
        <h5 class="mt-2">{{ $vision->heading_vission }}</h5>
        <p>{!! $vision->vission_description !!}</p>
    </div>

    <!-- Mission Section -->
    <div class="vision-content">
        <h4 class="section-title">Mission</h4>
        <div class="vision-meta">
            <span class="vision-icon"><i class="{{ $vision->icon_mission }}"></i></span>
        </div>
        <h5 class="mt-2">{{ $vision->heading_mission }}</h5>
        <p>{!! $vision->mission_description !!}</p>
    </div>

    <!-- Stats Row -->
    @if($vision->stats)
        @php
            $stats = json_decode($vision->stats, true); // decode JSON to associative array
        @endphp

        @if(is_array($stats))
            <div class="stats-row">
                @foreach($stats as $stat)
                    <div class="stats-card">
                        <h4>{{ $stat['value'] ?? '' }}</h4>
                        <p>{{ $stat['label'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
    
    <!-- Back Button -->
    <div class="mt-4">
        <a href="{{ route('admin.vision-mission.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>
@endsection

@section('scripts')
@endsection
