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
                    <h5 class="mb-3"> Bariatric Surgery</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Specialties</a></li>
                            <li class="breadcrumb-item"><a href="#"> Bariatric Surgery</a></li>
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
                    <p>Bariatric Surgery at Sunrise Hospital, Delhi, is recognized as one of the leading centers for weight loss surgery in the region. Our hospital offers state-of-the-art bariatric surgical procedures performed by the best surgeons for bariatric surgery in Delhi. With a focus on providing effective and safe weight loss solutions, Sunrise Hospital is committed to helping individuals achieve significant and sustainable weight loss.</p>

                    <h2>What is Bariatric Surgery?</h2>
                    <p class="content-paragraph">Bariatric surgery, also known as weight loss surgery, is a specialized surgical branch aimed at helping individuals struggling with obesity. The procedures work by reducing the size of the stomach or altering the digestive process, which leads to decreased food intake and improved weight management. Bariatric surgery is highly effective for those who have not been able to lose weight through conventional methods.</p>

                    <h2>Bariatric Procedures Offered at Sunrise Hospital</h2>
                    <p>Sunrise Hospital Department of Bariatric Surgery offers a range of bariatric procedures tailored to each patient’s specific needs. These procedures are carefully chosen after evaluating the patient’s medical history and suitability for surgery. Common bariatric surgeries performed at our hospital include:</p>
                    <ul>
                        <li>Gastric Bypass</li>
                        <li> Sleeve Gastrectomy</li>
                        <li> Adjustable Gastric Banding</li>
                        <li> Biliopancreatic Diversion with</li>
                        <li> Duodenal Switch (BPD/DS)</li>
                    </ul>

                    <h2>Why Choose the Best Surgeon for Bariatric Surgery in Delhi?</h2>
                    <p> Our bariatric surgeons are highly experienced and well-trained in performing these surgeries with precision and care. They prioritize patient safety and provide personalized treatment plans to ensure the best outcomes. By choosing the best surgeon for bariatric surgery in Delhi, you are ensuring that you receive expert care at every step of your weight loss journey.</p>

                    <h2> Pre-Operative and Post-Operative Care</h2>
                    
                        <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Obstetrics and Gynecology - Medical Care"
                         class="content-image">
                    <p> In addition to surgery, we provide comprehensive pre-operative and post-operative care. Our surgical team ensures that patients are physically and mentally prepared for surgery. After the procedure, we offer continuous monitoring and guidance to help patients adjust to their new lifestyle and dietary changes. </p>

                    <h2> Conclusion</h2>
                    <p> Sunrise Hospital is renowned for its bariatric surgery expertise, and we are proud to be known as the best bariatric surgery center in Delhi. Our commitment to excellence, <a href="#">advanced medical facilities</a>, and highly skilled surgeons make us a trusted destination for weight loss surgery. If you’re looking for a trusted weight loss surgeon in Delhi, consult with us today and take the first step toward a healthier, transformed life.</p>

                </div>

                <!-- Right Column - Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-sidebar p-4 rounded bg-white">
                        <h4 class="mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                        </h4>
                        <form  action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="source" value="specialties_bariatric-surgery-page">
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter your full name" name="name">
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12">
                                    <input type="tel" class="form-control" placeholder="Enter your phone number" name="phone">
                                </div>

                                <!-- Appointment Date -->
                                <div class="col-12">
                                    <input type="date" class="form-control" placeholder="Appointment Date" name="appointment_date">
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
                                    <input type="email" class="form-control" placeholder="Enter your email address" name="email">
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