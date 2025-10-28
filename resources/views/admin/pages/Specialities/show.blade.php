@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow">
        <!-- Header -->
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $speciality->title }}</h3>
        </div>

        <!-- Content -->
        <div class="card-body">
            <!-- Title & Slug in one row -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Title:</strong> {{ $speciality->title }}
                </div>
                <div class="col-md-6">
                    <strong>Slug:</strong> {{ $speciality->slug }}
                </div>
            </div>

            <!-- Image & Icon in one row -->
            <div class="row mb-3 align-items-center">
                @if($speciality->image)
                <div class="col-md-6">
                    <strong>Image:</strong><br>
                    <img src="{{ asset($speciality->image) }}" alt="Image" class="img-thumbnail" style="width:150px; height:150px; object-fit:cover;">
                </div>
                @endif

                @if($speciality->icon)
                <div class="col-md-6">
                    <strong>Icon:</strong><br>
                    <img src="{{ asset($speciality->icon) }}" alt="Icon" class="img-thumbnail" style="width:100px; height:100px; object-fit:cover;">
                </div>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-3">
                <strong>Description:</strong>
                <div class="p-3 bg-light border rounded">
                    {!! $speciality->description !!}
                </div>
            </div>
        </div>

        <!-- Footer: Back & Edit buttons -->
        <div class="card-footer text-end">
            <a href="{{ route('specialities.index') }}" class="btn btn-secondary me-2">Back</a>
            <a href="{{ route('specialities.edit', $speciality->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
