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
                <!-- <div class="row">
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
                </div> -->
                <div class="row justify-content-center">
                    @foreach($visions as $vision)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="stat-item ">
                                <span class="stat-number d-block mb-2">{{ $vision['stats'] }}</span>
                                <span class="stat-label">{{ $vision['label'] }}</span>
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
            @foreach($milestones as $key => $item)
                <div class="timeline-item" data-aos="{{ $key % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h3>{{ $item->heading }}</h3>
                        <span class="date">{{ $item->year }}</span>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
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
                @foreach($facilities as $item)
                    <div class="col-lg-4 col-md-6 fade-in-up">
                        <div class="facility-card">
                            <div class="facility-image-container">
                                <img src="{{ asset('admin-assets/images/admin-image/facilities/'. $item->image) }}"
                                    alt="{{ $item->heading }}" class="facility-image">
                            </div>
                            <div class="facility-content">
                                <h3 class="facility-title">{{ $item->heading }}</h3>
                                <p class="facility-description">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
