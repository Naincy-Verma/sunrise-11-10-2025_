@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5 class="mb-3"> Infertility and IVF Treatment</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Specialties</a></li>
                            <li class="breadcrumb-item"><a href="#">Infertility and IVF Treatment</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Main Content Section -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Left Column - Content -->
                <div class="col-lg-8">
                    <!-- Main Image -->
                    
                        <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Obstetrics and Gynecology - Medical Care"
                         class="content-image">

                    <!-- Content -->
                    <p>Infertility is a condition where a couple is unable to conceive after one year of regular unprotected intercourse under the age of 35, or after six months for women over the age of 35. It is a common issue affecting about 25% of women aged 15 to 44 years. At Sunrise Hospital, we offer expert Infertility Treatment in Delhi, utilizing the latest techniques to provide the best chances of success in conceiving. We take pride in offering IVF Treatment in Delhi with a high success rate, helping couples achieve their dream of parenthood.</p>

                    <p>Infertility occurs when there are problems in the process of conception. This includes issues with the release of eggs, the passage of eggs through the Fallopian tubes, sperm quality, or implantation in the uterus. Infertility can be caused by problems in either the male (30%) or female (30%) reproductive systems, or a combination of both, with around 40% of cases being unexplained.</p>

                    <p>Infertility in men is often caused by issues with sperm production or delivery, including:</p>
                    <ul>
                        <li><b>Varicocele : </b> Enlarged veins in the testicles that cause excessive heat, affecting sperm production.</li>
                        <li><b>Low sperm count (Oligozoospermia)</b> poor sperm motility (Asthenozoospermia), or abnormal sperm shape (Teratozoospermia).</li>
                        <li><b>Injuries or blockages</b> in the reproductive system.</li>
                        <li><b>Azoospermia: </b> Complete absence of sperm.</li>
                        <li><b>Genetic factors </b> or health issues such as mumps, kidney disease, or hormonal imbalances.</li>
                        <li><b>Lifestyle factors:</b> Alcohol, drugs, smoking, and environmental toxins.</li>
                    </ul>
                    <p>At <a href="/">Sunrise Hospital</a>, we provide personalized Infertility Treatment in Delhi, offering specialized care to address male infertility and improve the chances of conception.</p>

                    <p>Infertility in women can be caused by a variety of factors, including:</p>
                    
                        <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Obstetrics and Gynecology - Medical Care"
                         class="content-image">
                    <ul>
                        <li><b>Blocked Fallopian tubes </b> due to conditions like pelvic inflammatory disease, endometriosis, or previous ectopic pregnancy surgeries.</li>
                        <li><b>Uterine issues</b> such as fibroids, polyps, or adenomyosis.</li>
                        <li><b>Endometriosis: </b> A condition where tissue grows outside the uterus.</li>
                        <li><b>Hormonal imbalances </b>  in the thyroid or adrenal glands, or conditions like diabetes.</li>
                        <li><b>Tuberculosis (TB)</b> affecting the reproductive system.</li>
                    </ul>

                    <p>At Sunrise Hospital, we offer comprehensive IVF Treatment in Delhi and other fertility solutions to address female infertility.</p>

                    <!-- <h3 class="content-heading">Comprehensive Preconception Care</h3> -->
                    <p>At Sunrise Hospital, we provide state-of-the-art Infertility Treatment in Delhi, ensuring tailored care for each patient. Our treatment options include:</p>

                    <!-- <h3 class="content-heading">High-Risk Pregnancy Management</h3> -->
                    <p>IUI is a simple and effective fertility treatment where sperm is directly inserted into the uterus to facilitate conception. It is often recommended for couples with mild male infertility or unexplained infertility.</p>

                    <p>IVF Treatment in Delhi is one of the most successful methods for overcoming infertility. It involves stimulating the ovaries to produce eggs, retrieving the eggs, fertilizing them in a laboratory, and transferring the embryos into the uterus.</p>

                    <!-- <h3 class="content-heading">Advanced Surgical Excellence</h3> -->
                    <p>ICSI is an advanced IVF technique used when male infertility is the main cause. In ICSI, a single sperm is injected directly into an egg to increase the chances of fertilization.</p>

                    <!-- <h3 class="content-heading">Personalized Treatment Approach</h3> -->
                    <p>This advanced IVF technique involves transferring embryos that have developed to the blastocyst stage, allowing for a higher chance of pregnancy.</p>

                    <p>For couples who are unable to use their own eggs or sperm, Sunrise Hospital offers donor gametes. We provide egg and sperm donation services as part of our fertility treatments, ensuring the best chance for a successful pregnancy.</p>

                    <!-- <h3 class="content-heading">Comprehensive Gynecological Services</h3> -->
                    <p>Egg freezing is an option for women who wish to preserve their fertility for future use, especially if they are not ready to have children immediately but want to maintain their reproductive health.</p>
                    <ul>
                        <li><b>State-of-the-art Facilities:</b> We use the latest technology and advanced procedures to ensure the highest success rates in fertility treatments.</li>
                        <li><b>Experienced Doctors:</b> Our team of specialists are among the best in Delhi, offering personalized care and treatment plans tailored to your specific needs.</li>
                        <li><b>High Success Rates: </b> We take pride in our outstanding track record, with 500+ successful deliveries from the first IVF attempt.</li>
                        <li><b>Affordable Care: </b> We believe in providing transparent pricing with affordable options for IVF treatment in Delhi, making fertility treatments accessible to all couples.</li>
                    </ul>

                    <p>If you are struggling with infertility, don’t wait any longer. Meet our IVF experts today at Sunrise Hospital, the best hospital for infertility treatment in Delhi. Book an online appointment now and take the first step towards building your family.</p>


                </div>

                <!-- Right Column - Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-sidebar p-4 rounded bg-white">
                        <h4 class="mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                        </h4>
                        <form  action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter your full name">
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12">
                                    <input type="tel" class="form-control" placeholder="Enter your phone number">
                                </div>

                                <!-- Appointment Date -->
                                <div class="col-12">
                                    <input type="date" class="form-control" placeholder="Appointment Date">
                                </div>

                                <!-- Specialist -->
                                <div class="col-12">
                                    <select class="form-select">
                                        <option>Select Speciality</option>
                                        @foreach($specialties_form as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Enter your email address">
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <div class="captcha-box">
                                        <div class="captcha-text" id="captcha">AB12C</div>
                                        <input type="text" class="captcha-input" placeholder="Enter Captcha" id="captcha-input" required>
                                        <button type="button" class="captcha-refresh" onclick="generateCaptcha()">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Submit
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
    <script>
        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your appointment request! Our team will contact you within 24 hours.');
        });
    </script>
@endsection