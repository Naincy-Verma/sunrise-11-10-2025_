@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Rare Case Details</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.rare-cases.index') }}">Rare Cases</a></li>
                <li class="breadcrumb-item active">View Rare Case</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $case->title }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Source:</strong> {{ $case->source }}</p>
            <p><strong>Short Description:</strong> {{ $case->short_description }}</p>
            <p><strong>Long Description:</strong></p>
            <p>{!! nl2br(e($case->long_description)) !!}</p>

            @if($case->image)
            <div>
                <img src="{{ asset('admin-assets/images/admin-image/rare-cases/' . $case->image) }}" alt="Case Image" style="max-width:300px;">
            </div>
            @endif

            <a href="{{ route('admin.rare-cases.index') }}" class="btn btn-light mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
