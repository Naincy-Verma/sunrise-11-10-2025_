@extends('layout.master')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <!-- About SEction Start -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Images -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="image-gallery">
                        <div class="main-image">
                           @if($about && $about->image)
                                <img src="{{ asset('admin-assets/images/admin-image/abouts/' . $about->image) }}" alt="{{ $about->heading }}">
                            @endif
                            
                            <div class="stats-badge">
                                <span class="number">15+</span>
                                <span class="label">Years</span>
                            </div>
                        </div>
                        <div class="small-image accent-orange">
                           @if($about && $about->image_small1)
                            <img src="{{ asset('admin-assets/images/admin-image/abouts/' . $about->image_small1) }}" alt="{{ $about->heading }}">
                        @endif
                        </div>
                        <div class="small-image accent-green">
                           @if($about && $about->image_small2)
                            <img src="{{ asset('admin-assets/images/admin-image/abouts/' . $about->image_small2) }}" alt="{{ $about->heading }}">
                        @endif
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="content-area">
                         @if($about)
                        <h2>{{ $about->heading }}</h2>
                        <p>{!! nl2br(e($about->description)) !!}</p>
                    @endif
                        <!-- <h2>About Sunrise Hospital</h2>
                        <p>At Sunrise Hospital, located in Kalindi Colony near New Friends Colony, New Delhi, we specialize
                            in Minimally Invasive Surgery with global accreditation. Our expertise spans Laparoscopy,
                            Thoracoscopy, Arthroscopy, and Cystoscopy, performed by some of the most experienced doctors.
                        </p>
                        <p>We take pride in our commitment to excellent care, advanced techniques, and unmatched experience.
                            Explore more about us and our specialized services.</p>
                        <p>Sunrise Hospital is a 50-bedded healthcare facility located in the heart of South Delhi, offering
                            expert medical care. Situated just a 30-minute drive from Indira Gandhi International Airport,
                            it provides easy access for patients. </p>
                        <p>Discover more about us and our advanced healthcare services, including cutting-edge laparoscopic
                            surgery.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About SEction End -->

    <!-- Vision Mission -->
    <!-- <section class="vision-mission-section">
        <div class="floating-elements">
            <i class="fas fa-female floating-element" style="font-size: 3.5rem;"></i>
            <i class="fas fa-baby floating-element" style="font-size: 3rem;"></i>
            <i class="fas fa-heart floating-element" style="font-size: 2.8rem;"></i>
            <i class="fas fa-stethoscope floating-element" style="font-size: 3.2rem;"></i>
        </div>

        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Vision & Mission</h2>
                <p class="section-subtitle">
                    Empowering women through exceptional gynecological and obstetric care. We are committed to supporting
                    women at every stage of their healthcare journey with compassion, expertise, and cutting-edge medical
                    technology.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="mission-vision-card mb-4">
                        <div class="card-icon vision-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="card-title">Our Vision</h3>
                        <p class="card-content">
                            To be the leading women's healthcare center, recognized for excellence in gynecological and
                            obstetric services, where every woman receives personalized, compassionate, and comprehensive
                            care.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="mission-vision-card">
                        <div class="card-icon vision-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3 class="card-title">Our Mission</h3>
                        <p class="card-content">
                            To provide comprehensive, patient-centered gynecological and obstetric care through skilled
                            specialists, state-of-the-art technology, and a commitment to women's health and well-being.
                        </p>
                    </div>
                </div>
            </div>

            <div class="stats-section">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stat-item mb-3">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Years of Excellence</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stat-item mb-3">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Expert Gynecologists</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stat-item mb-3">
                            <span class="stat-number">5000+</span>
                            <span class="stat-label">Successful Deliveries</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Maternity Care</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
 <section class="vision-mission-section">
    <div class="floating-elements">
        <i class="fas fa-female floating-element" style="font-size: 3.5rem;"></i>
        <i class="fas fa-baby floating-element" style="font-size: 3rem;"></i>
        <i class="fas fa-heart floating-element" style="font-size: 2.8rem;"></i>
        <i class="fas fa-stethoscope floating-element" style="font-size: 3.2rem;"></i>
    </div>

    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Vision & Mission</h2>
            <p class="section-subtitle">
                Empowering women through exceptional gynecological and obstetric care. We are committed to supporting
                women at every stage of their healthcare journey with compassion, expertise, and cutting-edge medical
                technology.
            </p>
        </div>

        <div class="row">
            @foreach($visions as $vision)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="mission-vision-card">
                        <div class="card-icon vision-icon">
                            <i class="{{ $vision->icon }}"></i>
                        </div>
                        <h3 class="card-title">{{ $vision->heading }}</h3>
                        <p class="card-content">
                            {{ $vision->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Stats Section --}}
        <div class="stats-section mt-5">
            <div class="row justify-content-center">
                @foreach($visions as $vision)
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="stat-item card text-center p-4 shadow-sm h-100">
                            <span class="stat-number d-block mb-2">{{ $vision->stats }}</span>
                            <span class="stat-label fw-semibold">{{ $vision->heading }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>




    <!-- Milestones and Achievements -->
    <section class="milestones-achievements">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <h2 class="mb-4">Our Milestones</h2>
            </div>

            <div class="timeline">
                <!-- Item 1 -->
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-hospital"></i></div>
                        <h3>Hospital Foundation</h3>
                        <span class="date">1985</span>
                        <p>Established as a premier healthcare institution with a vision to provide world-class medical care.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-certificate"></i></div>
                        <h3>First Accreditation</h3>
                        <span class="date">1992</span>
                        <p>Received our first national healthcare accreditation, recognizing our commitment to quality care
                            and patient safety standards.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-heart-pulse"></i></div>
                        <h3>Cardiac Center Launch</h3>
                        <span class="date">1998</span>
                        <p>Opened our state-of-the-art Cardiac Care Center with advanced labs and surgery suites. Performed
                            over 10,000 successful procedures.</p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-microscope"></i></div>
                        <h3> Research Institute</h3>
                        <span class="date">2005</span>
                        <p>Established our Medical Research Institute, contributing to groundbreaking studies in oncology,
                            cardiology, and neuroscience.</p>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-globe"></i></div>
                        <h3>International Recognition</h3>
                        <span class="date">2012</span>
                        <p>Received Joint Commission International (JCI) accreditation, placing us among the top 1% of
                            hospitals worldwide.</p>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-robot"></i></div>
                        <h3> AI & Robotics Integration</h3>
                        <span class="date">2020</span>
                        <p>Pioneered AI diagnostics and robotic surgery systems. First hospital in the region to implement
                            comprehensive digital healthcare solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Milestones and Achievements End -->

    <!-- Hospital Facilities Start-->
    <section class="facilities-section">
        <div class="floating-elements">
            <div class="floating-circle circle-1"></div>
            <div class="floating-circle circle-2"></div>
            <div class="floating-circle circle-3"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <h2>Hospital Facilities</h2>
                <p class="section-subtitle">
                    Discover our world-class medical facilities designed with cutting-edge technology and compassionate care
                    for women's health and wellness
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-premium">Premium Care</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility1.jpg') }}"
                                alt="Advanced Operating Theater" class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-procedures overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">Advanced Operating Theaters</h3>
                            <p class="facility-description">
                                State-of-the-art surgical suites with robotic assistance and minimally invasive technology
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>Robotic Surgery Systems</li>
                                                  <li>4K Laparoscopic Equipment</li>
                                                  <li>Advanced Anesthesia Monitoring</li>
                                                  <li>Sterile Environment Controls</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-advanced">Advanced Tech</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility2.jpg') }}" alt="4D Ultrasound Suite"
                                class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-baby overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">4D Ultrasound Imaging</h3>
                            <p class="facility-description">
                                High-definition fetal imaging with real-time monitoring and comprehensive prenatal
                                assessment
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>4D Real-time Imaging</li>
                                                  <li>Doppler Flow Studies</li>
                                                  <li>Fetal Heart Monitoring</li>
                                                  <li>Digital Image Storage</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-luxury">Luxury Suite</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility3.jpg') }}" alt="Luxury Birthing Suite"
                                class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-heart overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">Luxury Birthing Suites</h3>
                            <p class="facility-description">
                                Comfortable birthing environments with family accommodation and birthing pool options
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>Private Birthing Pools</li>
                                                  <li>Family Accommodation</li>
                                                  <li>Advanced Fetal Monitoring</li>
                                                  <li>Pain Management Options</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-premium">Premium Care</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility4.jpg') }}" alt="Recovery Suites"
                                class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-bed overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">Premium Recovery Rooms</h3>
                            <p class="facility-description">
                                Spacious recovery suites with modern amenities and 24/7 specialized nursing care
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>Private Recovery Suites</li>
                                                  <li>24/7 Nursing Care</li>
                                                  <li>Family Visitor Areas</li>
                                                  <li>Modern Medical Equipment</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-advanced">Diagnostic Lab</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility5.jpg') }}" alt="Advanced Laboratory"
                                class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-microscope overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">Advanced Laboratory</h3>
                            <p class="facility-description">
                                Complete diagnostic services with rapid testing and specialized women's health screenings
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>Hormone Analysis</li>
                                                  <li>Genetic Screening</li>
                                                  <li>Fertility Testing</li>
                                                  <li>Cancer Markers</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="facility-card">
                        <!-- <div class="specialty-badge badge-luxury">Digital Health</div> -->
                        <div class="facility-image-container">
                            <img src="{{ asset('assets/images/facility/facility6.jpg') }}" alt="Consultation Rooms"
                                class="facility-image">
                            <!-- <div class="image-overlay">
                                                  <i class="fas fa-user-md overlay-icon"></i>
                                                </div> -->
                        </div>
                        <div class="facility-content">
                            <h3 class="facility-title">Smart Consultation Rooms</h3>
                            <p class="facility-description">
                                Modern consultation spaces with telemedicine capabilities and digital health records
                            </p>
                            <!-- <ul class="feature-list">
                                                  <li>Telemedicine Setup</li>
                                                  <li>Digital Health Records</li>
                                                  <li>Virtual Consultations</li>
                                                  <li>Patient Education Systems</li>
                                                </ul> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="stats-showcase">
                                          <div class="row text-center">
                                            <div class="col-md-3 col-6">
                                              <div class="stat-item">
                                                <div class="stat-icon">
                                                  <i class="fas fa-baby"></i>
                                                </div>
                                                <span class="stat-number">25,000+</span>
                                                <span class="stat-label">Healthy Births</span>
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                              <div class="stat-item">
                                                <div class="stat-icon">
                                                  <i class="fas fa-award"></i>
                                                </div>
                                                <span class="stat-number">30+</span>
                                                <span class="stat-label">Years Excellence</span>
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                              <div class="stat-item">
                                                <div class="stat-icon">
                                                  <i class="fas fa-user-md"></i>
                                                </div>
                                                <span class="stat-number">75+</span>
                                                <span class="stat-label">Expert Doctors</span>
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                              <div class="stat-item">
                                                <div class="stat-icon">
                                                  <i class="fas fa-heart"></i>
                                                </div>
                                                <span class="stat-number">99.5%</span>
                                                <span class="stat-label">Success Rate</span>
                                              </div>
                                            </div>
                                          </div>
                                        </div> -->
        </div>
    </section>
    <!-- Hospital Facilities End-->
@endsection
