@extends('layout.master')

@section('css')
    <style>
        .section-form {
            padding: 50px 0;
        }
        .section-package{
            padding: 50px 0;
        }
        .section-content{
            padding: 50px 0;
        }
        /* --- Commitment Section --- */
        .commit-image {
            max-height: 400px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }
        /* --- Program & Workshop Cards --- */
        .program-card, .workshop-card {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .program-card:hover, .workshop-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        /* Card Header */
        .course-header {
            background-color: #004d99;
            color: #fff;
            padding: 20px 30px;
            /* Adjust margin based on surrounding p-3/p-4 classes in HTML if present, or keep it simple */
            margin-bottom: 20px;
            position: relative;
        }
        .course-header h4 {
            color: #ffffff;
            margin-bottom: 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        /* POPULAR RIBBON STYLE */
        .ribbon {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            overflow: hidden;
            z-index: 10; /* Ensure ribbon is above other content */
        }
        .ribbon-content {
            position: absolute;
            top: 20px;
            right: -30px;
            width: 150px;
            padding: 5px 0;
            background-color: #28a745;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            font-size: 0.75rem;
            transform: rotate(45deg);
        }

        /* Program Specifics */
        .program-card {
            padding: 10px; /* Add internal padding for content */
        }
        .program-price {
            font-size:20px;
            font-weight: 800;
            color: #0097a7; /* Use primary blue for price */
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .price-details {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .program-list {
            list-style: none;
            padding-left: 0;
        }

        .program-list li {
            margin-bottom: 15px;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }

        .program-list li i {
            color: #00b3b3;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* --- Upcoming Training Table --- */
        .training-course-section {
            padding: 50px 0 0 0;
        }
        .training-table {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .training-table thead th {
            background-color: #004d99;
            color: #fff;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .training-table tbody tr:hover {
            background-color: #e6f7ff;
        }

        .training-table tbody td {
            vertical-align: middle;
            padding: 15px;
        }

        /* --- Registration Form Section --- */
        .contact-form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .form-label {
            font-weight: 500;
            color: #004d99;
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #00b3b3;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        /* --- Gallery Section --- */
        .training-gallery{
            padding: 50px 0;
            text-align: center;
        }

        .gallery-grid img {
            height: 250px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.3s ease;
            border-radius: 5px; /* Apply border radius to the images */
        }

        .workshop-card:hover img {
            transform: scale(1.03);
        }
    </style>
@endsection

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Medical Training & Workshops </h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Training</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-content" style="background-color: #ffffff;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <h2>Commitment to Clinical Excellence</h2>
                    <p>
                        At “SUNRISE” we truly believe that Laparoscopy cannot be learned by only watching others operate. Hence “True hands-on training” is conducted by our mentors Dr. Hafeez Rahman & Dr Nikita Trehan along with comprehensive theory knowledge imparted by them in a Systematic Fashion.
                    </p>
                    <p>
                        We have trained more than 1000 gynecologists at Sunrise Hospital Delhi from India and also our international colleagues.
                    </p>
                    <p>
                        Our in-house library with the latest journals (videos &amp; books available) and pelvi trainers give the doctors enough opportunity to upgrade their knowledge in their free time.
                    </p>
                </div>
                <div class="col-lg-5 text-center">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                         alt="Medical Professionals in Training"
                         class="img-fluid  commit-image">
                </div>
            </div>
        </div>
    </section>

    <section class="training-course-section" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                <h2 class="text-center mb-3">Upcoming Training Programs</h2>
                <div class="table-responsive training-table p-0">
                    <table class="table table-hover mb-0 bg-white">
                        <thead class="table-primary">
                        <tr>
                            <th>S. NO</th>
                            <th>TRAINING COURSE</th>
                            <th>DURATION</th>
                            <th>SCHEDULE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>TLH Hands-on Training course</td>
                            <td>4 Days</td>
                            <td>11th Nov 2024 to 14th Nov 2024</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Fellowship in Advanced Gynae Laparoscopy</td>
                            <td>6 months</td>
                            <td>Slot Available</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Critical Care Nursing Certification</td>
                            <td>2 Weeks</td>
                            <td>5th - 16th June 2026</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section-package">
        <div class="container">
            <h2 class="text-center mb-3">Specialized Courses & Fellowships</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="program-card">
                        <div class="course-header">
                            <h4>TLH Training Program</h4>
                            <div class="ribbon"><div class="ribbon-content">POPULAR</div></div>
                        </div>
                        <p class="program-price">₹150000</p>
                        <ul class="program-list">
                            <li><i class="fas fa-check-circle"></i> 4 Days Hands On Training</li>
                        </ul>
                        <p class="price-details">+ 18% GST Extra</p>
                        <a href="#registration-form" class="btn btn-primary w-100 mt-3">Pay Now</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card">
                        <div class="course-header">
                            <h4>Fellowship in Advance Gynae Laparoscopy</h4>
                            <div class="ribbon"><div class="ribbon-content">POPULAR</div></div>
                        </div>
                        <p class="program-price">Training Fees On Demand</p>
                        <ul class="program-list">
                            <li><i class="fas fa-check-circle"></i> 6 Months Fellowship Programme</li>
                            <li><i class="fas fa-check-circle"></i> Comprehensive Clinical & Surgical Exposure</li>
                        </ul>
                        <a href="#registration-form" class="btn btn-primary w-100 mt-4">Enquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-form bg-white" id="registration-form">
        <div class="container">
            <h2 class="text-center mb-4">Register for a Program or Workshop</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-form-section">
                        <p class="lead text-center mb-4">Fill out the form below to receive detailed course information, fees, and registration links.</p>
                        {{-- START: FORM WITH @CSRF TOKEN --}}
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf {{-- THIS IS THE CSRF TOKEN INPUT FIELD --}}
                            <div class="row g-3">
                                {{-- ROW 1: Name and Email --}}
                                <div class="col-md-4">
                                    <label class="form-label">Name *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Your Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">E-mail Address *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                </div>

                                {{-- ROW 2: Mobile and How did you come to Know about us? --}}
                                <div class="col-md-4">
                                    <label class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        <input type="tel" class="form-control" placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">How did you come to Know about us? *</label>
                                    <select class="form-select" required>
                                        <option value="" disabled selected>Select Source</option>
                                        <option>Google</option>
                                        <option>Social Media</option>
                                        <option>Referral (specify in message)</option>
                                        <option>Conference/Event</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                {{-- ROW 3: Training Program and Attach Doc --}}
                                <div class="col-md-4">
                                    <label class="form-label">Training Program *</label>
                                    <select class="form-select" required>
                                        <option value="" disabled selected>Select a Program or Fellowship</option>
                                        <option>TLH Hands on Training course (4 Days)</option>
                                        <option>Fellowship in Advance Gynae Laparoscopy (6 months)</option>
                                        <option>Reproductive Medicine (IVF & IUI) (6 months)</option>
                                        <option>Critical Care Nursing Certification (2 weeks)</option>
                                        <option>General Enquiry / Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Attach Doc *</label>
                                    <input type="file" class="form-control" name="document" required>
                                </div>

                                {{-- ROW 4: Location --}}
                                <div class="col-12">
                                    <label class="form-label">Location</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Select Training Location (if applicable)</option>
                                        <option>Sunrise Hospital Kalindi Colony</option>
                                        <option>Other Location/Online</option>
                                    </select>
                                </div>

                                {{-- ROW 5: Message --}}
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="3" placeholder="Briefly describe your training goals."></textarea>
                                </div>

                                {{-- ROW 6: Captcha and Submit - Adjusted column structure for submit button --}}
                                <div class="col-md-8">
                                    <label class="form-label">Please type the characters *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <span class="ms-2 fst-italic text-muted fw-bold">o X p 5 5</span>
                                    </div>
                                </div>
                                {{-- Submit button on its own line in a new row or correctly aligned in the current row --}}
                                <div class="col-md-12 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100 py-2">
                                        <i class="fas fa-paper-plane me-2"></i>SEND
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- END: FORM WITH @CSRF TOKEN --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $path = "assets/images/training";
        $galleryFiles = [];
         if (File::exists($path) && File::isDirectory($path)) {
             $allFiles = File::files($path);
               $galleryFiles = array_filter($allFiles, function ($file) {
                   $extension = strtolower($file->getExtension());
                   return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
               });
         }
    @endphp

    <section class="training-gallery">
        <div class="container">
            <h2>Workshops & Seminars Gallery</h2>
            <p>A look back at successful training sessions and certification ceremonies.</p>
            <div class="gallery-grid mt-3">
                <div class="row g-3">
                    @forelse($galleryFiles as $gallery)
                        <div class="col-md-3">
                            <div class="workshop-card text-center">
                                <img
                                        src="{{ asset($path . '/' . $gallery->getFilename()) }}"
                                        class="img-fluid rounded"
                                        alt="Workshop or Seminar Image"
                                        loading="lazy">
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-warning">No workshop images found in the '{{ $path }}' directory.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        // Initialize carousel on page load
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialCarousel = document.getElementById('testimonialIndicators');
            if (testimonialCarousel) {
                // Initialize Bootstrap Carousel
                new bootstrap.Carousel(testimonialCarousel, {
                    interval: 5000, // Change slide every 5 seconds
                    wrap: true
                });
            }
        });
    </script>
@endsection