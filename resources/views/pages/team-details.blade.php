@extends('layout.master')
@section('css')
    <style>
        .doctor-detail-page{
            padding: 50px 0px;
        }
        .content-section {
            background: white;
            border-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .brief-header {
            background: linear-gradient(135deg, #00416f 0%, #007f97 100%);
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .section-content {
            padding: 0px 20px;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }

        .achievement-card {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 1px solid #bae6fd;
            border-radius: 5px;
            padding: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .achievement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .achievement-title {
            font-weight: 700;
            color: #003366;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .achievement-desc {
            color: #4b5563;
            line-height: 1.6;
        }

        .specialties-list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 15px;
        }

        .specialties-list li {
            background: #f8fafc;
            border-radius: 10px;
            padding: 15px 20px;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 50px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .specialties-list li::before {
            content: '✓';
            position: absolute;
            left: 20px;
            top: 28%;
            background: #0097a7;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .specialties-list li:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
        }

        .training-programs {
            background: #f8fafc;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }

        .program-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            border-left: 4px solid #003366;
        }

        .program-number {
            background: #003366;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .program-details {
            flex: 1;
        }

        .program-name {
            font-weight: 600;
            color: #003366;
            margin-bottom: 5px;
        }

        .program-duration {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .highlight-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #f59e0b;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 30px 0;
        }

        .highlight-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 10px;
        }
        .records-section {
            border: 2px solid #0097a7;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }

        .record-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .record-icon {
            background: #0097a7;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .record-content {
            flex: 1;
        }

        .record-title {
            font-weight: 700;
            color: #003366;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        @media (max-width: 768px) {
            .doctor-name {
                font-size: 2rem;
            }
            
            .profile-header {
                flex-direction: column;
                text-align: center;
                padding: 30px 20px;
            }
            
            .doctor-image {
                width: 150px;
                height: 150px;
            }
            
            .section-content,
            .section-header {
                padding: 20px;
            }
            
            .achievements-grid {
                grid-template-columns: 1fr;
            }
            
            .specialties-list {
                grid-template-columns: 1fr;
            }
            
            .container {
                margin-top: -30px;
            }
        }

        .experience-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .experience-card {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .experience-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        }

        .experience-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            border-color: #3b82f6;
        }

        .experience-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e40af;
            margin-bottom: 10px;
            display: block;
        }

        .experience-label {
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }
        .doctor-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ecf5fb;
            z-index: -1;
        }
    </style>
@endsection
@section('content')
    <section class="hero-section">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5 class="mb-3">{{ $doctor->name }}</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $doctor->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Image -->
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="doctor-img">
                        <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) }}" alt="{{ $doctor->name }}">
                    </div>
                </div>
                <!-- Right: Info -->
                <div class="col-lg-7 doctor-details">
                    <h5>{{ $doctor->designation }}</h5>
                    <h2>{{ $doctor->name }}</h2>
                    <p>{{ $doctor->description }}</p>
                    <p><strong>Designation:</strong> {{ $doctor->designation }}</p>
                    <p><strong>Areas of Expertise:</strong> {{ $doctor->speciality->title ?? '—' }}</p>
                    <p><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="doctor-detail-page">
        <div class="container">
            <div class="content-section">
                <div class="brief-header">{{ $doctor->brief_profile_heading }}</div>
                <div class="section-content">
                    <p>
                       {!! $doctor->brief_profile_description !!}
                    </p>
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <img src="{{ asset('admin-assets/images/admin-image/doctors/' . $doctor->brief_profile_image) }}" width="100%" alt="Patient Image">
                        </div>
                        <div class="col-lg-5 col-md-5">

                        </div>
                    </div>

                    <div class="highlight-box">
                        <p class="highlight-text">
                           {!! $doctor->brief_notable_records !!}
                        </p>
                    </div>

                    @if(!empty($doctor->brief_metrics) && is_array($doctor->brief_metrics))
                        <div class="experience-highlights mt-4">
                            @foreach($doctor->brief_metrics as $metric)
                                <div class="experience-card text-center">
                                    <span class="experience-number d-block fw-bold fs-4">
                                        {{ $metric['number'] ?? '' }}
                                    </span>
                                    <span class="experience-label text-muted">
                                        {{ $metric['label'] ?? '' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
           

            <!-- Professional Achievements -->
           <div class="content-section">
                <div class="brief-header">Professional Achievements</div>
                <div class="section-content">

                    {{-- ✅ Professional Description List --}}
                    @if(!empty($doctor->professional_heading))
                        <h5 class="mt-3" style="color:#003366;">{{ $doctor->professional_heading }}</h5>
                    @endif

                    @if(!empty($doctor->professional_description) && is_array($doctor->professional_description))
                        <div class="achievements-grid">
                            @foreach($doctor->professional_description as $achievement)
                                <div class="achievement-card">
                                    <div class="achievement-title">{{ $achievement['title'] ?? 'Achievement' }}</div>
                                    <p class="achievement-desc">{{ $achievement['desc'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- ✅ Training Section --}}
                    @if(!empty($doctor->training_heading))
                        <div class="training-programs mt-5">
                            @if(!empty($doctor->training_description) && is_array($doctor->training_description))
                                @foreach($doctor->training_description as $index => $program)
                                    <div class="program-item">
                                        <div class="program-number">{{ $index + 1 }}</div>
                                        <div class="program-details">
                                            <div class="program-name">{{ $program['name'] ?? '' }}</div>
                                            <div class="program-duration">{{ $program['duration'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endif

                    {{-- ✅ Training Record Highlight --}}
                    @if(!empty($doctor->training_record))
                        <div class="highlight-box mt-4">
                            <p class="highlight-text">{!! $doctor->training_record !!}</p>
                        </div>
                    @endif
                </div>
            </div>


            <!-- Specialized Procedures & Records -->
             <div class="content-section">
                <div class="brief-header">{{ $doctor->specialized_heading }}</div>
                <div class="section-content">
                    <div class="records-section">
                        <h3 style="color: #003366; margin-bottom: 25px; font-size: 1.3rem;">{{ $doctor->specialized_subheading }}</h3>

                            @if(is_array($doctor->specialized_description))
                                @foreach($doctor->specialized_description as $index => $record)
                                    <div class="record-item">
                                        <div class="record-icon">{{ $index + 1 }}</div>
                                        <div class="record-content">
                                            <div class="record-title">{{ $record['title'] ?? '' }}</div>
                                            <p class="record-desc">{{ $record['description'] ?? '' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
           
            <!-- Areas of Specialization -->
             <div class="content-section">
                <div class="brief-header">Areas of Specialization</div>
                <div class="section-content">
                    <ul class="specialties-list">
                           @if(is_array($doctor->areas_of_specialization))
                                <ul class="specialties-list">
                                    @foreach($doctor->areas_of_specialization as $specialization)
                                        <li>{{ $specialization }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </ul>
                </div>
            </div>
          
            <!-- Professional Contributions -->
            <div class="content-section">
                <div class="brief-header">{{ $doctor->contributions_heading }}</div>
                <div class="section-content">
                    <p>{!! $doctor->contributions_description !!}</p>
                    <div class="highlight-box">
                        <p class="highlight-text">{!! $doctor->latest_achievement !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection