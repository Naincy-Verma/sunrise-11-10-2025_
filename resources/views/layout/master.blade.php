<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Gynecologist Hospital in Delhi | Sunrise Hospital</title>

    <meta name="description" content="Sunrise Hospital is No.1 Best Gynecologist Hospital in Delhi and with expertise in all types of female reproductive health. Schedule Appointment" />
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}" />
    <style>
        /* Floating Icons */
        .floating-icons {
            position: fixed;
            right: 20px;
            top: 50%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 9999;
        }

        .floating-icons .icon {
            width: 40px;
            height: 40px;
            background: #fff;
            border: 2px solid #1ba1a1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1ba1a1;
            font-size: 18px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-decoration: none;
        }

        .floating-icons .icon:hover {
            background: #1ba1a1;
            color: #fff;
            transform: scale(1.1);
        }
        /* Blink Animation */
        .blink {
            animation: zoomAnim 1.2s infinite ease-in-out;
        }

        @keyframes zoomAnim {
            0%   { transform: scale(1); }
            50%  { transform: scale(1.15); }
            100% { transform: scale(1); }
        }
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 14px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(180deg, #003366, #0097a7);
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            display: none; /* Hidden initially */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
            z-index: 9999;
        }

        .back-to-top i {
            font-size: 18px;
        }

        .back-to-top span {
            font-size: 14px;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0,0,0,0.3);
        }
    </style>
    @yield('css')
</head>

