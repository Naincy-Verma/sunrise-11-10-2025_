@extends('admin.layouts.master')

@section('css')
<style>
.section-title { 
  font-weight: 600; 
  font-size: 16px; 
  background: #f1f5f9; 
  border-left: 4px solid #007bff; 
  padding: 10px 15px; 
  margin-top: 25px; 
}
.preview-img { 
  width: 140px; 
  height: 140px; 
  border-radius: 10px; 
  margin-top: 10px; 
  display: none; 
  object-fit: cover; 
}

/* 🔹 Increase size only for Brief Profile Image preview */
#briefImagePreview {
  width: 500px;
  height: 300px;
  border-radius: 12px;
}
label { 
  margin-top: 10px; 
  font-weight: 500; 
}
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4>Add Doctor</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 🏠 Homepage Section --}}
        <div class="section-title">🏠 Homepage Information</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Doctor Name</label>
            <input type="text" name="name" id="doctor_name" class="form-control" required>

            <label>Speciality</label>
            <select name="speciality_id" class="form-control">
              <option value="">Select Speciality</option>
              @foreach($specialities as $speciality)
                <option value="{{ $speciality->id }}">{{ $speciality->title ?? $speciality->name }}</option>
              @endforeach
            </select>

            <label>Designation</label>
            <input type="text" name="designation" class="form-control">

            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control">

            <label>Experience</label>
            <input type="text" name="experience" class="form-control">
          </div>

          <div class="col-md-6">
            <label>Short Description</label>
            <textarea name="description" class="form-control"></textarea>

            <label>Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <img id="imagePreview" class="preview-img" />

            <label>Profile URL</label>
            <input type="text" name="profile_url" id="profile_url" class="form-control">

            <label>Appointment URL</label>
            <input type="url" name="appointment_url" class="form-control">
          </div>
        </div>

        {{-- 📄 Detail Page Section --}}
        <div class="section-title">📄 Detail Page Information</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Brief Profile Heading</label>
            <input type="text" name="brief_profile_heading" class="form-control">

            <label>Brief Profile Description</label>
            <textarea name="brief_profile_description" class="form-control"></textarea>

            <label>Brief Profile Image</label>
            <input type="file" name="brief_profile_image" id="brief_profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <img id="briefImagePreview" class="preview-img" />
          </div>

          <div class="col-md-6">
            <label>Brief Notable Records</label>
            <textarea name="brief_notable_records" id="brief_notable_records" class="form-control ckeditor"></textarea>

            <label>Brief Metrics</label>
            <div id="metricsWrapper" class="pt-2">
              <div class="row">
                 <div class="d-flex mb-2 col-md-6">
                <!-- <input type="text" name="brief_metrics[]" class="form-control me-2" placeholder="Metric"> -->
                 <input type="text" name="brief_metrics[0][label]" class="form-control" placeholder="Label (e.g. Years of Excellence)" required>
              </div>
              <div class="d-flex mb-2 col-md-6">
                <!-- <input type="text" name="brief_metrics[]" class="form-control me-2" placeholder="Metric"> -->
                 <input type="text" name="brief_metrics[0][value]" class="form-control" placeholder="Value (e.g. 10+)" required>
                
              </div>
              <button type="button" class="btn btn-success add-metric">+</button>
              </div>
             
            </div>
          </div>
        </div>

        {{-- 🏅 Professional Achievements --}}
        <div class="section-title mt-4">🏅 Professional Achievements</div>
        <label class="fw-semibold pt-3">Professional Heading</label>
        <input type="text" name="professional_heading" class="form-control mb-3">

        <label class="fw-semibold">Professional Description</label>
        <div id="professionalWrapper" class="pt-2">
          <div class="row">
            <div class="d-flex mb-2 col-md-6">
              <input type="text" name="professional_description[0][label]" class="form-control" placeholder="Label (e.g. Award Title)">
            </div>
            <div class="d-flex mb-2 col-md-6">
              <input type="text" name="professional_description[0][value]" class="form-control" placeholder="Value (e.g. Gold Medal)">
            </div>
          </div>
          <button type="button" class="btn btn-success add-professional">+</button>
        </div>

        {{-- 🎓 Training Programs Conducted --}}
        <div class="section-title">🎓 Training Programs Conducted</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Training Heading</label>
            <input type="text" name="training_heading" class="form-control">

            <label>Training Description (JSON Array)</label>
            <div id="trainingWrapper" class="pt-2">
              <div class="row">
                <div class="d-flex mb-2 col-md-6">
                  <input type="text" name="training_description[0][label]" class="form-control" placeholder="Label (e.g. Workshop)">
                </div>
                <div class="d-flex mb-2 col-md-6">
                  <input type="text" name="training_description[0][value]" class="form-control" placeholder="Value (e.g. Advanced Skin Techniques)">
                </div>
              </div>
              <button type="button" class="btn btn-success add-training">+</button>
            </div>
          </div>
          <div class="col-md-6">
            <label>Training Records (Detailed)</label>
            <textarea name="training_record" id="training_record" class="form-control ckeditor"></textarea>
          </div>
        </div>

        {{-- 🩺 Specialized Procedures --}}
        <div class="section-title">🩺 Specialized Procedures</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Specialized Heading</label>
            <input type="text" name="specialized_heading" class="form-control">
            <label>Specialized Subheading</label>
            <input type="text" name="specialized_subheading" class="form-control">
          </div>
          <div class="col-md-6">
            <label>Specialized Descriptions</label>
             <div id="specializedWrapper" class="pt-2">
              <div class="row">
                <div class="d-flex mb-2 col-md-6">
                  <input type="text" name="specialized_description[0][label]" class="form-control" placeholder="Label (e.g. Hair Transplant)">
                </div>
                <div class="d-flex mb-2 col-md-6">
                  <input type="text" name="specialized_description[0][value]" class="form-control" placeholder="Value (e.g. 500+ Surgeries)">
                </div>
              </div>
              <button type="button" class="btn btn-success add-specialized">+</button>
            </div>
          </div>
        </div>

        {{-- 🧬 Areas of Specialization --}}
        <div class="section-title">🧬 Areas of Specialization</div>
        <label class="mt-3 fw-semibold pt-3">Areas of Specialization Heading</label>
        <input type="text" name="area_specialized_heading" class="form-control mb-2" placeholder="Areas of Specialization Heading">

        <label>Areas of Specialization Descriptions</label>
          <div id="areasWrapper" class="pt-2">
            <div class="row">
              <div class="d-flex mb-2 col-md-6">
                <input type="text" name="areas_of_specialization" class="form-control" placeholder="Label (e.g. Dermatology)">
              </div>
      
            </div>
            <button type="button" class="btn btn-success add-area">+</button>
        </div>

        {{-- 📘 Professional Contributions --}}
        <div class="section-title">📘 Professional Contributions</div>
        <label class="pt-3">Contributions Heading</label>
        <input type="text" name="contributions_heading" class="form-control">
        <label>Contributions Description</label>
        <textarea name="contributions_description" class="form-control ckeditor"></textarea>
        <label>Latest Achievements</label>
        <textarea name="latest_achievement" class="form-control ckeditor"></textarea>

        <button type="submit" class="btn btn-primary mt-4">💾 Save Doctor</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
  document.querySelectorAll('.ckeditor').forEach(el => CKEDITOR.replace(el));

  // Profile Image Preview
  document.getElementById('profile_image').addEventListener('change', function(){
    const [file] = this.files;
    if (file) {
      const img = document.getElementById('imagePreview');
      img.src = URL.createObjectURL(file);
      img.style.display = 'block';
    }
  });

  // Brief Profile Image Preview
  document.getElementById('brief_profile_image').addEventListener('change', function(){
    const [file] = this.files;
    if (file) {
      const img = document.getElementById('briefImagePreview');
      img.src = URL.createObjectURL(file);
      img.style.display = 'block';
    }
  });

  // Dynamic field logic
  const addDynamic = (wrapperId, inputName, addClass, removeClass) => {
    document.addEventListener('click', e => {
      if (e.target.classList.contains(addClass)) {
        const wrapper = document.getElementById(wrapperId);
        const div = document.createElement('div');
        div.className = 'd-flex mb-2';
        div.innerHTML = `<input type="text" name="${inputName}" class="form-control me-2">
                         <button type="button" class="btn btn-danger ${removeClass}">-</button>`;
        wrapper.appendChild(div);
      }
      if (e.target.classList.contains(removeClass)) {
        e.target.parentElement.remove();
      }
    });
  };

  // Auto-generate slug
  const doctorNameInput = document.getElementById('doctor_name');
  const profileUrlInput = document.getElementById('profile_url');
  doctorNameInput.addEventListener('input', function() {
    const name = this.value.trim();
    if (name) {
      const slug = name.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
      profileUrlInput.value = slug;
    } else {
      profileUrlInput.value = '';
    }
  });

  // addDynamic('metricsWrapper', 'brief_metrics[]', 'add-metric', 'remove-metric');
  // addDynamic('professionalWrapper', 'professional_description[]', 'add-professional', 'remove-professional');
  // addDynamic('trainingWrapper', 'training_description[]', 'add-training', 'remove-training');
  // addDynamic('specializedWrapper', 'specialized_description[]', 'add-specialized', 'remove-specialized');
  addDynamic('areasWrapper', 'areas_of_specialization[]', 'add-area', 'remove-area');
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const dynamicSections = [
    { btn: '.add-metric', wrap: 'metricsWrapper', name: 'brief_metrics' },
    { btn: '.add-professional', wrap: 'professionalWrapper', name: 'professional_description' },
    { btn: '.add-training', wrap: 'trainingWrapper', name: 'training_description' },
    { btn: '.add-specialized', wrap: 'specializedWrapper', name: 'specialized_description' },
  ];

  dynamicSections.forEach(section => {
    let index = 1;

    // ✅ Add new row
    document.querySelector(section.btn).addEventListener('click', function() {
      const wrapper = document.getElementById(section.wrap);
      const newRow = document.createElement('div');
      newRow.classList.add('row', 'align-items-center');

      newRow.innerHTML = `
        <div class="d-flex mb-2 col-md-5">
          <input type="text" name="${section.name}[${index}][label]" class="form-control" placeholder="Label (e.g. Title)">
        </div>
        <div class="d-flex mb-2 col-md-5">
          <input type="text" name="${section.name}[${index}][value]" class="form-control" placeholder="Value (e.g. Detail)">
        </div>
        <div class="col-md-2 mb-2">
          <button type="button" class="btn btn-danger remove-row">−</button>
        </div>
      `;
      wrapper.appendChild(newRow);
      index++;
    });
  });

  // ✅ Remove row functionality
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-row')) {
      e.target.closest('.row').remove();
    }
  });
});
</script>



@endsection
