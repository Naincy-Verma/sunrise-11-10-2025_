@extends('layout.master')

@section('css')
    <style>
        .thank-you-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8f0fe 100%);
        }

        .thank-you-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .success-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon svg {
            width: 45px;
            height: 45px;
            stroke: #10b981;
            stroke-width: 3;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.1) rotate(10deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .success-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
        }

        .card-body-content {
            padding: 40px;
        }

        .info-alert {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .info-alert h5 {
            color: #1e40af;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .info-alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .info-alert ul li {
            color: #374151;
            padding: 6px 0;
            line-height: 1.6;
        }

        .info-alert ul li::marker {
            color: #10b981;
            font-size: 1.2em;
        }

        .important-note {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .important-note strong {
            color: #92400e;
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-custom-secondary {
            background: white;
            border: 2px solid #3b82f6;
            color: #3b82f6;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-custom-secondary:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .contact-section {
            background: #f9fafb;
            padding: 30px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .contact-section h5 {
            color: #1e40af;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 1.05rem;
        }

        .contact-item .icon {
            width: 40px;
            height: 40px;
            background: #3b82f6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .success-header h1 {
                font-size: 1.8rem;
            }

            .card-body-content {
                padding: 30px 20px;
            }

            .btn-custom-primary,
            .btn-custom-secondary {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
@endsection

@section('content')
<section class="thank-you-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
                <div class="thank-you-card">
                    <!-- Success Header -->
                    <div class="success-header">
                        <div class="success-icon">
                            <svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <h1>Thank You </h1>
                        <p class="mb-0">Your appointment request has been received successfully</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body-content">
                        <p class="text-center text-muted fs-5 mb-4">
                            We appreciate your trust in our healthcare services. Our team will process your request shortly.
                        </p>

                        <!-- What's Next Info -->
                        <div class="info-alert">
                            <h5><i class="bi bi-info-circle me-2"></i>What Happens Next?</h5>
                            <ul>
                                <li>You will receive a confirmation email within the next 30 minutes</li>
                                <li>Our staff will contact you within 24 hours to confirm your appointment details</li>
                                <li>Please check your email and phone for our confirmation message</li>
                                <li>If you need to make changes, you can contact us anytime</li>
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-primary btn-custom-primary me-2">
                                <i class="bi bi-house-door me-2"></i>Return to Home
                            </a>
                            <a href="/book-appointment" class="btn btn-custom-secondary">
                                <i class="bi bi-calendar-plus me-2"></i>Book Another Appointment
                            </a>
                        </div>

                        <!-- Contact Information -->
                        <div class="contact-section">
                            <h5 class="text-center">Need Assistance?</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Phone</small>
                                            <strong>+91-9800001900</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Email</small>
                                            <strong>helpdesk@sunrisehospitals.in</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Location</small>
                                            <strong>F-1, Kalindi Colony New Delhi-110065</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        // Optional: Show a success toast notification
        document.addEventListener('DOMContentLoaded', function() {
            // You can add Bootstrap toast notification here if needed
            console.log('Appointment booking successful!');
        });

        // Optional: Auto-redirect to home after 15 seconds
        // setTimeout(function() {
        //     window.location.href = "/";
        // }, 15000);
    </script>
@endsection