@extends('layout.master')
@section('css')
<style>
    .appointment-page-section{
        padding: 50px 0px;
    }
    /* Form container */
    .appointment-page-form {
        background: #fff;
        padding: 20px 30px;
        border-radius: 5px;
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
    }

    /* Section titles */
    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #0c9bb4;
        border-left: 4px solid #0e9bb6;
        padding-left: 12px;
        background: #f1fdfb;
        padding: 5px 10px;
        border-radius: 6px;
    }

    /* Form elements */
    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
    }
    .form-control, .form-select {
        border-radius: 5px;
        padding: 5px 14px;
        font-size: 0.95rem;
    }

    /* Buttons */
    .btn-custom {
        background: #009688;
        color: #fff;
    }
    .btn-custom:hover {
        background: #00796b;
    }
    .btn-back {
        border: 1px solid #6c757d;
        background: #fff;
        border-radius: 8px;
        padding: 10px 25px;
        font-size: 1rem;
        margin-left: 10px;
        transition: 0.3s ease-in-out;
    }
    .btn-back:hover {
        background: #f1f1f1;
        transform: translateY(-2px);
    }
    .otp-btn {
        white-space: nowrap;
        font-size: 0.9rem;
    }

    /* Spacing */
    .row.g-3 > [class*="col-"] {
        margin-bottom: 15px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            text-align: center;
        }
        .header h2 {
            font-size: 1.5rem;
            margin-top: 10px;
        }
    }
</style>
@stop
@section('content')
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Book Appointment</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="appointment-page-section">
        <div class="container">
            <div class="row">
                <!-- Appointment Form -->
                <div class="appointment-page-form">
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="book-appointment-page">
                          
                        <!-- Personal Information -->
                        <div class="section-title">👤 Personnel Information</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-2">
                                <label class="form-label">Patient Title *</label>
                                <select name="title" class="form-select">
                                    <option>Select Title</option>
                                    <option>Mr.</option>
                                    <option>Mrs.</option>
                                    <option>Ms.</option>
                                    <option>Dr.</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="form-label">Last Name *</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">Gender *</label>
                                <select name="gender" class="form-select">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" name="dob" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">Email ID *</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label class="form-label">Mobile No. *</label>
                                <input type="tel" name="mobile_no" class="form-control" placeholder="Mobile" required maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g,'');">
                            </div>
                            <div class="row g-3">
                               <div class="col-12 col-md-6 col-lg-3">
                                    <label class="form-label">Country</label>
                                        <select name="country_id" id="country" class="form-control" required 
                                                data-states-url="{{ url('get-states') }}">
                                                <option value="">-- Select Country --</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                        </select>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                     <label class="form-label">Select State <span class="text-danger">*</span></label>
                                        <select name="state_id" id="state" class="form-control" required>
                                            <option value="">-- Select State --</option>
                                        </select>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label class="form-label">City</label>
                                   <select name="city_id" id="city" class="form-control" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label class="form-label">Pin Code</label>
                                    <input type="text" name="pin_code" class="form-control" placeholder="Enter Pincode">
                                </div>
                            </div>

                           
                        </div>

                        <hr class="my-4">

                        <!-- Doctor Section -->
                        <div class="section-title">🩺 Doctor</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Select Doctor *</label>
                                <select class="form-select" name="doctor_id" required>
                                    <option value="">-- Select Doctor --</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Select Speciality *</label>
                                <select class="form-select" name="speciality_id" required>
                                    <option>Select Speciality</option>
                                    @foreach($specialties_form as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Appointment Section -->
                        <div class="section-title">📅 Appointment Date & Time</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Date of Appointment *</label>
                                <input type="date" name="appointment_date" class="form-control">
                            </div>
                            <div class="col-12 col-md-6">
                                    <label class="form-label">Time Slot *</label>
                                    <select class="form-select" name="time_slot_id" required>
                                        <option>No Available Slots</option>
                                            @foreach($timeslots as $timeslot)
                                                <option value="{{ $timeslot->id }}">
                                                    {{ $timeslot->start_time }} - {{ $timeslot->end_time }}
                                                </option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex flex-column flex-sm-row justify-content-sm-start gap-2">
                            <button type="submit" class="btn btn-custom btn-sm text-white w-10 w-sm-auto">Submit</button>
                            <button type="button" class="btn btn-dark btn-sm w-10 w-sm-auto">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment Form -->
@endsection
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    // ---- Existing Country → State ----
    countrySelect.addEventListener('change', async function () {
        const countryId = this.value;
        const baseUrl = this.dataset.statesUrl; 
        const statesUrl = `${baseUrl}/${countryId}`;

        console.log('Fetching states from URL:', statesUrl);

        stateSelect.innerHTML = '<option value="">-- Select State --</option>';
        citySelect.innerHTML = '<option value="">Select City</option>'; // reset city

        if (!countryId) return;

        try {
            const response = await fetch(statesUrl);
            const states = await response.json();
            console.log('Received states data:', states);

            states.forEach(state => {
                const option = document.createElement('option');
                option.value = state.id;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching states:', error);
        }
    });

    // ---- NEW: State → City ----
    stateSelect.addEventListener('change', async function () {
        const stateId = this.value;
        const citiesUrl = `/get-cities/${stateId}`; // direct route

        console.log('Fetching cities from URL:', citiesUrl);

        citySelect.innerHTML = '<option value="">Select City</option>';

        if (!stateId) return;

        try {
            const response = await fetch(citiesUrl);
            const cities = await response.json();
            console.log('Received cities data:', cities);

            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.id;
                option.textContent = city.name;
                citySelect.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching cities:', error);
        }
    });
});
</script>


@endsection