<body>
    @php
    $specialties = \App\Models\Speciality::where('status', 'active')->get();
    @endphp
    <!-- Top Bar -->
    <div class="top-bar text-white py-2 sticky-top" style="background:#0097a7; z-index: 1031;">
        <div class="container d-flex flex-wrap justify-content-between">
            <div>
                <a href="#"><i class="bi bi-whatsapp"></i> WhatsApp Us (24/7)</a>
                <a href="#"><i class="bi bi-telephone"></i> +91 8510013337</a>
            </div>
            <div>
                <a href="https://www.facebook.com/sunrisehospitaldelhi" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/sunrisehospital" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/sunrisehospitaldelhi/" target="_blank"><i class="bi bi-linkedin"></i></a>
                <a href="https://x.com/sunhospitals1" target="_blank"><i class="bi bi-twitter"></i></a>
                <a href="https://www.youtube.com/channel/UCbGZE_nP-x9hopRtcPj5slw" target="_blank"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background:#fff; z-index:1030;">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('assets/logo.png') }}" alt="Hospital Logo" />
            </a>

            <!-- Mobile Toggler -->
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- ✅ Close Button (only visible on mobile) -->
                <button type="button" class="btn-close d-lg-none ms-auto mb-3" data-bs-toggle="collapse" data-bs-target="#navbarNav"></button>

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="specialtiesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            Our Specialties
                        </a>
                      <ul class="dropdown-menu" aria-labelledby="specialtiesDropdown">
                            @foreach($specialties as $specialty)
                                <li>
                                    <a class="dropdown-item" href="{{ url('specialties', $specialty->slug) }}">
                                        {{ $specialty->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>

                    <!-- End Dropdown -->
                    <li class="nav-item"><a class="nav-link" href="{{url('health_package')}}">Health Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/doctors')}}">Doctors</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="quickEnquiryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Quick Enquiry
                        </a>
                        <div class="dropdown-menu p-4 shadow" aria-labelledby="quickEnquiryDropdown" style="min-width: 440px; background-color: #0b7fa4; border-radius: 10px;">
                            <form action="{{ route('quick.enquiry.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="text-white">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required style="border-radius: 5px;">
                                </div>
                                <div class="mb-3">
                                    <label class="text-white">Mobile Number</label>  
                                    <input type="tel" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required style="border-radius: 5px;">
                                </div>
                                <div class="mb-3">
                                    <label class="text-white">Preferred Time To Call</label>
                                    <select name="time_slot_id" class="form-select" required style="border-radius: 5px;">
                                        <option value="">Preferred Time To Call</option>
                                         @foreach($timeSlots as $slot)
                                            <option value="{{ $slot->id }}">
                                                {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}
                                            </option>
                                        @endforeach
                                        <!-- <option value="8:00-9:00">8:00 AM - 9:00 AM</option>
                                        <option value="9:00-10:00">9:00 AM - 10:00 AM</option>
                                        <option value="10:00-11:00">10:00 AM - 11:00 AM</option>
                                        <option value="11:00-12:00">11:00 AM - 12:00 PM</option>
                                        <option value="12:00-13:00">12:00 PM - 01:00 PM</option>
                                        <option value="13:00-14:00">01:00 PM - 02:00 PM</option>
                                        <option value="14:00-15:00">02:00 PM - 03:00 PM</option> -->
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-light w-100 mb-3">Submit</button>
                                <!-- <div class="form-check text-white mt-2">
                                    <input type="checkbox" class="form-check-input" name="whatsapp_updates" id="whatsappUpdates">
                                    <label class="form-check-label" for="whatsappUpdates">
                                        Get Updates on Whatsapp. I agree to the T&C.
                                    </label> -->
                                    <small class="d-block text-white mt-2">Email - helpdesk@hospital.com</small>
                                </div>
                            </form>
                        </div>
                    </li>


                </ul>

                <!-- Right Side -->
                <div class="d-flex">
                    <a href="{{url('/book-appointment')}}" class="btn btn-patient">Book Appointment</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{-- Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap Bottom Nav (Mobile Only) -->
    <div class="mobile-bottom-nav d-md-none">
        <a href="#" class="nav-item">
            <i class="bi bi-person-badge"></i>
            <span>Doctors</span>
        </a>
        <a href="#" class="nav-item">
            <i class="bi bi-calendar-check"></i>
            <span>Book Appt</span>
        </a>
        <a href="https://wa.me/918510013337" target="_blank" class="nav-item whatsapp">
            <i class="bi bi-whatsapp"></i>
            <span>Chat</span>
        </a>
        <a href="tel:+919800001900" class="nav-item">
            <i class="bi bi-telephone-outbound"></i>
            <span>Call Us</span>
        </a>
{{--        <a href="#" class="nav-item">--}}
{{--            <i class="bi bi-list"></i>--}}
{{--            <span>Menu</span>--}}
{{--        </a>--}}
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row gy-4">
                <!-- About -->
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('assets/logo.png') }}" width="200" alt="Hospital Logo" class="mb-3 logo-red"/>
                    <p>
                        Providing world-class healthcare with minimally invasive
                        procedures in Laparoscopy, Orthopedics, Oncology & more with top
                        doctors.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h5>Quick Links</h5>
                    <!-- <a href="#">Home</a> -->
                    <a href="{{url('doctors')}}">Doctors</a>
                    <a href="{{url('blogs')}}">Blogs</a>
                    <a href="{{url('rare_case')}}">Rare Cases</a>
                     <a href="{{url('patient-education')}}">Patient Education</a>
                    <a href="{{url('health_package')}}">Health Packages</a>
                    <a href="{{url('training')}}">Training</a>
                    <a href="#">Contact</a>
                </div>

                <!-- Specialties -->
               <div class="col-lg-3 col-md-6">
                    <h5>Specialties</h5>
                    @foreach($specialties as $specialty)
                        <a href="{{ url('specialties', $specialty->slug) }}">
                            {{ $specialty->title }}
                        </a>
                    @endforeach
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6">
                    <h5>Contact Us</h5>
                    <div class="contact-info">
                        <p>
                            <i class="bi bi-telephone"></i> +91 9800001900
                        </p>
                        <p><i class="bi bi-whatsapp"></i> +91 8510013337</p>
                        <p><i class="bi bi-telephone-inbound"></i> +91 011-48820000</p>
                        <p><i class="bi bi-envelope"></i> helpdesk@hospital.com</p>
                        <p>
                            <i class="bi bi-geo-alt"></i> F-1, Kalindi Colony, New Delhi
                        </p>
                    </div>
                    <div class="social-icons mt-3">
                        <a href="https://www.facebook.com/sunrisehospitaldelhi" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/sunrisehospital" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/sunrisehospitaldelhi/" target="_blank"><i class="bi bi-linkedin"></i></a>
                        <a href="https://x.com/sunhospitals1" target="_blank"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCbGZE_nP-x9hopRtcPj5slw" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom mt-4">
                <p>
                    © 2025 Hospital Website. All Rights Reserved | Privacy Policy |
                    Terms & Conditions
                </p>
            </div>
        </div>
    </footer>

    <div class="floating-icons">
        <a href="tel:+919800001900" class="icon blink">
            <i class="fas fa-phone-alt"></i>
        </a>
        <a href="https://wa.me/918510013337" target="_blank" class="icon blink">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="{{url('/book-appointment')}}" class="icon blink">
            <i class="fas fa-calendar-alt"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-angle-up"></i>
        <span>Top</span>
    </button>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script>
        var swiper = new Swiper(".myCarouselSwiper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            speed: 800,
            effect: "slide",
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
            autoplay: {
                delay: 3000, // 3s auto-slide
                disableOnInteraction: false,
            },
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                },
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".myRareSwiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
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
        var swiper = new Swiper(".myAwardSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
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
        var swiper = new Swiper(".myBlogSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
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
        var swiper = new Swiper(".TestimonialSwiper", {
            slidesPerView: 1, // default mobile
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
                992: { // desktop
                    slidesPerView: 3
                }
            }
        });

        window.addEventListener("scroll", function () {
            const button = document.getElementById("backToTop");
            if (window.scrollY > 300) {
                button.style.display = "flex";
            } else {
                button.style.display = "none";
            }
        });

        // Smooth Scroll to Top
        document.getElementById("backToTop").addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>

    @yield('script')
</body>

</html>
