@extends('admin.layouts.master')

@section('content')
<style>
.section-title {
    font-size: 18px;
    font-weight: 600;
    color: #2f855a;
    border-left: 5px solid #7aa93c;
    padding-left: 12px;
    margin-top: 35px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}
.section-title i {
    margin-right: 8px;
}
.info-card {
    background: #f9fafb;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 25px;
}
.info-card p {
    margin-bottom: 8px;
}
.list-style {
    background: #f8fff5;
    border: 1px solid #d1fadf;
    padding: 12px 20px;
    border-radius: 10px;
}
.img-preview {
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    max-width: 250px;
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-uppercase"><i class="fas fa-user-md me-2"></i>{{ $doctor->name }}</h4>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>

                <div class="card-body">

                    <!-- ================= Profile Information ================= -->
                    <h5 class="section-title"><i class="fas fa-id-card"></i> Profile Information</h5>
                    <div class="info-card">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                @if($doctor->profile_image)
                                    <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" 
                                         class="img-fluid img-preview mb-2" alt="{{ $doctor->name }}">
                                @else
                                    <div class="border p-4 bg-light text-muted rounded mb-3">No Image</div>
                                @endif
                            </div>

                            <div class="col-md-9">
                                <p><strong>Speciality:</strong> {{ $doctor->speciality->title ?? '—' }}</p>
                                <p><strong>Designation:</strong> {{ $doctor->designation ?? '—' }}</p>
                                <p><strong>Experience:</strong> {{ $doctor->experience ?? '—' }}</p>
                                <p><strong>Qualification:</strong> {{ $doctor->qualification ?? '—' }}</p>
                                <p><strong>Short Description:</strong> {{ $doctor->description ?? '—' }}</p>
                                <p><strong>Profile URL:</strong> {{ $doctor->profile_url ?? '—' }}</p>
                                @if($doctor->appointment_url)
                                    <p><strong>Appointment URL:</strong> 
                                        <a href="{{ $doctor->appointment_url }}" target="_blank" class="text-success">
                                            {{ $doctor->appointment_url }}
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- ================= Brief Profile Section ================= -->
                    <h5 class="section-title"><i class="fas fa-user-circle"></i> Brief Profile</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->brief_profile_heading ?? '—' }}</p>
                        <p><strong>Description:</strong></p>
                        <div>{!! $doctor->brief_profile_description ?? '—' !!}</div>

                        @if($doctor->brief_profile_image)
                            <p class="mt-3"><strong>Image:</strong></p>
                            <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->brief_profile_image) }}" 
                                 class="img-fluid img-preview mb-3" alt="Brief Profile Image">
                        @endif

                        @if($doctor->brief_notable_records)
                            <h6 class="mt-3 text-success fw-bold">Notable Records</h6>
                            <div>{!! $doctor->brief_notable_records !!}</div>
                        @endif

                       @if(is_array($doctor->brief_metrics))
                            <h6 class="mt-3 text-success fw-bold">Metrics</h6>
                            <ul class="list-style">
                                @foreach($doctor->brief_metrics as $metric)
                                    <li><strong>{{ $metric['label'] ?? '' }}:</strong> {{ $metric['value'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- ================= Professional Section ================= -->
                    <h5 class="section-title"><i class="fas fa-trophy"></i> Professional Achievements</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->professional_heading ?? '—' }}</p>
                        @if(is_array($doctor->professional_description))
                            <ul class="list-style">
                                @foreach($doctor->professional_description as $desc)
                                    <li><strong>{{ $desc['label'] ?? '' }}:</strong> {{ $desc['value'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>—</p>
                        @endif
                    </div>

                    <!-- ================= Training Section ================= -->
                    <h5 class="section-title"><i class="fas fa-graduation-cap"></i> Training Details</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->training_heading ?? '—' }}</p>
                            @if(is_array($doctor->training_description))
                                <ul class="list-style">
                                    @foreach($doctor->training_description as $desc)
                                        <li><strong>{{ $desc['label'] ?? '' }}:</strong> {{ $desc['value'] ?? '' }}</li>
                                    @endforeach
                                </ul>
                            @else
                            <p>—</p>
                        @endif
                        @if($doctor->training_record)
                            <h6 class="mt-3 text-success fw-bold">Training Record</h6>
                            <div>{!! $doctor->training_record !!}</div>
                        @endif
                    </div>

                    <!-- ================= Specialized Section ================= -->
                    <h5 class="section-title"><i class="fas fa-stethoscope"></i> Specialized Details</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->specialized_heading ?? '—' }}</p>
                        <p><strong>Subheading:</strong> {{ $doctor->specialized_subheading ?? '—' }}</p>
                        @if(is_array($doctor->specialized_description))
                            <ul class="list-style">
                                @foreach($doctor->specialized_description as $desc)
                                    <li><strong>{{ $desc['label'] ?? '' }}:</strong> {{ $desc['value'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>—</p>
                        @endif
                    </div>

                    <!-- ================= Areas of Specialization ================= -->
                    <h5 class="section-title"><i class="fas fa-briefcase-medical"></i> Areas of Specialization</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->area_specialized_heading ?? '—' }}</p>
                        @if(!empty($doctor->areas_of_specialization))
                            <ul class="list-style">
                                @foreach($doctor->areas_of_specialization as $area)
                                    <li>{{ $area }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>—</p>
                        @endif
                    </div>

                    <!-- ================= Contributions Section ================= -->
                    <h5 class="section-title"><i class="fas fa-hand-holding-heart"></i> Contributions</h5>
                    <div class="info-card">
                        <p><strong>Heading:</strong> {{ $doctor->contributions_heading ?? '—' }}</p>
                        <div>{!! $doctor->contributions_description ?? '—' !!}</div>
                    </div>

                    <!-- ================= Latest Achievements ================= -->
                    <h5 class="section-title"><i class="fas fa-medal"></i> Latest Achievement</h5>
                    <div class="info-card">
                        <div>{!! $doctor->latest_achievement ?? '—' !!}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
