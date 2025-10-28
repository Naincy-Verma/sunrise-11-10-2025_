@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow">

        <!-- Header -->
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $doctor->name }}</h3>
        </div>

        <!-- Card Body -->
        <div class="card-body">

            <!-- 🏠 Homepage Section -->
            <h5 class="border-bottom pb-2 mb-4 text-primary fw-bold">
                Homepage Section
            </h5>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Designation:</strong> {{ $doctor->designation }}</div>
                <div class="col-md-6"><strong>Qualification:</strong> {{ $doctor->qualification }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Speciality:</strong> {{ $doctor->speciality }}</div>
                <div class="col-md-6"><strong>Experience:</strong> {{ $doctor->experience }}</div>
            </div>

            @if($doctor->profile_image)
            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>Profile Image:</strong><br>
                    <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" 
                         class="img-thumbnail mt-2" style="width:160px; height:160px; object-fit:cover; border-radius:10px;">
                </div>
            </div>
            @endif

            <div class="mb-4">
                <strong>Short Description:</strong>
                <div class="p-3 bg-light border rounded">
                    {!! $doctor->description !!}
                </div>
            </div>

            <!-- ✅ Profile & Appointment URLs -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>Profile URL:</strong><br>
                    @if($doctor->profile_url)
                        <a href="{{ $doctor->profile_url }}" target="_blank">{{ $doctor->profile_url }}</a>
                    @else
                        <span class="text-muted">Not available</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <strong>Appointment URL:</strong><br>
                    @if($doctor->appointment_url)
                        <a href="{{ $doctor->appointment_url }}" target="_blank">{{ $doctor->appointment_url }}</a>
                    @else
                        <span class="text-muted">Not available</span>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <!-- 📄 Detail Page Section -->
            <h5 class="border-bottom pb-2 mb-4 text-primary fw-bold">
                Detail Page Section
            </h5>

            <div class="mb-4">
                <strong>Brief Profile Heading:</strong> {{ $doctor->brief_profile_heading }}<br>
                <strong>Brief Profile Description:</strong>
                <div class="p-3 bg-light border rounded mt-2">
                    {!! $doctor->brief_profile_description !!}
                </div>
            </div>

            <div class="mb-4">
                <strong>Metrics:</strong>
                <div class="p-3 bg-light border rounded">
                    {!! $doctor->metrics !!}
                </div>
            </div>

            <div class="mb-4">
                <strong>Notable Records:</strong>
                <div class="p-3 bg-light border rounded">
                    {!! $doctor->notable_records !!}
                </div>
            </div>

            <div class="mb-4">
                <strong>Professional Achievements:</strong>
                <div class="p-3 bg-light border rounded">
                    <p><strong>Heading:</strong> {{ $doctor->professional_heading }}</p>
                    <p><strong>Subheading:</strong> {{ $doctor->professional_subheading }}</p>
                    <p>{!! $doctor->professional_description !!}</p>
                    <p><strong>Training Record:</strong> {!! $doctor->training_record !!}</p>
                </div>
            </div>

            <div class="mb-4">
                <strong>Specialized Procedures:</strong>
                <div class="p-3 bg-light border rounded">
                    <p><strong>Heading:</strong> {{ $doctor->specialized_heading }}</p>
                    <p><strong>Subheading:</strong> {{ $doctor->specialized_subheading }}</p>
                    <p><strong>Title:</strong> {{ $doctor->specialized_title }}</p>
                    <p>{!! $doctor->specialized_description !!}</p>
                </div>
            </div>

            <div class="mb-4">
                <strong>Areas of Specialization:</strong>
                <div class="p-3 bg-light border rounded">
                    {!! $doctor->areas_of_specialization !!}
                </div>
            </div>

            <div class="mb-4">
                <strong>Professional Contributions:</strong>
                <div class="p-3 bg-light border rounded">
                    <p><strong>Heading:</strong> {{ $doctor->contributions_heading }}</p>
                    <p>{!! $doctor->contributions_description !!}</p>
                    <p><strong>Latest Achievement:</strong> {{ $doctor->latest_achievement }}</p>
                </div>
            </div>

        </div>

        <!-- Footer Buttons -->
        <div class="card-footer text-end">
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary me-2">Back</a>
            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
        </div>

    </div>
</div>
@endsection
