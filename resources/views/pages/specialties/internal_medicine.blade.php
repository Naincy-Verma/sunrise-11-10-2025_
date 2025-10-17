@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5 class="mb-3"> Internal Medicine</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Specialties</a></li>
                            <li class="breadcrumb-item"><a href="#"> Internal Medicine</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Main Content Section -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Left Column - Content -->
                <div class="col-lg-8">
                    <!-- Main Image -->
                    <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Obstetrics and Gynecology - Medical Care"
                         class="content-image">

                    <!-- Content -->
                    <p> Internal medicine is a medical specialty that focuses on the diagnosis and medical treatment of adults. Unlike specialists who concentrate on specific organ systems, internists take a comprehensive and holistic approach to patient care. They serve as a primary point of contact between super specialists and patients, playing a crucial role in initial diagnoses and providing ongoing care throughout the patient’s treatment journey. Internists’ approach encompasses preventive measures, diagnostic procedures, and therapeutic interventions.</p>

                    <p>The approach at Sunrise Hospital, extends beyond addressing immediate health concerns. We place emphasis on preventive medicine, working proactively to identify potential health risks and develop strategies to mitigate them. Through patient education, lifestyle counseling, and routine screenings, we strive to prevent the onset of diseases and promote overall well-being.</p>

                    <p> One of the key strengths at Sunrise Hospital, lies in their ability to unravel complex diagnostic puzzles. Patients may present with symptoms that are difficult to pinpoint or may suffer from conditions with overlapping manifestations. Our experts possess the expertise to navigate through these intricacies, utilizing a combination of clinical acumen, medical history analysis, and advanced diagnostic tools. Our comprehensive approach ensures accurate diagnoses and facilitates the development of tailored treatment plans.</p>


                    <p> Our experts play a crucial role in patient care, serving as the primary point of contact between patients and super specialists. At Sunrise Hospital, continuous management ensures comprehensive and personalized care for patients, particularly in cases of chronic illnesses and situations involving multiple simultaneous conditions. By prioritizing prevention, diagnostic accuracy, and patient-centered care, internists contribute to the well-being and long-term health of their patients.</p>


                </div>

                <!-- Right Column - Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-sidebar p-4 rounded bg-white">
                        <h4 class="mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                        </h4>
                        <form  action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter your full name">
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12">
                                    <input type="tel" class="form-control" placeholder="Enter your phone number">
                                </div>

                                <!-- Appointment Date -->
                                <div class="col-12">
                                    <input type="date" class="form-control" placeholder="Appointment Date">
                                </div>

                                <!-- Specialist -->
                                <div class="col-12">
                                    <select class="form-select">
                                        <option>Select Speciality</option>
                                        @foreach($specialties_form as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Enter your email address">
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <div class="captcha-box">
                                        <div class="captcha-text" id="captcha">AB12C</div>
                                        <input type="text" class="captcha-input" placeholder="Enter Captcha" id="captcha-input" required>
                                        <button type="button" class="captcha-refresh" onclick="generateCaptcha()">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your appointment request! Our team will contact you within 24 hours.');
        });
    </script>
@endsection