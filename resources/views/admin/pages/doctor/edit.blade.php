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
.preview-img { width: 140px; height: 140px; border-radius: 10px; margin-top: 10px; object-fit: cover; }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4>Edit Doctor</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- 🏠 Homepage Section --}}
        <div class="section-title">🏠 Homepage Information</div>
        <div class="row">
          <div class="col-md-6">
            <label>Doctor Name</label>
            <input type="text" name="name" id="doctor_name" value="{{ old('name', $doctor->name) }}" class="form-control" required>

            <label>Speciality</label>
            <select name="speciality_id" class="form-control">
              <option value="">Select Speciality</option>
              @foreach($specialities as $speciality)
                <option value="{{ $speciality->id }}" {{ $doctor->speciality_id == $speciality->id ? 'selected' : '' }}>
                  {{ $speciality->title ?? $speciality->name }}
                </option>
              @endforeach
            </select>

            <label>Designation</label>
            <input type="text" name="designation" value="{{ old('designation', $doctor->designation) }}" class="form-control">

            <label>Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification', $doctor->qualification) }}" class="form-control">

            <label>Experience</label>
            <input type="text" name="experience" value="{{ old('experience', $doctor->experience) }}" class="form-control">
          </div>

          <div class="col-md-6">
            <label>Short Description</label>
            <textarea name="description" class="form-control">{{ old('description', $doctor->description) }}</textarea>

            <label>Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <img id="imagePreview" class="preview-img" src="{{ $doctor->profile_image ? asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) : '' }}" style="{{ $doctor->profile_image ? 'display:block;' : 'display:none;' }}" />

            <label>Profile URL</label>
            <input type="text" name="profile_url" id="profile_url" value="{{ old('profile_url', $doctor->profile_url) }}" class="form-control">

            <label>Appointment URL</label>
            <input type="url" name="appointment_url" value="{{ old('appointment_url', $doctor->appointment_url) }}" class="form-control">
          </div>
        </div>

        {{-- 📄 Detail Page Section --}}
        <div class="section-title">📄 Detail Page Information</div>
        <div class="row">
          <div class="col-md-6">
            <label>Brief Profile Heading</label>
            <input type="text" name="brief_profile_heading" value="{{ old('brief_profile_heading', $doctor->brief_profile_heading) }}" class="form-control">

            <label>Brief Profile Description</label>
            <textarea name="brief_profile_description" class="form-control">{{ old('brief_profile_description', $doctor->brief_profile_description) }}</textarea>

            <label>Brief Profile Image</label>
            <input type="file" name="brief_profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
          </div>

          <div class="col-md-6">
            <label>Brief Notable Records</label>
            <textarea name="brief_notable_records" class="form-control ckeditor">{{ old('brief_notable_records', $doctor->brief_notable_records) }}</textarea>

            <label>Brief Metrics</label>
            <div id="metricsWrapper">
              @php
                $metrics = json_decode($doctor->brief_metrics ?? '[]', true);
              @endphp
              @if(!empty($metrics))
                @foreach($metrics as $metric)
                <div class="d-flex mb-2">
                  <input type="text" name="brief_metrics[]" value="{{ $metric }}" class="form-control me-2">
                  @if($loop->first)
                    <button type="button" class="btn btn-success add-metric">+</button>
                  @else
                    <button type="button" class="btn btn-danger remove-metric">-</button>
                  @endif
                </div>
                @endforeach
              @else
                <div class="d-flex mb-2">
                  <input type="text" name="brief_metrics[]" class="form-control me-2">
                  <button type="button" class="btn btn-success add-metric">+</button>
                </div>
              @endif
            </div>
          </div>
        </div>

        {{-- 🏅 Professional Achievements --}}
        <div class="section-title">🏅 Professional Achievements</div>
        <div id="professionalWrapper">
          @php
            $professional = json_decode($doctor->professional_description ?? '[]', true);
          @endphp
          @if(!empty($professional))
            @foreach($professional as $p)
            <div class="d-flex mb-2">
              <input type="text" name="professional_description[]" value="{{ $p }}" class="form-control me-2">
              @if($loop->first)
                <button type="button" class="btn btn-success add-professional">+</button>
              @else
                <button type="button" class="btn btn-danger remove-professional">-</button>
              @endif
            </div>
            @endforeach
          @else
            <div class="d-flex mb-2">
              <input type="text" name="professional_description[]" class="form-control me-2">
              <button type="button" class="btn btn-success add-professional">+</button>
            </div>
          @endif
        </div>

        {{-- 🎓 Training Programs Conducted --}}
        <div class="section-title">🎓 Training Programs Conducted</div>
        <div class="row">
          <div class="col-md-6">
            <label>Training Heading</label>
            <input type="text" name="training_heading" value="{{ old('training_heading', $doctor->training_heading) }}" class="form-control">

            <label>Training Description (JSON Array)</label>
            <div id="trainingWrapper">
              @php
                $trainings = json_decode($doctor->training_description ?? '[]', true);
              @endphp
              @if(!empty($trainings))
                @foreach($trainings as $t)
                <div class="d-flex mb-2">
                  <input type="text" name="training_description[]" value="{{ $t }}" class="form-control me-2">
                  @if($loop->first)
                    <button type="button" class="btn btn-success add-training">+</button>
                  @else
                    <button type="button" class="btn btn-danger remove-training">-</button>
                  @endif
                </div>
                @endforeach
              @else
                <div class="d-flex mb-2">
                  <input type="text" name="training_description[]" class="form-control me-2">
                  <button type="button" class="btn btn-success add-training">+</button>
                </div>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <label>Training Records (Detailed)</label>
            <textarea name="training_record" id="training_record" class="form-control ckeditor">{{ old('training_record', $doctor->training_record) }}</textarea>
          </div>
        </div>

        {{-- 🩺 Specialized Procedures --}}
        <div class="section-title">🩺 Specialized Procedures</div>
        <div class="row">
          <div class="col-md-6">
            <label>Specialized Heading</label>
            <input type="text" name="specialized_heading" value="{{ old('specialized_heading', $doctor->specialized_heading) }}" class="form-control">
            <label>Specialized Subheading</label>
            <input type="text" name="specialized_subheading" value="{{ old('specialized_subheading', $doctor->specialized_subheading) }}" class="form-control">
          </div>
          <div class="col-md-6">
            <label>Specialized Descriptions</label>
            <div id="specializedWrapper">
              @php
                $specialized = json_decode($doctor->specialized_description ?? '[]', true);
              @endphp
              @if(!empty($specialized))
                @foreach($specialized as $s)
                <div class="d-flex mb-2">
                  <input type="text" name="specialized_description[]" value="{{ $s }}" class="form-control me-2">
                  @if($loop->first)
                    <button type="button" class="btn btn-success add-specialized">+</button>
                  @else
                    <button type="button" class="btn btn-danger remove-specialized">-</button>
                  @endif
                </div>
                @endforeach
              @else
                <div class="d-flex mb-2">
                  <input type="text" name="specialized_description[]" class="form-control me-2">
                  <button type="button" class="btn btn-success add-specialized">+</button>
                </div>
              @endif
            </div>
          </div>
        </div>

        {{-- 🧬 Areas of Specialization --}}
        <div class="section-title">🧬 Areas of Specialization</div>
        <div id="areasWrapper">
          @php
            $areas = json_decode($doctor->areas_of_specialization ?? '[]', true);
          @endphp
          @if(!empty($areas))
            @foreach($areas as $a)
            <div class="d-flex mb-2">
              <input type="text" name="areas_of_specialization[]" value="{{ $a }}" class="form-control me-2">
              @if($loop->first)
                <button type="button" class="btn btn-success add-area">+</button>
              @else
                <button type="button" class="btn btn-danger remove-area">-</button>
              @endif
            </div>
            @endforeach
          @else
            <div class="d-flex mb-2">
              <input type="text" name="areas_of_specialization[]" class="form-control me-2">
              <button type="button" class="btn btn-success add-area">+</button>
            </div>
          @endif
        </div>

        {{-- 📘 Professional Contributions --}}
        <div class="section-title">📘 Professional Contributions</div>
        <label>Contributions Heading</label>
        <input type="text" name="contributions_heading" value="{{ old('contributions_heading', $doctor->contributions_heading) }}" class="form-control">
        <label>Contributions Description</label>
        <textarea name="contributions_description" class="form-control ckeditor">{{ old('contributions_description', $doctor->contributions_description) }}</textarea>
        <label>Latest Achievements</label>
        <textarea name="latest_achievement" class="form-control ckeditor">{{ old('latest_achievement', $doctor->latest_achievement) }}</textarea>

        <button type="submit" class="btn btn-primary mt-4">💾 Update Doctor</button>
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-light mt-4">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
  document.querySelectorAll('.ckeditor').forEach(el => CKEDITOR.replace(el));

  // ✅ Image preview
  document.getElementById('profile_image').addEventListener('change', function(){
    const [file] = this.files;
    if (file) {
      const img = document.getElementById('imagePreview');
      img.src = URL.createObjectURL(file);
      img.style.display = 'block';
    }
  });

  // ✅ Dynamic fields (metrics, professional, training, specialized, areas)
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

  addDynamic('metricsWrapper', 'brief_metrics[]', 'add-metric', 'remove-metric');
  addDynamic('professionalWrapper', 'professional_description[]', 'add-professional', 'remove-professional');
  addDynamic('trainingWrapper', 'training_description[]', 'add-training', 'remove-training');
  addDynamic('specializedWrapper', 'specialized_description[]', 'add-specialized', 'remove-specialized');
  addDynamic('areasWrapper', 'areas_of_specialization[]', 'add-area', 'remove-area');

  // ✅ Auto-generate slug
  const doctorNameInput = document.getElementById('doctor_name');
  const profileUrlInput = document.getElementById('profile_url');

  doctorNameInput.addEventListener('input', function() {
      const name = this.value.trim();
      if (name) {
          const slug = name.toLowerCase()
              .replace(/[^a-z0-9\s-]/g, '')
              .replace(/\s+/g, '-')
              .replace(/-+/g, '-');
          profileUrlInput.value = slug;
      } else {
          profileUrlInput.value = '';
      }
  });
</script>
@endsection
