@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/specialties.css') }}" />
@endsection
@section('content')
    
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5 class="mb-3">Pediatricians</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Specialties</a></li>
                            <li class="breadcrumb-item"><a href="#">Pediatricians</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Left Column - Content -->
                <div class="col-lg-8">
                    <!-- Main Image -->
                    <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Pediatrician"
                         class="content-image">

                    <!-- Content -->
                    <p>At Sunrise Hospital, we offer comprehensive pediatric care provided by the best pediatricians in Delhi. Our expert team is dedicated to ensuring your child receives the highest quality medical treatment, from routine checkups to specialized care for various conditions.</p>

                    <p>At Sunrise Hospital, we pride ourselves on offering top-notch medical care for children and newborns. Our pediatric department is equipped with cutting-edge technology and staffed by highly experienced specialists who focus on the unique healthcare needs of infants, children, and adolescents.</p>

                    <p>We provide a holistic approach to treating children, ensuring their physical, emotional, and developmental health. Recognized for having the best pediatricians in Delhi, we are dedicated to creating a nurturing and supportive environment where children receive the best medical attention possible.</p>

                    <p>Sunrise Hospital is equipped with advanced facilities to deliver comprehensive care for young patients. From routine check-ups to managing complex medical conditions, our team ensures that children and newborns receive the highest standard of medical care.</p>

                    <h2>Expert Care for Infants, Children, and Adolescents</h2>
                    <p>Our pediatric department specializes in:</p>
                    <ul>
                        <li> Routine check-ups and health screenings</li>
                        <li> Diagnosis and management of acute and chronic illnesses</li>
                        <li> Preventive care and early detection of potential health issues</li>
                        <li> Immunizations to protect against various diseases</li>
                    </ul>
                    <p>We focus on personalized care plans tailored to each child’s unique needs, ensuring optimal health outcomes.</p>

                    <!-- <h3 class="content-heading">Comprehensive Preconception Care</h3> -->
                    <p>Our team provides expert care for newborns, including premature babies and those with complex medical conditions. In collaboration with neonatal specialists, we address:</p>
                    <ul>
                        <li> Congenital disorders</li>
                        <li> Respiratory distress in newborns</li>
                        <li> Intensive care for preterm infants</li>
                        <li> Nutritional and developmental support</li>
                    </ul>

                    <!-- <h3 class="content-heading">High-Risk Pregnancy Management</h3> -->
                    <p>At Sunrise Hospital, we emphasize the early detection and prevention of childhood illnesses. Our pediatricians conduct:</p>
                    <ul>
                        <li> Regular health evaluations</li>
                        <li> Developmental screenings</li>
                        <li> Nutritional assessments</li>
                    </ul>
                    <p>This proactive approach helps us identify potential health concerns early, enabling timely intervention and better health outcomes.</p>


                    <p>We understand the importance of making children feel at ease during their medical visits. Sunrise Hospital creates a child-friendly atmosphere to ensure young patients are comfortable. Our pediatricians build trust with children and families, fostering a positive healthcare experience.</p>

                    <!-- <h3 class="content-heading">Advanced Surgical Excellence</h3> -->
                    <p>We believe that empowering parents with the right knowledge is essential for a child’s overall well-being. Our pediatricians provide guidance on:</p>
                    <ul>
                        <li> Nutrition and dietary recommendations</li>
                        <li> Growth and developmental milestones</li>
                        <li> Immunization schedules</li>
                        <li> Safety measures for children</li>
                    </ul>
                    <p>This education ensures parents are equipped to make informed decisions about their child’s health.</p>

                    <!-- <h3 class="content-heading">Personalized Treatment Approach</h3> -->
                    <p>Our hospital uses the latest medical advancements to deliver precise and effective pediatric care. With the best pediatricians in Delhi, Sunrise Hospital is a trusted destination for families seeking expert care for their children.</p>

                    <p>We believe that informed parents are empowered parents. As part of our commitment to comprehensive care, our pediatricians provide extensive health education for parents and caregivers. From nutrition to immunizations and growth and development, we ensure that parents are well-informed to make the best decisions for their child’s health. Additionally, our team offers counseling on safety measures and preventative health practices, providing holistic guidance for families.</p>

                    <!-- <h3 class="content-heading">Comprehensive Gynecological Services</h3> -->
                    <p>At Sunrise Hospital, our best pediatricians in Delhi recognize the importance of supporting families in navigating the complexities of child-rearing. By offering detailed advice and consultations, we equip parents with the information they need to create a healthy, safe environment for their children.</p>
                   
                        <img src="{{asset('assets/images/facility/facility6.jpg')}}"
                         alt="Obstetrics and Gynecology - Medical Care"
                         class="content-image">
                   
                    <ul>
                        <li><strong>Routine Check-ups : </strong> Our pediatricians offer regular health screenings to ensure early detection of any health issues.</li>
                        <li><strong>Acute and Chronic Illness Treatment : </strong> We manage a wide range of illnesses, from the common cold to chronic conditions like asthma and diabetes.</li>
                        <li><strong>Immunizations :</strong> We follow a comprehensive vaccination schedule to protect children from preventable diseases.</li>
                        <li><strong>Nutrition and Developmental Counseling :</strong> Our pediatricians provide expert guidance on proper nutrition and developmental milestones.</li>
                        <li><strong>Neonatal Care : </strong> We offer specialized care for newborns, including preterm babies and those with complex health conditions.</li>
                    </ul>

                    <h2><b>Q: Who are the best pediatricians in Delhi? </b></h2>
                    <p><b>A: </b> Sunrise Hospital is home to some of the top pediatricians in Delhi, offering expert care for children of all ages.</p>

                    <h2><b>Q: What services does your pediatric department provide? </b></h2>
                    <p><b>A: </b> We offer a wide range of services, including preventive care, immunizations, treatment for acute and chronic illnesses, and specialized newborn care.</p>

                    <h2><b>Q: How do you ensure a child-friendly environment? </b></h2>
                    <p><b>A:</b> Our pediatric department is designed to make children feel comfortable and at ease. We focus on creating a nurturing and supportive atmosphere for young patients.</p>

                    <p>Sunrise Hospital is dedicated to providing exceptional pediatric care with a focus on the overall well-being of children and newborns. With state-of-the-art facilities and the best pediatricians in Delhi, we offer comprehensive management for a wide range of pediatric conditions. From preventive care to specialized treatments, we are committed to ensuring optimal health outcomes for every child under our care.</p>

                </div>

                <!-- Right Column - Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-sidebar p-4 rounded bg-white">
                        <h4 class="mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>Book Appointment
                        </h4>
                        <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                             <input type="hidden" name="source" value="specialties_pediatrician-page">
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter your full name" name="name">
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12">
                                    <input type="tel" class="form-control" placeholder="Enter your phone number" name ="phone">
                                </div>

                                <!-- Appointment Date -->
                                <div class="col-12">
                                    <input type="date" class="form-control" placeholder="Appointment Date" name="appointment_date">
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
                                    <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                                </div>

                                <!--Recaptcha -->
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