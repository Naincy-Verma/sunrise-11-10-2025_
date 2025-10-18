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
        <h4>Add Doctor</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('doctors.index') }}">Doctors</a>
        </li>
        <li class="breadcrumb-item active">Add Doctor</li>
      </ol>
    </div>
  </div>
  <!-- Form Start -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Doctor Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data"> 
        @csrf 
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title mb-3">🏠 Homepage Information</div>
          </div>
          <div class="col-lg-6">
           <div class="form-group">
              <label>Doctor Name <span class="text-danger">*</span></label>
                <input type="text" id="doctor_name" name="name" class="form-control" placeholder="Dr. John Doe" required>
            </div>

            <div class="form-group">
              <label>Profile URL <span class="text-danger">*</span></label>
              <input type="text" id="profile_url" name="profile_url" class="form-control" placeholder="profile url">
            </div>


            <div class="form-group">
                <label>Appointment URL <span class="text-danger">*</span></label>
                <input type="url" name="appointment_url" class="form-control" placeholder="https://example.com/appointment"  required>
            </div>

            <div class="form-group">
              <label>Designation</label>
              <input type="text" name="designation" class="form-control" placeholder="Senior Consultant">
            </div>
            <div class="form-group">
              <label>Qualification</label>
              <input type="text" name="qualification" class="form-control" placeholder="MBBS, MS, etc.">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Speciality</label>
              <input type="text" name="speciality" class="form-control" placeholder="Orthopedic Surgeon">
            </div>
            <div class="form-group">
              <label>Experience</label>
              <input type="text" name="experience" class="form-control" placeholder="18+ Years">
            </div>
            <div class="form-group">
              <label>Short Description</label>
              <textarea name="description" class="form-control" rows="3" placeholder="Short bio for homepage"></textarea>
            </div>
            <div class="form-group">
              <label>Profile Image</label>
              <input type="file" id="profile_image" name="profile_image" class="form-control" accept=".jpg,.jpeg,.png">
              <img id="imagePreview" class="preview-img" alt="Profile Preview">
            </div>
          </div>
        </div>
        <hr>
        <!-- ============= DETAIL PAGE SECTION ============= -->
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title mb-3">📄 Detail Page Information</div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Brief Profile Heading</label>
              <input type="text" name="brief_profile_heading" class="form-control" placeholder="Heading for Profile Section">
            </div>
            <div class="form-group">
              <label>Brief Profile Description</label>
              <textarea name="brief_profile_description" class="form-control" rows="3" placeholder="Description shown on detail page"></textarea>
            </div>
            <div class="form-group">
              <label>Metrics (Add Multiple)</label>
              <div id="metricsWrapper">
                <div class="d-flex mb-2">
                  <input type="text" name="metrics[]" class="form-control me-2" placeholder="Years of Experience, Success Rate...">
                  <button type="button" class="btn btn-success add-metric">+</button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Notable Records</label>
              <textarea name="notable_records" class="form-control" rows="2" placeholder="Notable medical records or stats"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Professional Achievements</label>
              <input type="text" name="professional_heading" class="form-control mb-2" placeholder="Main Heading">
              <input type="text" name="professional_subheading" class="form-control mb-2" placeholder="Sub Heading">
              <textarea name="professional_description" class="form-control mb-2" rows="3" placeholder="Description"></textarea>
              <textarea name="training_record" class="form-control" rows="3" placeholder="Training Records (if any)"></textarea>
            </div>
          </div>
        </div>
        <hr>
        <!-- ============= PROCEDURES AND SPECIALIZATIONS ============= -->
        <div class="row">
          <div class="col-lg-6">
            <div class="section-title mb-3">🧠 Specialized Procedures</div>
            <div class="form-group">
              <input type="text" name="specialized_heading" class="form-control mb-2" placeholder="Heading">
              <input type="text" name="specialized_subheading" class="form-control mb-2" placeholder="Subheading">
              <input type="text" name="specialized_title" class="form-control mb-2" placeholder="Title">
              <textarea name="specialized_description" class="form-control" rows="3" placeholder="Detailed Description"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="section-title mb-3">🎯 Areas of Specialization</div>
            <div id="specializationWrapper">
              <div class="d-flex mb-2">
                <input type="text" name="areas_of_specialization[]" class="form-control me-2" placeholder="Cardiology, Laparoscopy...">
                <button type="button" class="btn btn-success add-specialization">+</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <!-- ============= CONTRIBUTIONS AND ACHIEVEMENTS ============= -->
        <div class="row">
          <div class="col-lg-6">
            <div class="section-title mb-3">🏆 Professional Contributions</div>
            <div class="form-group">
              <input type="text" name="contributions_heading" class="form-control mb-2" placeholder="Heading">
              <textarea name="contributions_description" class="form-control mb-2" rows="3" placeholder="Describe contributions or papers"></textarea>
              <textarea name="latest_achievement" class="form-control" rows="2" placeholder="Latest Achievement"></textarea>
            </div>
          </div>
        </div>
        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
          <button type="submit" class="btn btn-primary">Save Doctor</button>
          <a href="{{ route('doctors.index') }}" class="btn btn-light">Cancel</a>
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
    if (profileImage) {
        profileImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // ✅ Add/Remove Metric Fields
    const metricsWrapper = document.getElementById('metricsWrapper');
    metricsWrapper.addEventListener('click', function(e) {
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
    specializationWrapper.addEventListener('click', function(e) {
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

    // ✅ Auto-generate slug only (for profile_url field)
    const doctorNameInput = document.getElementById('doctor_name');
    const profileUrlInput = document.getElementById('profile_url');

    doctorNameInput.addEventListener('input', function() {
        const name = this.value.trim();
        if (name) {
            const slug = name
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // remove invalid chars
                .replace(/\s+/g, '-')         // replace spaces with hyphen
                .replace(/-+/g, '-');         // collapse multiple hyphens
            profileUrlInput.value = slug;
        } else {
            profileUrlInput.value = '';
        }
    });
});
</script>
@endsection
