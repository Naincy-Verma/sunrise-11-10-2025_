@extends('admin.layouts.master')

@section('css')
<style>
    /* Card styling for content */
    .package-content {
        border: 1px solid #e2e8f0;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
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

    /* List styling for tests */
    .test-list {
        list-style: disc;
        margin-left: 25px;
        color: #444;
        font-size: 15px;
    }

    .test-list li {
        margin-bottom: 6px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Package Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}">Package Sections</a></li>
                <li class="breadcrumb-item active">View Package</li>
            </ol>
        </div>
    </div>

    <!-- Package Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="package-content">
                <!-- Heading -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-8">
                        <h3 class="card-title mb-0">{{ $package->heading }}</h3>
                    </div>
                </div>

                <!-- Tests -->
                <div class="mt-3">
                    <h5 class="section-title">Tests Included</h5>
                    @php
                        $tests = json_decode($package->tests, true);
                    @endphp

                    @if(is_array($tests) && count($tests) > 0)
                        <ul class="test-list">
                            @foreach($tests as $test)
                                <li>{{ $test }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No tests added.</p>
                    @endif
                </div>

                <!-- Back Button -->
                <div class="mt-4">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
