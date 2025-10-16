@extends('layout.master')
@section('css')
<style>
    .btn-link-view {
        font-size: 14px;
        font-weight: 600;
        color: #ffffff;
        text-decoration: none;
        position: relative;
        padding-bottom: 3px;
        background: #0097a7;
        transition: color 0.3s ease;
        border-color: #0097a7;
        border-radius: 10px;
    }

    .btn-link-view::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        background: #0097a7;
        transition: width 0.3s ease;
    }

    .btn-link-view:hover {
        color: var(--bs-btn-hover-color);
        background-color: #0097a7;
        border-color: #0097a7;
    }

    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        color: var(--bs-btn-active-color);
        background-color: #0097a7;
        border-color: #0097a7;
    }
</style>
@stop
@section('content')
    <!-- Carousel Section -->
    <section class="carousel-section">
        <!-- Swiper -->
        <div class="swiper myCarouselSwiper">
            @if($type['code'] == 200)
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/1.webp')}}" alt="Hospital Image 1">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/2.webp')}}" alt="Hospital Image 2">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/3.webp')}}" alt="Hospital Image 3">
                    </div>
                </div>
            @elseif($type['code'] == 201)
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/mobile3.webp')}}" alt="Hospital Image 1">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/mobile2.webp')}}" alt="Hospital Image 2">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/slider/mobile1.webp')}}" alt="Hospital Image 3">
                    </div>
                </div>
            @endif
            <!-- Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Our Specialties -->
    <section class="specialties-section text-center py-5">
        <div class="container">
            <h2 class="fw-bold mb-3">Our Specialties</h2>
            <p class="mb-5">
                Explore our wide range of specialties and find the right healthcare
                service for your needs.
            </p>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
                @foreach($specialties as $specialty)
                    <div class="col">
                        <a href="{{ url('specialties', $specialty->slug) }}">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                                        style="width:70px;height:70px;font-size:32px;color:#1664c0;">
                                        <img src="{{ asset($specialty->icon) }}" width="110px" alt="{{ $specialty->title }}" />
                                    </div>
                                    <h6 class="fw-semibold">{{ $specialty->title }}</h6>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

<<<<<<< HEAD
    <!-- Compassionate Care, Advanced Treatment, Trusted Expertise. -->
=======

