@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: none;
        border: 2px solid #ccc;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        background: #f1f5f9;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        margin-top: 15px;
    }
    hr {
        border-top: 2px dashed #ccc;
        margin: 25px 0;
    }
</style>
@endsection

@section('content') 
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Doctor</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.doctors.index') }}">Doctors</a></li>
                <li class="breadcrumb-item active">Edit Doctor</li>
            </ol>
        </div>
    </div>

    <!-- Form Start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Doctor Details</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- ========== HOME SECTION ========== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title mb-3">🏠 Homepage Information</div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Doctor Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="doctor_name" value="{{ old('name', $doctor->name) }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Profile URL (Slug) <span class="text-danger">*</span></label>
                            <input type="text" name="profile_url" id="profile_url" value="{{ old('profile_url', $doctor->profile_url) }}" class="form-control" placeholder="dr-john-doe" required>
                        </div>

                        <div class="form-group">
                            <label>Appointment URL <span class="text-danger">*</span></label>
                            <input type="text" name="appointment_url" id="appointment_url" value="{{ old('appointment_url', $doctor->appointment_url) }}" class="form-control" placeholder="/sunrisehospital/book-appointment" required>
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" value="{{ old('designation', $doctor->designation) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qualification" value="{{ old('qualification', $doctor->qualification) }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Speciality</label>
                            <input type="text" name="speciality" value="{{ old('speciality', $doctor->speciality) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" name="experience" value="{{ old('experience', $doctor->experience) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $doctor->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Profile Image</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control" accept=".jpg,.jpeg,.png">
                            <img id="imagePreview"
                                 class="preview-img"
                                 src="{{ $doctor->profile_image ? asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) : '' }}"
                                 style="{{ $doctor->profile_image ? 'display:block;' : 'display:none;' }}"
                                 alt="Profile Preview">
                        </div>
                    </div>
                </div>

                <hr>

                <!-- ========== DETAIL PAGE SECTION ========== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title mb-3">📄 Detail Page Information</div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Brief Profile Heading</label>
                            <input type="text" name="brief_profile_heading" value="{{ old('brief_profile_heading', $doctor->brief_profile_heading) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Brief Profile Description</label>
                            <textarea name="brief_profile_description" class="form-control" rows="3">{{ old('brief_profile_description', $doctor->brief_profile_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Metrics (Multiple)</label>
                            <div id="metricsWrapper">
                                @php
                                    $metrics = !empty($doctor->metrics) ? json_decode($doctor->metrics, true) : [];
                                @endphp
                                @foreach ($metrics as $metric)
                                <div class="d-flex mb-2">
                                    <input type="text" name="metrics[]" class="form-control me-2" value="{{ $metric }}">
                                    @if ($loop->first)
                                        <button type="button" class="btn btn-success add-metric">+</button>
                                    @else
                                        <button type="button" class="btn btn-danger remove-field">-</button>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Notable Records</label>
                            <textarea name="notable_records" class="form-control" rows="2">{{ old('notable_records', $doctor->notable_records) }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Professional Achievements</label>
                            <input type="text" name="professional_heading" class="form-control mb-2" value="{{ old('professional_heading', $doctor->professional_heading) }}">
                            <input type="text" name="professional_subheading" class="form-control mb-2" value="{{ old('professional_subheading', $doctor->professional_subheading) }}">
                            <textarea name="professional_description" class="form-control mb-2" rows="3">{{ old('professional_description', $doctor->professional_description) }}</textarea>
                            <textarea name="training_record" class="form-control" rows="3">{{ old('training_record', $doctor->training_record) }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- ========== SPECIALIZATION SECTION ========== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title mb-3">🧠 Specialized Procedures</div>
                        <div class="form-group">
                            <input type="text" name="specialized_heading" class="form-control mb-2" value="{{ old('specialized_heading', $doctor->specialized_heading) }}" placeholder="Heading">
                            <input type="text" name="specialized_subheading" class="form-control mb-2" value="{{ old('specialized_subheading', $doctor->specialized_subheading) }}" placeholder="Subheading">
                            <input type="text" name="specialized_title" class="form-control mb-2" value="{{ old('specialized_title', $doctor->specialized_title) }}" placeholder="Title">
                            <textarea name="specialized_description" class="form-control" rows="3" placeholder="Description">{{ old('specialized_description', $doctor->specialized_description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="section-title mb-3">🎯 Areas of Specialization</div>
                        <div id="specializationWrapper">
                            @php
                                $specializations = !empty($doctor->areas_of_specialization) ? json_decode($doctor->areas_of_specialization, true) : [];
                            @endphp
                            @foreach ($specializations as $specialization)
                            <div class="d-flex mb-2">
                                <input type="text" name="areas_of_specialization[]" class="form-control me-2" value="{{ $specialization }}">
                                @if ($loop->first)
                                    <button type="button" class="btn btn-success add-specialization">+</button>
                                @else
                                    <button type="button" class="btn btn-danger remove-field">-</button>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <hr>

                <!-- ========== CONTRIBUTIONS SECTION ========== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title mb-3">🏆 Professional Contributions</div>
                        <div class="form-group">
                            <input type="text" name="contributions_heading" class="form-control mb-2" value="{{ old('contributions_heading', $doctor->contributions_heading) }}" placeholder="Heading">
                            <textarea name="contributions_description" class="form-control mb-2" rows="3">{{ old('contributions_description', $doctor->contributions_description) }}</textarea>
                            <textarea name="latest_achievement" class="form-control" rows="2">{{ old('latest_achievement', $doctor->latest_achievement) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update Doctor</button>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ✅ Image Preview
    const profileImage = document.getElementById('profile_image');
    const imagePreview = document.getElementById('imagePreview');
    profileImage?.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // ✅ Add/Remove Metrics
    const metricsWrapper = document.getElementById('metricsWrapper');
    metricsWrapper?.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-metric')) {
            const div = document.createElement('div');
            div.classList.add('d-flex', 'mb-2');
            div.innerHTML = `
                <input type="text" name="metrics[]" class="form-control me-2" placeholder="Add new metric">
                <button type="button" class="btn btn-danger remove-field">-</button>`;
            metricsWrapper.appendChild(div);
        } else if (e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });

    // ✅ Add/Remove Specializations
    const specializationWrapper = document.getElementById('specializationWrapper');
    specializationWrapper?.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-specialization')) {
            const div = document.createElement('div');
            div.classList.add('d-flex', 'mb-2');
            div.innerHTML = `
                <input type="text" name="areas_of_specialization[]" class="form-control me-2" placeholder="New Specialization">
                <button type="button" class="btn btn-danger remove-field">-</button>`;
            specializationWrapper.appendChild(div);
        } else if (e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });

    // ✅ Auto-generate profile slug only
    const doctorNameInput = document.getElementById('doctor_name');
    const profileUrlInput = document.getElementById('profile_url');

    doctorNameInput?.addEventListener('input', function() {
        let name = this.value.trim();
        if (name) {
            let slug = name
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            profileUrlInput.value = slug; // Only slug
        } else {
            profileUrlInput.value = '';
        }
    });
});
</script>
@endsection
