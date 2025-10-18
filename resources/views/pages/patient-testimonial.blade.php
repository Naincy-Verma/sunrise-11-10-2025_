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
                            <li class="breadcrumb-item"><a href="#">Patients Testimonials &amp; Medical Breakthroughs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
   <section class="patient-testimonial-slider">
        <div class="container">
            <div class="text-center">
                <h2>Our Patients, Their Words</h2>
            </div>
           <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="instagram-card">
                            <iframe 
                                src="https://www.instagram.com/reel/DOsjkQAksf1/embed" 
                                width="400" 
                                height="480" 
                                frameborder="0" 
                                scrolling="no" 
                                allowtransparency="true">
                            </iframe>

                        </div>
                    </div>
                @endforeach
            </div>
           
        </div>
    </section>

@endsection
@section('script')
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

                iframe.addEventListener("mouseenter", function () {
                    swiper.autoplay.stop();
                });
                iframe.addEventListener("click", function () {
                    swiper.autoplay.stop();
                });
            });
        }

        window.addEventListener("load", function () {
            setTimeout(bindInstagramIframes, 2000);
        });

        window.addEventListener("focus", function () {
            swiper.autoplay.start();
        });
    </script>
    <script async src="//www.instagram.com/embed.js"></script>

@endsection