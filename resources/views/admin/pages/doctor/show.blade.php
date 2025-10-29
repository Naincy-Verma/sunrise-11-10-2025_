@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $doctor->name }}</h4>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if($doctor->profile_image)
                                <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" 
                                     class="img-fluid rounded mb-3" 
                                     alt="{{ $doctor->name }}">
                            @endif
                            <p><strong>Speciality:</strong> {{ $doctor->speciality->name ?? '—' }}</p>
                            <p><strong>Designation:</strong> {{ $doctor->designation }}</p>
                            <p><strong>Experience:</strong> {{ $doctor->experience }}</p>
                        </div>

                        <div class="col-md-9">
                            <h5>Brief Profile</h5>
                            <p>{{ $doctor->brief_profile_description }}</p>

                            @if($doctor->brief_notable_records)
                                <h6 class="mt-3">Notable Records</h6>
                                <p>{!! $doctor->brief_notable_records !!}</p>
                            @endif

                            @if($doctor->brief_metrics)
                                <h6 class="mt-3">Metrics</h6>
                                <ul>
                                    @foreach($doctor->brief_metrics as $metric)
                                        <li>{{ $metric }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($doctor->professional_description)
                                <h5 class="mt-4">{{ $doctor->professional_heading }}</h5>
                                <ul>
                                    @foreach($doctor->professional_description as $desc)
                                        <li>{{ $desc }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($doctor->training_description)
                                <h5 class="mt-4">{{ $doctor->training_heading }}</h5>
                                <ul>
                                    @foreach($doctor->training_description as $desc)
                                        <li>{{ $desc }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($doctor->training_record)
                                <h6>Training Records</h6>
                                <div>{!! $doctor->training_record !!}</div>
                            @endif

                            @if($doctor->specialized_description)
                                <h5 class="mt-4">{{ $doctor->specialized_heading }}</h5>
                                <ul>
                                    @foreach($doctor->specialized_description as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($doctor->areas_of_specialization)
                                <h5 class="mt-4">{{ $doctor->area_specialized_heading }}</h5>
                                <ul>
                                    @foreach($doctor->areas_of_specialization as $area)
                                        <li>{{ $area }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($doctor->contributions_description)
                                <h5 class="mt-4">{{ $doctor->contributions_heading }}</h5>
                                <div>{!! $doctor->contributions_description !!}</div>
                            @endif

                            @if($doctor->latest_achievement)
                                <h5 class="mt-4">Latest Achievement</h5>
                                <div>{!! $doctor->latest_achievement !!}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
