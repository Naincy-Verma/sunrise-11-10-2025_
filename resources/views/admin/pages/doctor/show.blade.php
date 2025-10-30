@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-uppercase">{{ $doctor->name }}</h4>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <!-- ================= Profile Information ================= -->
                    <h4 class="mb-3 text-success border-bottom pb-2">Profile Information</h4>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if($doctor->profile_image)
                                <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" 
                                     class="img-fluid rounded mb-3 border" 
                                     alt="{{ $doctor->name }}">
                            @else
                                <div class="border p-4 bg-light text-muted rounded mb-3">No Image</div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <p><strong>Speciality:</strong> {{ $doctor->speciality->title ?? '—' }}</p>
                            <p><strong>Designation:</strong> {{ $doctor->designation ?? '—' }}</p>
                            <p><strong>Experience:</strong> {{ $doctor->experience ?? '—' }}</p>
                            <p><strong>Qualification:</strong> {{ $doctor->qualification ?? '—' }}</p>
                            <p><strong>Profile URL:</strong> {{ $doctor->profile_url ?? '—' }}</p>

                            @if($doctor->appointment_url)
                                <p><strong>Appointment URL:</strong> 
                                    <a href="{{ $doctor->appointment_url }}" target="_blank" class="text-primary">{{ $doctor->appointment_url }}</a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- ================= Brief Profile Section ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Brief Profile</h4>
                    <p><strong>Heading:</strong> {{ $doctor->brief_profile_heading ?? '—' }}</p>
                    <p><strong>Description:</strong> {{ $doctor->brief_profile_description ?? '—' }}</p>

                    @if($doctor->brief_profile_image)
                        <p><strong>Image:</strong></p>
                        <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->brief_profile_image) }}" 
                             alt="Brief Profile Image" class="img-fluid rounded mb-3" style="max-width: 300px;">
                    @endif

                    @if($doctor->brief_notable_records)
                        <h6 class="mt-3">Notable Records</h6>
                        <div>{!! $doctor->brief_notable_records !!}</div>
                    @endif

                    @if(!empty($doctor->brief_metrics))
                        <h6 class="mt-3">Metrics</h6>
                        <ul>
                            @foreach($doctor->brief_metrics as $metric)
                                <li>{{ $metric }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- ================= Professional Section ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Professional Details</h4>
                    <p><strong>Heading:</strong> {{ $doctor->professional_heading ?? '—' }}</p>

                    @if(!empty($doctor->professional_description))
                        <ul>
                            @foreach($doctor->professional_description as $desc)
                                <li>{{ $desc }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>—</p>
                    @endif

                    <!-- ================= Training Section ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Training Details</h4>
                    <p><strong>Heading:</strong> {{ $doctor->training_heading ?? '—' }}</p>

                    @if(!empty($doctor->training_description))
                        <ul>
                            @foreach($doctor->training_description as $desc)
                                <li>{{ $desc }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>—</p>
                    @endif

                    @if($doctor->training_record)
                        <h6 class="mt-3">Training Record</h6>
                        <div>{!! $doctor->training_record !!}</div>
                    @endif

                    <!-- ================= Specialized Section ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Specialized Details</h4>
                    <p><strong>Heading:</strong> {{ $doctor->specialized_heading ?? '—' }}</p>
                    <p><strong>Subheading:</strong> {{ $doctor->specialized_subheading ?? '—' }}</p>

                    @if(!empty($doctor->specialized_description))
                        <ul>
                            @foreach($doctor->specialized_description as $desc)
                                <li>{{ $desc }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>—</p>
                    @endif

                    <!-- ================= Areas of Specialization ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Areas of Specialization</h4>
                    <p><strong>Heading:</strong> {{ $doctor->area_specialized_heading ?? '—' }}</p>

                    @if(!empty($doctor->areas_of_specialization))
                        <ul>
                            @foreach($doctor->areas_of_specialization as $area)
                                <li>{{ $area }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>—</p>
                    @endif

                    <!-- ================= Contributions Section ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Contributions</h4>
                    <p><strong>Heading:</strong> {{ $doctor->contributions_heading ?? '—' }}</p>
                    <div>{!! $doctor->contributions_description ?? '—' !!}</div>

                    <!-- ================= Latest Achievements ================= -->
                    <h4 class="mt-5 mb-3 text-success border-bottom pb-2">Latest Achievement</h4>
                    <div>{!! $doctor->latest_achievement ?? '—' !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
