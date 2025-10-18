@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
    {{-- Custom styles for enhanced design --}}
    <style>
        .content-box {
            padding: 2rem;
            border-radius: 5px; /* Smoother corners */
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25); /* Soft, noticeable shadow */
            margin-bottom: 2rem;
            background-color: #fff;
        }

        /* Styling for the list items (Rights and Responsibilities) */
        .list-item {
            padding: 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            height: 100%; /* Important for equal height in row */
            border: 1px solid #e0e0e0;
        }

        .list-item:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .list-item p {
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* Color accents for the lists */
        .text-success {
            color: #198754 !important; /* Standard Bootstrap green */
        }
        .text-danger {
            color: #dc3545 !important; /* Standard Bootstrap red */
        }
    </style>
@endsection
@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-3">Understanding Your Rights and Responsibilities in Healthcare</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Patient Education</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row g-4"> {{-- Added g-4 for gap between columns --}}
            <div class="col-lg-8">
                {{-- Patient Rights Section --}}
                <div class="content-box"> {{-- Added content-box class --}}
                    <div class="d-flex align-items-center">
                        <h2>Your Rights as a Patient</h2>
                    </div>

                    <div class="row g-3">
                        @foreach([
                            'informed of your rights and review the policies regarding them.',
                            'express complaints and satisfaction regarding services rendered and to comment and make suggestions for improvement of the quality of care and services.',
                            'file a complaint and to receive a response in a timely manner without fear of discrimination or reprisal.',
                            'receive considerate and respectful care in a safe and secure environment with respect and regard for privacy, individuality, personal beliefs and cultural traditions.',
                            'access services and timely referrals to staff and services consistent with quality professional practice.',
                            'refuse treatment and be fully informed of possible consequences of such refusal, without reprisal.',
                            'participate in decisions affecting care and treatment according to their desires, needs, and understanding including the choice to have family and friends participate in the process.',
                            'receive information regarding their illness, the course of treatment, and the prospects for good health in terms that they can understand.',
                            'approve and refuse the release of their medical records. Patient have the right to access their medical record. Patient have the right to privacy and confidentiality of their records are to be maintained in a safe and secure environment.',
                            'know the professional status of the person(s) treating them and those giving medical advice after hours.',
                            'know, in advance of services, the cost of services and any applicable payment policy.',
                            'receive timely and qualified care in a setting appropriate to health care needs.',
                            'appoint a legal representative to make decisions regarding their health care.',
                            'refuse to participate in research/experimental activities without reprisal.',
                            'change their Primary Care or Dental providers if other qualified practitioners are available.'
                        ] as $right)
                            <div class="col-md-6 col-12">
                                <div class="list-item">
                                    <p class="text-dark"><i class="bi bi-check-circle-fill text-success me-2"></i> Patient has the right to **{{ $right }}**</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Patient Responsibilities Section --}}
                <div class="content-box"> {{-- Added content-box class --}}
                    <div class="d-flex align-items-center">
                        <h2>Your Responsibilities as a Patient</h2>
                    </div>

                    <div class="row g-3">
                        @foreach([
                            'actively participate in decisions regarding their health care to the degree that you choose and to reasonably follow your provider\'s health care instructions.',
                            'inform their healthcare provider of information related to past illness, treatment, and medications.',
                            'respect the rights and property of healthcare professionals, employees, and other patients.',
                            'make and promptly keep all scheduled appointments. To assure that all patients are served in a timely manner, patients are responsible for calling and changing appointments 24 hours in advance.',
                            'pay for services at the time service is provided and to provide the patient registration office with accurate, complete, and current information pertaining to insurance coverage, home address, telephone number, social security number, and Native American Indian verification.',
                            'discuss their health care problems, concerns, and personal needs with their provider in an honest manner and to inform the health care provider of any changes occurring in their health.',
                            'ask questions when in need of further information or a better understanding.',
                            'cooperate with various providers involved in their care and to conduct themselves in a polite and reasonable manner.',
                            'inform provider if they cannot or will not follow a certain treatment plan.',
                            'respect the rights of their health care provider and to exchange information in a non-abusive manner either physically or verbally while receiving care.',
                            'advise their provider of all changes in decisions concerning advance directives and/or persons designated by them to make health care decisions.'
                        ] as $responsibility)
                            <div class="col-md-6 col-12">
                                <div class="list-item">
                                    <p class="text-dark"><i class="bi bi-x-diamond-fill text-danger me-2"></i> Patient has the responsibility to **{{ $responsibility }}**</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                {{-- Appointment Form Sidebar --}}
                <div class="form-sidebar p-4"> {{-- Removed bg-white, kept rounded, added form-sidebar class --}}
                    <h4 class="mb-4 text-primary">
                        <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                    </h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Enter your full name">
                            </div>

                            <div class="col-12">
                                <input type="tel" class="form-control" placeholder="Enter your phone number">
                            </div>

                            <div class="col-12">
                                <input type="date" class="form-control" placeholder="Appointment Date">
                            </div>

                            <div class="col-12">
                                <select class="form-select">
                                    <option selected disabled>Select Speciality</option>
                                    <option value="Gynae Laparoscopic Surgeries"> Gynae Laparoscopic Surgeries</option>
                                    <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
                                    <option value="Pediatricians">Pediatricians</option>
                                    <option value="ENT">ENT</option>
                                    <option value="General Surgery">General Surgery</option>
                                    <option value="Orthopedics">Orthopedics</option>
                                    <option value="Reconstructive URO Surgery">Reconstructive URO Surgery</option>
                                    <option value="Critical Cases & ICU">Critical Cases & ICU</option>
                                    <option value="Bariatric Surgery">Bariatric Surgery</option>
                                    <option value="Internal Medicine">Internal Medicine</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                            </div>

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
                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Appointment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection