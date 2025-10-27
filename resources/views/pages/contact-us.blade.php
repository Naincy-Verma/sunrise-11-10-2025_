@extends('layout.master')
@section('css')
    <style>
        :root {
            --primary-blue: rgb(22, 156, 201);
            --dark-blue-bg: rgb(10, 40, 70); /* Darker, stronger background */
            --light-bg: rgb(240, 246, 250);
            --accent-orange: rgb(245, 176, 61);
            --dark-text: #2c3e50;
            --light-text: #ffffff;
            --subtle-text: #d0d0d0;
        }

        /* Appointment Section (Dark Background) */
        .floating-appointment-section {
            background-color: var(--dark-blue-bg);
            padding: 80px 0;
            position: relative;
        }

        .floating-appointment-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{asset("assets/images/doctors.jpeg")}}') center/cover;
            opacity: 0.1;
            z-index: 0;
        }

        .section-heading-floating {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
            z-index: 2;
        }

        .section-heading-floating h2 {
            color: var(--light-text);
            font-weight: 600;
            font-size:20px;
            margin-bottom: 10px;
        }

        .section-heading-floating p {
            color: var(--subtle-text);
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Floating Form Card */
        .floating-form-card {
            background: white;
            border-radius: 5px;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 1px 4px 0px;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 10; /* Ensure it floats above the background */
            transform: translateY(20px); /* Lift the card a bit */
        }

        .floating-form-card h4 {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 30px;
        }

        /* Input Styles (Minimalistic) */
        .form-group-floating {
            margin-bottom: 25px;
            position: relative;
        }

        .minimal-input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: var(--light-bg);
            color: var(--dark-text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .minimal-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            background: white;
            box-shadow: 0 0 0 3px rgba(22, 156, 201, 0.15);
        }

        .minimal-input::placeholder {
            color: #999;
        }

        .minimal-select {
            appearance: none; /* Remove default arrow */
        }

        textarea.minimal-input {
            height: 100px;
            resize: vertical;
        }

        /* Submit Button */
        .btn-submit-floating {
            width: 100%;
            padding: 10px;
            background: linear-gradient(90deg, rgb(0 54 104 / 62%), rgb(0 144 162));
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-submit-floating:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(22, 156, 201, 0.4);
        }

        /* Detailed Contact Footer Section */
        .detailed-contact-footer {
            background-color: var(--light-bg);
            padding: 100px 0 60px 0; /* Padding for separation */
        }

        .contact-detail-box {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            border: 1px solid #e0e0e0;
            height: 100%;
            transition: all 0.3s ease;
        }

        .contact-detail-box:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-color: var(--primary-blue);
        }

        .contact-detail-box .icon-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--light-bg);
            border: 2px dashed var(--accent-orange);
            color: var(--dark-blue-bg);
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .contact-detail-box h5 {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .contact-detail-box p {
            color: var(--dark-text);
            font-size: 1rem;
            margin: 0;
            line-height: 1.6;
        }

        /* Map Section */
        .map-section-floating {
            padding: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .floating-form-card {
                padding: 30px;
            }
            .floating-appointment-section {
                padding: 60px 0 40px 0;
            }
            .section-heading-floating h2 {
                font-size: 25px;
            }
            .detailed-contact-footer {
                padding-top: 60px;
            }
        }
    </style>
@endsection
@section('content')
    <section class="floating-appointment-section">
        <div class="container">
            <div class="section-heading-floating">
                <h2>Secure Your Appointment</h2>
                <p>Use the form below to book your consultation. Our team will confirm your slot within 24 hours.</p>
            </div>

            <div class="floating-form-card">
                <h4>Appointment Request Form</h4>
                <form class="appointment-form" action="{{ route('appointments.store') }}" method="POST">
                     @csrf
                        <input type="hidden" name="source" value="contact-us-page">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name*" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <input type="tel" class="form-control" name="phone"  placeholder="Phone Number*" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g,'');" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <input type="email" class="form-control" name="email"  placeholder="Email Address*" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <select class="form-control minimal-select" required>
                                        <option selected disabled>Select Hospital Branch</option>
                                        <option>Sunrise Hospital Kalindi Colony</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <input type="date" class="form-control" title="Preferred Date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-floating">
                                    <select class="form-select" name="speciality" required>
                                        <option value="">Select Service (e.g., Gynaecology)</option>
                                        @foreach($specialties_form as $speciality)
                                            <option value="{{ $speciality->id }}">{{ $speciality->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group-floating">
                                    <textarea class="form-control" name="message" placeholder="Describe your request or concern (optional)"></textarea>
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn-submit-floating btn-sm">
                                    Submit
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>

    <section class="detailed-contact-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="contact-detail-box">
                        <div class="icon-wrap">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <h5>Visit Us</h5>
                        <p>F-1, Kalindi Colony New Delhi-110065</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-detail-box">
                        <div class="icon-wrap">
                            <i class="fa fa-phone"></i>
                        </div>
                        <h5>Give Us A Call</h5>
                        <p>General Enquiry: +91-9800001900</p>
                        <p>Emergency: +91-9800001901</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-detail-box">
                        <div class="icon-wrap">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h5>Email Support</h5>
                        <p>General: helpdesk@sunrisehospitals.in</p>
                        <p>Billing: accounts@sunrisehospitals.in</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section-floating">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d405851.96360444854!2d77.265935!3d28.577030000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce39f2985e0bb%3A0x3a89d01ce7f403b6!2sSunrise%20Hospital!5e1!3m2!1sen!2sus!4v1757934745090!5m2!1sen!2sus"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection