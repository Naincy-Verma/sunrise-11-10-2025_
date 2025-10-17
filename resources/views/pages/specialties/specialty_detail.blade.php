@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5 class="mb-3">{{ $specialty->title }}</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Specialties</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $specialty->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-8">
                    @if($specialty->image)
                        <img src="{{ asset($specialty->image) }}" alt="{{ $specialty->title }}" class="content-image mb-4">
                    @endif

                    <!-- Description -->
                    <div>{!! $specialty->description !!}</div>
                </div>

                <!-- Right Column - Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-sidebar p-4 rounded bg-white">
                        <h4 class="mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                        </h4>
                        <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="source" value="specialties-page">
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter your full name" name="name" required>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12">
                                    <input type="tel" class="form-control" placeholder="Enter your phone number" name="phone" required>
                                </div>

                                <!-- Appointment Date -->
                                <div class="col-12">
                                    <input type="date" class="form-control" placeholder="Appointment Date" name="appointment_date" required>
                                </div>

                                <!-- Specialist -->
                                <div class="col-12">
                                    <select class="form-select" name="speciality" required>
                                        <option>Select Speciality</option>
                                        @foreach($specialties_form as $speciality)
                                            <option value="{{ $speciality->id }}">{{ $speciality->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Enter your email address" name="email" required>
                                </div>

                                <!-- Recaptcha -->
                                <div class="col-12">
                                    <div class="captcha-box">
                                        <div class="captcha-text" id="captcha">AB12C</div>
                                        <input type="text" class="captcha-input" placeholder="Enter Captcha"
                                            id="captcha-input" required>
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

@section('script')
    <script>
        // Generate random captcha
        function generateCaptcha() {
            const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            let captcha = "";
            for (let i = 0; i < 5; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById("captcha").innerText = captcha;
            document.getElementById("captcha-input").value = "";
        }
        window.onload = generateCaptcha;

        document.addEventListener("DOMContentLoaded", function () {
            // Truncate paragraph text to 14 words
            document.querySelectorAll(".truncate-text").forEach(function (el) {
                let words = el.innerText.trim().split(" ");
                if (words.length > 10) {
                    el.innerText = words.slice(0, 10).join(" ") + "...";
                }
            });
        });
    </script>
@endsection