<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:title" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:image" content="{{asset('admin-assets/social-image.png')}}" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="https://edumin.dexignlab.com/xhtml/error-404.html" type="image/x-icon" />

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/favicon.png')}}" />

    <!-- Font-awesone cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- PAGE TITLE HERE -->
    <title>Edumin - Bootstrap Admin Dashboard</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/skin.css')}}">
    @yield('css')
</head>

<body>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ url('admin/dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('assets/logo.png') }}" alt="Logo Abbr">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{asset('admin-assets/images/profile/education/pic1.jpg')}}" width="20"
                                        alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ml-2">Logout </span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="{{ url('admin/dashboard')}}" aria-expanded="false">
                            <i class="la la-home"></i>
                           <span class="nav-text">Dashboard </span></a>
                        </a> 
                    </li>

                    <!-- Our Specialities -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">Our Specialities</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('/specialties') }}">All Specialities</a>
                            </li>
                            <li>
                                <a href="{{ url('/specialties/create') }}">Add Speciality</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Our Doctors -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Our Doctors</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('admin/doctors') }}">All Doctors</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/doctors/create') }}">Add Doctor</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Rare Cases -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Rare Cases</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('rare-cases') }}">All Rare Cases</a>
                            </li>
                            <li>
                                <a href="{{ url('rare-cases/create') }}">Add Rare Case</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Blog -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('blogs') }}">All Blogs</a>
                            </li>
                            <li>
                                <a href="{{ url('blogs/create') }}">Add Blog</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Community Events -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Community Events</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('community-events') }}">All Community Events</a>
                            </li>
                            <li>
                                <a href="{{ url('community-events/create') }}">Add Community Event</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Patient Testimonials -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Patient Testimonials</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('patient-testimonials') }}">All Patient Testimonials</a>
                            </li>
                            <li>
                                <a href="{{ url('patient-testimonials/create') }}">Add Patient Testimonial</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Video Testimonials -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text"> Video Testimonials</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('video-testimonials') }}">All Video Testimonials</a>
                            </li>
                            <li>
                                <a href="{{ url('video-testimonials/create') }}">Add Video Testimonial</a>
                            </li>
                        </ul>
                    </li>

                        <!-- FAQ -->
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text"> Faq</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ url('faqs') }}">All Faq</a>
                            </li>
                            <li>
                                <a href="{{ url('faqs/create') }}">Add FAQ</a>
                            </li>
                        </ul>
                    </li>

                    <!-- About -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">About</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.about.index')}}">All About</a>
                            </li>
                            <li>
                                <a href="{{route('admin.about.create')}}">Add About</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Vision Mission -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Vision-Mission</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.vision-mission.index')}}">All Vision-Mission</a>
                            </li>
                            <li>
                                <a href="{{route('admin.vision-mission.create')}}">Add Vision-Mission</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Milestones -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Milestone</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.milestones.index')}}">All Milestones</a>
                            </li>
                            <li>
                                <a href="{{route('admin.milestones.create')}}">Add Milestones</a>
                            </li>
                        </ul>
                    </li>

                        <!-- Facility -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Facility</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.facility.index')}}">All Facility</a>
                            </li>
                            <li>
                                <a href="{{route('admin.facility.create')}}">Add Facility</a>
                            </li>
                        </ul>
                    </li>
                            <!-- Package -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Package</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.package.index')}}">All Package</a>
                            </li>
                            <li>
                                <a href="{{route('admin.package.create')}}">Add Package</a>
                            </li>
                        </ul>
                    </li>

                        <!-- Country -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Country</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.countries.index')}}">All Country</a>
                            </li>
                            <li>
                                <a href="{{route('admin.countries.create')}}">Add Country</a>
                            </li>
                        </ul>
                    </li>

                        <!-- States -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">State</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.states.index')}}">All Sate</a>
                            </li>
                            <li>
                                <a href="{{route('admin.states.create')}}">Add Sate</a>
                            </li>
                        </ul>
                    </li>

                        <!-- City -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">City</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.cities.index')}}">All City</a>
                            </li>
                            <li>
                                <a href="{{route('admin.cities.create')}}">Add City</a>
                            </li>
                        </ul>
                    </li>

                        <!-- Time Slot -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Time Slot</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.time-slots.index')}}">All Time Slot</a>
                            </li>
                            <li>
                                <a href="{{route('admin.time-slots.create')}}">Add Time Slot</a>
                            </li>
                        </ul>
                    </li>

                        <!-- Book Appointments -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Appointment</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{route('admin.appointments.index')}}">All Appointments</a>
                            </li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="page-lock-screen.html">Lock Screen</a>
                    </li>
                </ul>
                </li>
                </ul>undefined
            </div>undefined
        </div>
        <div class="content-body">
            <!-- row -->
            {{-- Session Messages --}}
            @if (session('success'))
                <div class="alert text-white alert-dismissible fade show mt-3" role="alert" style="background-color:green;">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </div>
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © {{ date('Y') }}
                    Designed &amp; Developed by
                    <a href="https://digitalnawb.com" target="_blank">DigitalNawb.com</a>
                </p>
            </div>
        </div>
    </div>


    </div>
    <!--**********************************
            Scripts
        ***********************************-->
    <!-- Required vendors -->

    <!-- SweetAlert2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="{{asset('admin-assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/custom.min.js')}}"></script>

    <!-- Chart Morris plugin files -->
    <script src="{{asset('admin-assets/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/morris/morris.min.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{asset('admin-assets/vendor/peity/jquery.peity.min.js')}}"></script>

    <!-- Demo scripts -->
    <script src="{{asset('admin-assets/js/dashboard/dashboard-2.js')}}"></script>

    <!-- Svganimation scripts -->
    <script src="{{asset('admin-assets/vendor/svganimation/vivus.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/svganimation/svg.animation.js')}}"></script>
    <script src="{{asset('admin-assets/js/styleSwitcher.js')}}"></script>
    @yield('scripts')
</body>

</html>