>>>>>>> 8e44521ddb2e6179850f8f890619417386a32c35
    <section class="intro-content">
        <div class="container">
            <div class="row">
                <!-- Right Side: Content -->
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">Compassionate Care, Advanced Treatment, Trusted Expertise.</h1>
                    <h2>
                        About Sunrise Hospital
                    </h2>
                    <p class="mb-3">
                        <b>Sunrise Hospital</b>, Delhi NCR, is a trusted multispeciality and gynecology hospital offering
                        expert care in pregnancy, IVF, pediatrics, and advanced laparoscopic surgery.
                    </p>
                    <p class="mb-3">
                        Known as one of the best maternity and IVF hospitals in Delhi, we specialize in normal deliveries,
                        C-sections, high-risk pregnancies, fertility treatments, and minimally invasive gynecology
                        procedures.
                    </p>
                    <p class="mb-3">With modern facilities, experienced doctors, and compassionate care, Sunrise Hospital is
                        dedicated to ensuring better health for women, children, and families.</p>
                </div>
                <!-- Left Side: Image -->
                <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                    <div class="about-image">
                        <img src="{{asset('assets/images/home-page/about-sunrise.webp')}}"
                            alt="Best Gynecologist Hospital in Delhi NCR" class="img-fluid" width="340px">
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Book Your appointment -->
    <section class="appointment-section">
        <h2>Book Your Appointment Now</h2>

        <form class="appointment-form" action="{{ route('appointments.store') }}" method="post">
            @csrf
             <input type="hidden" name="source" value="index-page">

            <div class="row g-3">

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="bi bi-envelope"></i>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="bi bi-telephone"></i>
                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="bi bi-hospital"></i>
                        <select class="form-control" name="speciality" required>
                             <option value="">Select Speciality</option>
                            @foreach($specialties_form as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Captcha full width -->
                <div class="col-12">
                    <div class="captcha-box">
                        <div class="captcha-text" id="captcha">AB12C</div>
                        <input type="text" class="captcha-input" placeholder="Enter Captcha" id="captcha-input" required>
                        <button type="button" class="captcha-refresh" onclick="generateCaptcha()">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit">Book an Appointment</button>
                </div>

            </div>
        </form>
    </section>

    <!-- About Dr. Nikita -->
    <section class="doctor-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side: Doctor Image -->
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="doctor-img">
                        <img src="{{ asset('assets/images/home-page/nikita.webp') }}" alt="Doctor" />
                        <div class="drexperience-badge">
                            <span>20+</span>
                            Years Experienced
                        </div>
                    </div>
                </div>

                <!-- Right Side: Doctor Info -->
                <div class="col-lg-7 doctor-details">
                    <h5>World Renowned Gynae Laparoscopic Surgeon</h5>
                    <h2>DR. NIKITA TREHAN</h2>
                    <p>
                        Consult with internationally acclaimed surgeon having record-breaking
                        achievements in laparoscopic surgeries.
                    </p>

                    <h6 class="skills-title">Key Achievements</h6>
                    <ul class="skills-list">
                        <li><i class="fa-solid fa-check"></i> Record for the largest fibroid removed laparoscopically of
                            6.5 KGS</li>
                        <li><i class="fa-solid fa-check"></i> Record for the oldest patient operated at 107 years old</li>
                        <li><i class="fa-solid fa-check"></i> Record for the largest Uterus removed laparoscopically of
                            9.5kg</li>
                        <li>
                            <i class="fa-solid fa-check"></i> Achieves Medical Milestone With 127-Day Delayed Twin Delivery
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




    {{-- <section class="about-section">--}}
        {{-- <div class="container">--}}
            {{-- <div class="row align-items-center">--}}
                {{-- <!-- Left Images -->--}}
                {{-- <div class="col-lg-6 mb-5 mb-lg-0">--}}
                    {{-- <div class="image-gallery">--}}
                        {{-- <div class="main-image">--}}
                            {{-- <img src="{{ asset('assets/images/about/about1.jpg') }}"
                                alt="Modern Gynecology Facility">--}}
                            {{-- <div class="overlay-text">--}}
                                {{-- <h4>Advanced Care</h4>--}}
                                {{-- <p>State-of-the-art medical facilities</p>--}}
                                {{-- </div>--}}
                            {{-- <div class="stats-badge">--}}
                                {{-- <span class="number">15+</span>--}}
                                {{-- <span class="label">Years</span>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- <div class="small-image accent-orange">--}}
                            {{-- <img src="{{ asset('assets/images/about/about2.jpg') }}" alt="Patient Care">--}}
                            {{-- </div>--}}
                        {{-- <div class="small-image accent-green">--}}
                            {{-- <img src="{{ asset('assets/images/about/about3.jpeg') }}" alt="Medical Team">--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}

                {{-- <!-- Right Content -->--}}
                {{-- <div class="col-lg-6">--}}
                    {{-- <div class="content-area">--}}
                        {{-- <h2>About Sunrise Hospital</h2>--}}
                        {{-- <h3>Sunrise Hospital – NABH Accredited Multispeciality Hospital in South Delhi</h3>--}}
                        {{-- <p>We specialize in offering the best treatments and services for women’s health, including
                            laparoscopic gynecology, pregnancy care, and fertility treatments.</p>--}}
                        {{-- <p>At Sunrise Hospital, we provide personalized, compassionate care with state-of-the-art
                            medical facilities and a team of highly experienced specialists. Whether you are looking for a
                            top gynecologist near you, the best hospital for pregnancy in Delhi, or advanced endometriosis
                            treatment, we are here to help.</p>--}}
                        {{-- <p>Sunrise Hospital, located in F-1 Kalindi Colony near New Friends Colony, is a 50-bedded NABH
                            accredited hospital. Known as the apex center for Minimally Invasive Surgery in Asia, we are
                            internationally acclaimed for laparoscopic gynecology, IVF, bariatric, and advanced surgical
                            care. Just 30 minutes from IGI Airport, we serve patients from Delhi NCR and abroad.</p>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </section>--}}
    <!-- About SEction End -->

    {{-- <section class="specialities-section">--}}
        {{-- <div class="container">--}}
            {{-- <div class="row align-items-center g-5">--}}

                {{-- <!-- Left Panel -->--}}
                {{-- <div class="col-lg-6" data-aos="fade-right">--}}
                    {{-- <h2 class="mb-4">Specialities & Procedures</h2>--}}

                    {{-- <!-- Tabs -->--}}
                    {{-- <ul class="nav nav-tabs specialities-tabs mb-4" id="myTab" role="tablist" data-aos="fade-up" --}}
                        {{-- data-aos-delay="100">--}}
                        {{-- <li class="nav-item" role="presentation">--}}
                            {{-- <button class="nav-link active" id="specialities-tab" data-bs-toggle="tab" --}} {{--
                                data-bs-target="#specialities" type="button" role="tab" aria-controls="specialities" --}}
                                {{-- aria-selected="true">--}}
                                {{-- Specialities--}}
                                {{-- </button>--}}
                            {{-- </li>--}}
                        {{-- <li class="nav-item" role="presentation">--}}
                            {{-- <button class="nav-link" id="procedures-tab" data-bs-toggle="tab"
                                data-bs-target="#procedures" --}} {{-- type="button" role="tab" aria-controls="procedures"
                                aria-selected="false">--}}
                                {{-- Procedures--}}
                                {{-- </button>--}}
                            {{-- </li>--}}
                        {{-- </ul>--}}

                    {{-- <!-- Tab Content -->--}}
                    {{-- <div class="tab-content">--}}
                        {{-- <!-- Specialities -->--}}
                        {{-- <div class="tab-pane fade show active" id="specialities" role="tabpanel" --}} {{--
                            aria-labelledby="specialities-tab">--}}
                            {{-- <div class="row">--}}
                                {{-- <div class="col-md-6" data-aos="zoom-in" data-aos-delay="150">--}}
                                    {{-- <a href="#" class="text-decoration-none">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-ribbon"></i><span>Gynae Laparoscopic
                                                Surgeries</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="200">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-person-pregnant"></i><span>Obstetrics and
                                                Gynaecology</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="250">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-baby"></i><span>Pediatricians</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="300">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-vial"></i><span>Infertility and IVF
                                                Treatment</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="350">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-user-doctor"></i><span>Best Laparoscopic Surgeon in
                                                Delhi</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- </div>--}}

                                {{-- <div class="col-md-6">--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="400">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-bone"></i><span>Orthopedics</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="450">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-hand-holding-droplet"></i><span>Reconstructive URO
                                                Surgery</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="500">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-heart-pulse"></i><span>Cardiac Sciences</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="550">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-weight-scale"></i><span>Bariatric Surgery</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in"
                                        data-aos-delay="600">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="fa-solid fa-stethoscope"></i><span>Internal Medicine</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}

                            {{-- <a href="#" class="d-block mt-4 text-decoration-none fw-bold text-primary-blue" --}} {{--
                                data-aos="fade-up" data-aos-delay="450">--}}
                                {{-- View all Specialities <i class="bi bi-arrow-right"></i>--}}
                                {{-- </a>--}}
                            {{-- </div>--}}

                        {{-- <!-- Procedures -->--}}
                        {{-- <div class="tab-pane fade" id="procedures" role="tabpanel" aria-labelledby="procedures-tab">
                            --}}
                            {{-- <div class="row">--}}
                                {{-- <div class="col-md-6" data-aos="zoom-in" data-aos-delay="150">--}}
                                    {{-- <a href="#" class="text-decoration-none">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="bi bi-robot"></i><span>Robotic Surgery</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in" --}} {{--
                                        data-aos-delay="200">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="bi bi-droplet"></i><span>Liver Transplant</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- </div>--}}
                                {{-- <div class="col-md-6">--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in" --}} {{--
                                        data-aos-delay="250">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="bi bi-activity"></i><span>Endoscopy</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- <a href="#" class="text-decoration-none" data-aos="zoom-in" --}} {{--
                                        data-aos-delay="300">--}}
                                        {{-- <div class="speciality-item">--}}
                                            {{-- <i class="bi bi-shield-check"></i><span>Minimally Invasive
                                                Surgery</span>--}}
                                            {{-- </div>--}}
                                        {{-- </a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- <a href="#" class="d-block mt-4 text-decoration-none fw-bold text-primary-blue" --}} {{--
                                data-aos="fade-up" data-aos-delay="350">--}}
                                {{-- View all Procedures <i class="bi bi-arrow-right"></i>--}}
                                {{-- </a>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}

                {{-- <!-- Right Panel -->--}}
                {{-- <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">--}}
                    {{-- <div class="expert-box">--}}
                        {{-- <img src="https://www.maxhealthcare.in/img/doctor-consult-illustration.svg" alt="Doctor">--}}
                        {{-- <div class="expert-content">--}}
                            {{-- <h3>Looking for an Expert</h3>--}}
                            {{-- <p>Our Healthcare is home to some of the eminent doctors in the world.</p>--}}
                            {{-- <a href="#" class="btn">Find a Doctor <i--}} {{--
                                    class="bi bi-arrow-right-circle ms-2"></i></a>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </section>--}}

    {{-- <section class="who-section">--}}
        {{-- <div class="container">--}}
            {{-- <div class="row align-items-center g-4">--}}
                {{-- <!-- Left Images -->--}}
                {{-- <div class="col-lg-6 who-images">--}}
                    {{-- <div class="row g-3">--}}
                        {{-- <div class="col-md-6" data-aos="fade-right">--}}
                            {{-- <img src="{{asset('assets/images/home-page/who-are-we-1.webp')}}" --}} {{-- alt="Doctor"
                                class="shadow-img" />--}}
                            {{-- </div>--}}
                        {{-- <div class="col-md-6" data-aos="fade-down">--}}
                            {{-- <img src="{{asset('assets/images/home-page/who-are-we-2.webp')}}" --}} {{-- alt="Nurse"
                                class="shadow-img" />--}}
                            {{-- </div>--}}
                        {{-- <div class="col-md-12" data-aos="fade-up" data-aos-delay="150">--}}
                            {{-- <img src="{{asset('assets/images/home-page/who-are-we-3.webp')}}" --}} {{-- alt="Patient"
                                class="shadow-img" />--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}

                {{-- <!-- Right Content -->--}}
                {{-- <div class="col-lg-6" data-aos="fade-left">--}}
                    {{-- <h6>Who We Are</h6>--}}
                    {{-- <h2 class="fw-bold">--}}
                        {{-- Trusted Multispecialty & Gynecology Hospital in Delhi--}}
                        {{-- </h2>--}}
                    {{-- <p>--}}
                        {{-- Sunrise Hospital in South Delhi delivers world-class gynecology, maternity, IVF, and minimally
                        invasive surgeries with patient-centered care, advanced treatments, and exceptional service trusted
                        by people in India and abroad.--}}
                        {{-- </p>--}}

                    {{-- <div class="row">--}}
                        {{-- <div class="col-sm-6">--}}
                            {{-- <div class="who-feature" data-aos="zoom-in">--}}
                                {{-- <i class="bi bi-hand-thumbs-up"></i>--}}
                                {{-- <div>--}}
                                    {{-- <h3>Clinical Excellence</h3>--}}
                                    {{-- <p>--}}
                                        {{-- With advanced technology, exemplary care, and global specialists, Sunrise
                                        Hospital is renowned for high-quality gynecology and surgical excellence.--}}
                                        {{-- </p>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- <div class="col-sm-6">--}}
                            {{-- <div class="who-feature" data-aos="zoom-in" data-aos-delay="150">--}}
                                {{-- <i class="bi bi-person-badge"></i>--}}
                                {{-- <div>--}}
                                    {{-- <h3>Experienced Doctors</h3>--}}
                                    {{-- <p>--}}
                                        {{-- Internationally trained doctors specializing in gynecology, IVF, maternity, and
                                        surgeries deliver unmatched expertise, establishing Sunrise Hospital among Delhi’s
                                        top hospitals.--}}
                                        {{-- </p>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- <div class="col-sm-6">--}}
                            {{-- <div class="who-feature" data-aos="zoom-in" data-aos-delay="300">--}}
                                {{-- <i class="bi bi-heart"></i>--}}
                                {{-- <div>--}}
                                    {{-- <h3>Compassion & Service</h3>--}}
                                    {{-- <p>--}}
                                        {{-- Compassionate, patient-focused care in gynecology, IVF, pregnancy, and
                                        pediatrics ensures exceptional healthcare, supporting patients and exceeding
                                        expectations in South Delhi.--}}
                                        {{-- </p>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- <div class="col-sm-6">--}}
                            {{-- <div class="who-feature" data-aos="zoom-in" data-aos-delay="450">--}}
                                {{-- <i class="bi bi-hospital"></i>--}}
                                {{-- <div>--}}
                                    {{-- <h3>Teamwork & Innovation</h3>--}}
                                    {{-- <p>--}}
                                        {{-- Through teamwork and innovation, Sunrise Hospital advances healthcare with
                                        minimally invasive procedures and treatments, recognized as a leading hospital in
                                        Delhi.--}}
                                        {{-- </p>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </section>--}}

    <!-- Doctors Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Meet Our Trusted Specialists</h2>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Doctor Card 1 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">18+ Years</span>
                        <img src="{{asset('assets/nikita.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Nikita Trehan</h5>
                            <p>MBBS, DNB, MNAMS Diploma in Laparoscopic Surgery </p>
                            <p class="text-success">Gynae Laparoscopic Surgery</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <a href="{{url('doctor-detail')}}" class="btn btn-profile flex-fill"
                                    data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 2 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">31+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr.Anand-Wadera.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Anand Wadera</h5>
                            <p>MBBS, MS</p>
                            <p class="text-success">Orthopaedics, Joint Replacement & Sports Injury</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 3 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">8+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr.-prakhar-final.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Prakhar Singh</h5>
                            <p>MBBS, MD</p>
                            <p class="text-success">Critical Care Medicine & Diabetologist</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctor Card 4 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">20+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Saurabh-Sinha.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Saurabh Sinha</h5>
                            <p>MBBS, MS, M.Ch</p>
                            <p class="text-success">Urologist</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 5 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">10+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Sanjay-Gudwani.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr Sanjay Gudwani</h5>
                            <p>MBBS, MS</p>
                            <p class="text-success">ENT</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 6 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">10+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr.Anmol-Maria.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr Anmol Maria</h5>
                            <p>MBBS, MS</p>
                            <p class="text-success">Orthopaedics, Joint Replacement & Sports Injury</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 7 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">36+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Anupama-Sobti.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Anupama Sobti</h5>
                            <p>MBBS DGO</p>
                            <p class="text-success">Obstetrics & Gynaecology</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 8 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">25+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Bhavna-Barmi.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Bhawna Barmi</h5>
                            <p>Ph.d, M.phil (NIMHANS, Bangalore)</p>
                            <p class="text-success">Senior clinical and child psychologist</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 9 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">18+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Deepak-Kapoor.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Deepak Kapoor</h5>
                            <p>MBBS, MS</p>
                            <p class="text-success">General & Bariatric Surgery</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 10 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">10+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Vaibhav-Gautam.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Vaibhav Gautam</h5>
                            <p>MBBS, MS</p>
                            <p class="text-success">Orthopaedics, Joint Replacement & Sports Injury</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doctor Card 11 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">24+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Beena-Tiwari.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Beena Tiwari</h5>
                            <p>MBBS, MD</p>
                            <p class="text-success">Radiologist</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctor Card 12 -->
                <div class="swiper-slide">
                    <div class="card doctor-card">
                        <span class="experience-badge">24+ Years</span>
                        <img src="{{asset('assets/images/doctors/Dr-Sumit-More.webp')}}" alt="Doctor" />
                        <div class="doctor-info">
                            <h5>Dr. Sumit More</h5>
                            <p>MBBS, MS, MCh (Uro)</p>
                            <p class="text-success">Consultant Urologist</p>
                            <div class="doctor-actions d-flex">
                                <button class="btn btn-appointment flex-fill me-2" data-bs-toggle="tooltip"
                                    title="Book Appointment">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </button>
                                <button class="btn btn-profile flex-fill" data-bs-toggle="tooltip" title="View Profile">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- View More Button -->
        <div class="text-center mt-4">
            <a href="{{ url('doctors') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
        </div>
    </div>

    <section class="choose-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6" data-aos="fade-right">
                    <h6>Why Choose Us</h6>
                    <h2>
                        Why Choose Sunrise Hospital, Delhi
                    </h2>
                    <p>
                        At Sunrise Hospital, South Delhi, we are committed to providing world-class gynecology, maternity,
                        IVF, and laparoscopic treatments with a patient-first approach. Our hospital combines modern
                        technology, expert doctors, and affordable care, making us one of the most trusted healthcare
                        destinations in Delhi NCR.
                    </p>

                    <div class="timeline">
                        <div class="step" data-aos="fade-up" data-aos-delay="100">
                            <div class="circle">1</div>
                            <div>
                                <h3>Modern Technology</h3>
                                <p>
                                    We use advanced laparoscopic and minimally invasive equipment, ensuring safer surgeries,
                                    faster recovery, and precision-driven treatments. Recognized as a Center of Excellence
                                    for Laparoscopic & Endoscopic Surgeries in Asia, we are equipped with state-of-the-art
                                    facilities for women’s health and fertility care.
                                </p>
                            </div>
                        </div>

                        <div class="step" data-aos="fade-up" data-aos-delay="200">
                            <div class="circle">2</div>
                            <div>
                                <h3>Professional Doctors</h3>
                                <p>
                                    Our team includes internationally acclaimed gynecologists, laparoscopic surgeons, and
                                    IVF specialists with decades of experience. Patients across India and abroad trust our
                                    doctors for their expertise, compassionate care, and successful treatment outcomes.
                                </p>
                            </div>
                        </div>

                        <div class="step" data-aos="fade-up" data-aos-delay="300">
                            <div class="circle">3</div>
                            <div>
                                <h3>Affordable Price</h3>
                                <p>
                                    We believe quality healthcare should be accessible to everyone. Sunrise Hospital offers
                                    cost-effective gynecology, maternity, and IVF treatments in Delhi, without compromising
                                    on safety, technology, or patient comfort.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6 choose-image" data-aos="zoom-in">
                    <img src="{{asset('assets/images/home-page/why-choose.webp')}}" alt="Doctors" />
                    <div class="service-box" data-aos="flip-left">
                        <i class="bi bi-telephone-fill call-icon"></i>
                        <div>
                            <h6>Book Appointment</h6>
                            <p><a href="tel:+919800001900">+91 9800001900</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="patient-testimonial-slider">
        <div class="container">
            <div class="text-center">
                <h2>Our Patients, Their Words</h2>
            </div>
            <div class="swiper PatientTestimonialSwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DOsjkQAksf1/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DOsjkQAksf1/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DOsjkQAksf1/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DO51fiAElrQ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DO51fiAElrQ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DO51fiAElrQ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DNDYxobyjio/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DNDYxobyjio/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DNDYxobyjio/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DM2iZN3yxvy/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DM2iZN3yxvy/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DM2iZN3yxvy/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DMxqv8TS6KZ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DMxqv8TS6KZ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DMxqv8TS6KZ/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Slide 6 -->
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <blockquote class="instagram-media" data-instgrm-captioned
                                data-instgrm-permalink="https://www.instagram.com/reel/DMfSglvycKL/?utm_source=ig_embed&amp;utm_campaign=loading"
                                data-instgrm-version="14"
                                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                <div style="padding:16px;"> <a
                                        href="https://www.instagram.com/reel/DMfSglvycKL/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                        target="_blank">
                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                            </div>
                                            <div
                                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 19% 0;"></div>
                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg
                                                width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                                xmlns="https://www.w3.org/2000/svg"
                                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                        <g>
                                                            <path
                                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div style="padding-top: 8px;">
                                            <div
                                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                                View this post on Instagram</div>
                                        </div>
                                        <div style="padding: 12.5% 0;"></div>
                                        <div
                                            style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                            <div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                                </div>
                                                <div
                                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                                </div>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <div
                                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                                </div>
                                            </div>
                                            <div style="margin-left: auto;">
                                                <div
                                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                                </div>
                                                <div
                                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                                </div>
                                                <div
                                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                            </div>
                                        </div>
                                    </a>
                                    <p
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/reel/DMfSglvycKL/?utm_source=ig_embed&amp;utm_campaign=loading"
                                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                            target="_blank">A post shared by Sunrise Hospital (@sunrisehospital)</a></p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <!-- Swiper Pagination + Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('patient-testimonial') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
            </div>
        </div>
    </section>

    <section class="rare-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Rare Cases & Medical Breakthroughs</h2>
            <p>
                At Sunrise Hospital, South Delhi, our internationally trained doctors handle rare medical cases and
                deliver innovative gynecology, IVF, and minimally invasive treatments. Patients from India and abroad
                trust us for cutting-edge healthcare solutions.
            </p>
        </div>

        <!-- Swiper -->
        <div class="swiper myRareSwiper">
            <div class="swiper-wrapper">
                @foreach($cases as $case)
                    <div class="swiper-slide">
                        <div class="card rare-card">
                            <img src="{{ asset('admin-assets/images/admin-image/rare-cases/' . $case->image) }}" alt="{{ $case->title }}" />
                            <div class="rare-card-body">
                                <h5 class="truncate-heading">{{ $case->title }}</h5>
                                <p class="truncate-text">{{ $case->short_description }}</p>
                                <a href="{{ $case->source }}" target="_blank" class="btn-read">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Swiper Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-4">
            <a href="{{ url('rare_case') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
        </div>
    </div>
    </section>


    <!-- Events Section -->
    <section class="events-section py-5">
        <div class="container">
            <div class="text-center">
                <h2>Sunrise Hospital: Where Care Meets Community</h2>
                <p>
                    Stay informed about upcoming health events, workshops, and awareness programs at Sunrise Hospital, South Delhi. Join our expert-led sessions on gynecology, IVF, maternity, pediatrics, and minimally invasive surgeries to gain valuable insights and enhance your health knowledge. Participate to stay proactive about your wellbeing.
                </p>
            </div>

            <!-- Swiper -->
            <div class="swiper myEventSwiper"> <!-- Add this container -->
                <div class="swiper-wrapper">
                    @foreach($events as $event)
                        <div class="swiper-slide">
                            <div class="card rare-card">
                                <img src="{{ asset('admin-assets/images/admin-image/community-events/' . $event->image) }}" 
                                    alt="{{ $event->title }}">
                                <div class="rare-card-body">
                                    <h5 class="truncate-heading">{{ $event->title }}</h5>
                                    <p class="truncate-text">{{ $event->short_description }}</p>
                                    <a href="{{ url('event/' . $event->slug) }}" class="btn-read">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Swiper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-4">
                <a href="{{ url('event') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
            </div>
        </div>
    </section>



    {{-- <section class="awards-section">--}}
        {{-- <div class="container">--}}
            {{-- <div class="row align-items-center">--}}
                {{-- <!-- Left Side -->--}}
                {{-- <div class="col-lg-4 awards-left mb-5 mb-lg-0">--}}
                    {{-- <h2>Awards & Recognition – Excellence in Healthcare</h2>--}}
                    {{-- <p>--}}
                        {{-- Sunrise Hospital, South Delhi, is honored for clinical excellence, technology-enabled
                        consultations, and world-class doctors. Our awards reflect high-quality healthcare, affordable
                        healthcare, minimally invasive treatments, and trusted gynecology, maternity, and IVF services and
                        multispecialty care.--}}
                        {{-- </p>--}}

                    {{-- <div class="year-buttons">--}}
                        {{-- <button>View All</button>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}

                {{-- <!-- Right Side Swiper -->--}}
                {{-- <div class="col-lg-8">--}}
                    {{-- <div class="swiper myAwardSwiper">--}}
                        {{-- <div class="swiper-wrapper">--}}
                            {{-- <!-- Award 1 -->--}}
                            {{-- <div class="swiper-slide">--}}
                                {{-- <div class="award-card">--}}
                                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/786/786432.png" alt="Award" />--}}
                                    {{-- <h5>ClinicMaster 2024</h5>--}}
                                    {{-- <p>Quality and Accreditation Institute</p>--}}
                                    {{-- <a href="#">Save the Children</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}

                            {{-- <!-- Award 2 -->--}}
                            {{-- <div class="swiper-slide">--}}
                                {{-- <div class="award-card">--}}
                                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png"
                                        alt="Award" />--}}
                                    {{-- <h5>WHO Medizone 2024</h5>--}}
                                    {{-- <p>Excellence in Healthcare</p>--}}
                                    {{-- <a href="#">World Health Org</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}

                            {{-- <!-- Award 3 -->--}}
                            {{-- <div class="swiper-slide">--}}
                                {{-- <div class="award-card">--}}
                                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/2910/2910764.png"
                                        alt="Award" />--}}
                                    {{-- <h5>ClinicMaster 2023</h5>--}}
                                    {{-- <p>Best Patient Care Award</p>--}}
                                    {{-- <a href="#">Save the Children</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}

                            {{-- <!-- Award 4 -->--}}
                            {{-- <div class="swiper-slide">--}}
                                {{-- <div class="award-card">--}}
                                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/2910/2910769.png"
                                        alt="Award" />--}}
                                    {{-- <h5>Global Health 2022</h5>--}}
                                    {{-- <p>International Healthcare Award</p>--}}
                                    {{-- <a href="#">Global Org</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}

                        {{-- <!-- Swiper Controls -->--}}
                        {{-- <div class="swiper-pagination"></div>--}}
                        {{-- <div class="swiper-button-next"></div>--}}
                        {{-- <div class="swiper-button-prev"></div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </section>--}}


    <section class="blog-section">
        <div class="container">
            <div class="text-center">
                <h2>Latest Health Blogs & Medical Articles</h2>
                <p>Stay updated with the latest gynecology, IVF, maternity, and pediatric health blogs from Sunrise
                    Hospital, South Delhi. Expert insights, tips, and innovative treatment updates to guide patients in
                    making informed healthcare decisions.</p>
            </div>
            <div class="swiper myBlogSwiper">
                <div class="swiper-wrapper">
                    @foreach($blogs as $blog)
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-image">
                                    <img src="{{ asset('admin-assets/images/admin-image/blogs/' . $blog->image) }}" 
                                        alt="{{ $blog->title }}" />
                                </div>
                                <div class="blog-content">
                                    <!-- Dynamic URL using slug -->
                                    <a href="{{ route('blog-detail', $blog->slug) }}">
                                        <h3 class="blog-title">{{ $blog->title }}</h3>
                                    </a>
                                    <p class="blog-excerpt">{{ $blog->short_description }}</p>
                                    <div class="blog-meta">
                                        <span class="author">{{ $blog->author }}</span>
                                        <div class="meta-info">
                                            <span class="date">{{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</span> |
                                            <span class="read-time">7 min read</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Swiper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- View All Button -->
            <div class="text-center mt-4">
                <a href="{{ url('blog-list') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
            </div>
        </div>
    </section>

    <!-- Video Testimonials Section -->
    <section class="testimonial-slider">
        <div class="container">
            <div class="text-center">
                <h2>Video Testimonials –- Patient Experiences at Sunrise Hospital


                </h2>
                <p>
                    Hear directly from our patients about their experiences at Sunrise Hospital, South Delhi. Watch real
                    stories of successful gynecology, IVF, maternity, and minimally invasive treatments, showcasing our
                    commitment to compassionate care, expertise, and exceptional outcomes. Our video testimonials help you
                    make informed decisions and trust our world-class healthcare services.
                </p>
            </div>
            <div class="swiper TestimonialSwiper">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <iframe src="https://www.youtube.com/embed/6IktPd0diPg?si=FtzXDAOFKHBPKlso"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <iframe src="https://www.youtube.com/embed/58WtNQrVCE0?si=Rxf_k-1dPqoV9F7j"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <iframe src="https://www.youtube.com/embed/0qmyp8DQiAM?si=61Rvh1M0G5DvuIGN"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <iframe src="https://www.youtube.com/embed/yMhOmL3qtgk?si=0zLVpEiYlAz5p3cM"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <iframe src="https://www.youtube.com/embed/60nxxbOFcYw?si=tnFF_pFpserpF65a"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <!-- Swiper Pagination + Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('video-testimonial') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
            </div>
        </div>
    </section>

  <section class="faq-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- FAQ Left -->
            <div class="col-lg-7">
                <h2>Frequently Asked Questions (FAQs)</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $key }}">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Image + Contact -->
            <div class="col-lg-5">
                <div class="appointment-wrapper">
                    <img src="https://www.sunrisehospitals.in/wp-content/uploads/2024/03/IMG-20240311-WA0137.jpg" alt="Doctor" class="img-fluid faq-img">
                    <div class="contact-box">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <small>Contact us</small><br>
                                <strong>+91 9800001900</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('faq') }}" class="btn btn-primary btn-sm btn-link-view">View All</a>
        </div>
    </div>
</section>

    {{-- <section class="appointment-section">--}}
        {{-- <div class="container">--}}
            {{-- <div class="row align-items-center">--}}
                {{-- <!-- Left: Form -->--}}
                {{-- <div class="col-lg-6" data-aos="fade-right">--}}
                    {{-- <div class="appointment-box p-4">--}}
                        {{-- <h3 class="text-center mb-4">Book An Appointment Now</h3>--}}
                        {{-- <form>--}}
                            {{-- <div class="row g-3">--}}
                                {{-- <!-- Name -->--}}
                                {{-- <div class="col-md-6 col-12">--}}
                                    {{-- <input type="text" class="form-control" placeholder="Your Name">--}}
                                    {{-- </div>--}}

                                {{-- <!-- Phone -->--}}
                                {{-- <div class="col-md-6 col-12">--}}
                                    {{-- <input type="text" class="form-control" placeholder="Phone Number">--}}
                                    {{-- </div>--}}

                                {{-- <!-- Email -->--}}
                                {{-- <div class="col-md-6 col-12">--}}
                                    {{-- <input type="email" class="form-control" placeholder="Your Email">--}}
                                    {{-- </div>--}}

                                {{-- <!-- Date -->--}}
                                {{-- <div class="col-md-6 col-12">--}}
                                    {{-- <input type="date" class="form-control">--}}
                                    {{-- </div>--}}

                                {{-- <!-- Specialties -->--}}
                                {{-- <div class="col-12">--}}
                                    {{-- <select class="form-select" name="service" aria-label="Default select example">--}}
                                        {{-- <option value="Select Specialties">Select Specialties</option>--}}
                                        {{-- <option value="Gynae Laparoscopic Surgeries">Gynae Laparoscopic Surgeries
                                        </option>--}}
                                        {{-- <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
                                        --}}
                                        {{-- <option value="Pediatrics">Pediatrics</option>--}}
                                        {{-- <option value="Infertility and IVF">Infertility and IVF</option>--}}
                                        {{-- <option value="General &amp; Laparoscopic Surgeries">General &amp; Laparoscopic
                                            Surgeries</option>--}}
                                        {{-- <option value="Orthopedics">Orthopedics</option>--}}
                                        {{-- <option value="Reconstructive URO Surgery">Reconstructive URO Surgery</option>
                                        --}}
                                        {{-- <option value="Cardiac Sciences">Cardiac Sciences</option>--}}
                                        {{-- <option value=" General Medicine"> General Medicine</option>--}}
                                        {{-- </select>--}}
                                    {{-- </div>--}}
                                {{-- <!-- Message -->--}}
                                {{-- <div class="col-12">--}}
                                    {{-- <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>--}}
                                    {{-- </div>--}}

                                {{-- <!-- Captcha -->--}}
                                {{-- <div class="col-12">--}}
                                    {{-- <div class="d-flex align-items-center gap-2">--}}
                                        {{-- <!-- Captcha Text -->--}}
                                        {{-- <div class="captcha-text px-3 py-2 rounded bg-light fw-bold">g3Td6</div>--}}
                                        {{-- <!-- Input -->--}}
                                        {{-- <input type="text" class="form-control" placeholder="Enter Captcha">--}}
                                        {{-- <!-- Refresh Icon -->--}}
                                        {{-- <button type="button" class="btn btn-secondary">--}}
                                            {{-- <i class="fa fa-sync-alt"></i>--}}
                                            {{-- </button>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <!-- Button -->--}}
                                {{-- <div class="col-3">--}}
                                    {{-- <button type="submit" class="btn btn-primary btn-book w-100 py-2">--}}
                                        {{-- <i class="fa fa-paper-plane"></i> Submit--}}
                                        {{-- </button>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </form>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}

                {{-- <!-- Right: Doctor -->--}}
                {{-- <div class="col-lg-6 doctor-wrapper" data-aos="fade-left">--}}
                    {{-- <div class="content-media">--}}
                        {{-- <img src="https://clinicmaster.dexignzone.com/xhtml/ophthalmology/images/about/img6.webp" --}}
                            {{-- alt="Doctor" class="doctor-img img-fluid">--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </section>--}}

@endsection
@section('script')
    <script>
        var swiper = new Swiper(".myEventSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                },
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".PatientTestimonialSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                992: { slidesPerView: 3 }
            }
        });

        function bindInstagramIframes() {
            document.querySelectorAll("iframe.instagram-media").forEach(function (iframe) {
                if (iframe.dataset.binded) return;
                iframe.dataset.binded = "true";

                // जब iframe पर click/focus होगा → autoplay stop
                iframe.addEventListener("mouseenter", function () {
                    swiper.autoplay.stop();
                });
                iframe.addEventListener("click", function () {
                    swiper.autoplay.stop();
                });
            });
        }

        // Load के बाद Instagram embed inject होते हैं → थोड़ी देर बाद bind करो
        window.addEventListener("load", function () {
            setTimeout(bindInstagramIframes, 2000);
        });

        // User वापस पेज focus करे → autoplay resume
        window.addEventListener("focus", function () {
            swiper.autoplay.start();
        });
    </script>
    <!-- Instagram embed JS -->
    <script async src="//www.instagram.com/embed.js"></script>

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

        document.addEventListener("DOMContentLoaded", function () {
            const excerpts = document.querySelectorAll(".blog-excerpt");
            excerpts.forEach(function (excerpt) {
                let text = excerpt.innerText.trim();
                let words = text.split(" ");

                if (words.length > 12) {
                    let shortText = words.slice(0, 12).join(" ") + "...";
                    excerpt.innerText = shortText;
                }
            });
        });
    </script>
@endsection