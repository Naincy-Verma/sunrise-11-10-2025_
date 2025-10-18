@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
    <style>
        :root {
            --color-blood: #dc3545;     /* Red for Hematology */
            --color-lipid: #ffc107;     /* Yellow/Orange for Metabolic */
            --color-liver: #28a745;     /* Green for Liver */
            --color-kidney: #17a2b8;    /* Cyan for Kidney */
            --color-other: #6f42c1;     /* Purple for Screening */
            --color-exam: #007bff;      /* Primary Blue for Clinical */
        }

        /* --- Card Styling for Categories (Core of the test list) --- */
        .category-card {
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #fff;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-3px); /* Slightly less aggressive hover */
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
        }

        .card-header-accent {
            padding: 0.75rem 1.5rem;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .list-group-item {
            border: none;
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            color: #495057;
            border-bottom: 1px dashed #f1f1f1;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }

        /* --- Category Specific Styles --- */
        .icon-blood { color: var(--color-blood); }
        .header-blood { background-color: var(--color-blood); }
        .icon-lipid { color: var(--color-lipid); }
        .header-lipid { background-color: var(--color-lipid); }
        .icon-liver { color: var(--color-liver); }
        .header-liver { background-color: var(--color-liver); }
        .icon-kidney { color: var(--color-kidney); }
        .header-kidney { background-color: var(--color-kidney); }
        .icon-other { color: var(--color-other); }
        .header-other { background-color: var(--color-other); }
        .icon-exam { color: var(--color-exam); }
        .header-exam { background-color: var(--color-exam); }
    </style>
@endsection
@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Sunrise Executive Health Checkup</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Health Panel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="health-package-section">
        <div class="container py-5">
            <div class="row g-4">
                {{-- Left Content Area for Tests (8 columns on large screens) --}}
                <div class="col-lg-8">
                    <div class="row g-4">
                        {{-- 1. COMPLETE HEMOGRAM & FBS --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-blood">
                                    <i class="bi bi-droplet-fill me-2"></i> HEMATOLOGY & GLUCOSE
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> **Hemoglobin** & PCV</li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> RBC Count, RDW</li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> TLC, DLC, ESR</li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> MCV, MCH, MCHC</li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> Platelet Count</li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill icon-blood"></i> **FBS (Fasting Blood Sugar)**</li>
                                </ul>
                            </div>
                        </div>

                        {{-- 2. LIPID PROFILE & THYROID --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-lipid">
                                    <i class="bi bi-heart-pulse-fill me-2"></i> METABOLIC & HORMONAL
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-check-circle-fill icon-lipid"></i> Total Cholesterol</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle-fill icon-lipid"></i> HDL (Good Cholesterol)</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle-fill icon-lipid"></i> LDL (Bad Cholesterol)</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle-fill icon-lipid"></i> VLDL</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle-fill icon-lipid"></i> **THYROID PROFILE** (TSH, T3, T4)</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                </ul>
                            </div>
                        </div>

                        {{-- 3. LIVER FUNCTION PROFILE --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-liver">
                                    <i class="bi bi-person-badge-fill me-2"></i> LIVER FUNCTION PROFILE (LFP)
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-arrow-right-short icon-liver"></i> SGOT, SGPT, GG/GGTP</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-short icon-liver"></i> Alkaline Phosphatase</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-short icon-liver"></i> Billirubin (Total, Direct, Indirect)</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-short icon-liver"></i> Protein Total</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-short icon-liver"></i> Albulin, Globulin, A-G ratio</li>
                                </ul>
                            </div>
                        </div>

                        {{-- 4. KIDNEY FUNCTION PROFILE --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-kidney">
                                    <i class="bi bi-water me-2"></i> KIDNEY FUNCTION PROFILE (KFP)
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-journal-medical icon-kidney"></i> Uric Acid, Urea</li>
                                    <li class="list-group-item"><i class="bi bi-journal-medical icon-kidney"></i> Creatinine</li>
                                    <li class="list-group-item"><i class="bi bi-journal-medical icon-kidney"></i> Sodium, Potassium</li>
                                    <li class="list-group-item"><i class="bi bi-journal-medical icon-kidney"></i> Chloride</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                </ul>
                            </div>
                        </div>

                        {{-- 5. SCREENING & IMAGING --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-other">
                                    <i class="bi bi-shield-fill me-2"></i> INFECTIOUS & IMAGING
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-virus icon-other"></i> **HIV 1&2** Screening</li>
                                    <li class="list-group-item"><i class="bi bi-virus icon-other"></i> **HBsAg** (Hepatitis B)</li>
                                    <li class="list-group-item"><i class="bi bi-x-ray icon-other"></i> **CHEST X-RAY (DIGITAL)**</li>
                                    <li class="list-group-item"><i class="bi bi-activity icon-other"></i> **ECG** (Electrocardiogram)</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                </ul>
                            </div>
                        </div>

                        {{-- 6. CLINICAL EXAMINATIONS --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="category-card">
                                <div class="card-header-accent header-exam">
                                    <i class="bi bi-clipboard2-check-fill me-2"></i> CLINICAL EXAMINATIONS
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-person-vcard icon-exam"></i> **PHYSICAL EXAMINATION**</li>
                                    <li class="list-group-item"><i class="bi bi-gender-female icon-exam"></i> **GYNAECOLOGICAL EXAMINATION**</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                    <li class="list-group-item invisible">**&nbsp;**</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Sidebar Area for Appointment Form (4 columns on large screens) --}}
                <div class="col-lg-4">
                    <div class="form-sidebar p-4">
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
    </section>

@endsection

@section('js')
    {{-- Assuming you are loading necessary Bootstrap and FontAwesome scripts in layout.master --}}
    <script>
        function generateCaptcha() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let captcha = '';
            for (let i = 0; i < 5; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById('captcha').textContent = captcha;
            document.getElementById('captcha-input').value = '';
        }

        // Generate initial captcha on page load
        document.addEventListener('DOMContentLoaded', generateCaptcha);
    </script>
@endsection