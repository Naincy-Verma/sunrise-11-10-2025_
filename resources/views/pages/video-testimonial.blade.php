@extends('layout.master')
@section('css')
   
@endsection
@section('content')
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Video Testimonials &amp; Medical Breakthroughs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
   <section class="testimonial-slider">
        <div class="container">
            <div class="text-center">
                <h2>Video Testimonials – Patient Experiences at Sunrise Hospital</h2>
                <p>
                    Hear directly from our patients about their experiences at Sunrise Hospital, South Delhi. Watch real stories of successful gynecology, IVF, maternity, and minimally invasive treatments, showcasing our commitment to compassionate care, expertise, and exceptional outcomes. Our video testimonials help you make informed decisions and trust our world-class healthcare services.
                </p>
            </div>
            <div class="swiper TestimonialSwiper">
                <div class="swiper-wrapper">
                    @foreach($videos as $video)
                        <div class="swiper-slide">
                            <div class="video-card">
                                <iframe src="{{ asset('admin-assets/images/admin-image/video-testimonials/' . $video->video) }}" title="{{ $video->title ?? 'Video Testimonial' }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Swiper Pagination + Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
        </div>
    </section>
@endsection