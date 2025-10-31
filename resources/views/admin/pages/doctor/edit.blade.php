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
#briefImagePreview {
  width: 500px;
  height: 300px;
  border-radius: 12px;
}
label { margin-top: 10px; font-weight: 500; }
.d-flex.gap-2 { gap: 10px; }
.remove-row-btn {
  cursor: pointer;
  background: #dc3545;
  border: none;
  color: #fff;
  padding: 6px 10px;
  border-radius: 6px;
}
.add-row-btn {
  padding: 6px 10px;
}
</style>
@endsection

@section('content')
@php
  // helper to safely return string only — prevents printing arrays directly
  $safe = function($v){ return is_string($v) ? $v : ''; };
@endphp

<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4>Edit Doctor</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- 🏠 Homepage Section --}}
        <div class="section-title">🏠 Homepage Information</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Doctor Name</label>
            <input type="text" name="name" id="doctor_name" value="{{ old('name', $safe($doctor->name)) }}" class="form-control" required>

            <label>Speciality</label>
            <select name="speciality_id" class="form-control">
              <option value="">Select Speciality</option>
              @foreach($specialities as $speciality)
                <option value="{{ $speciality->id }}" {{ (old('speciality_id', $doctor->speciality_id) == $speciality->id) ? 'selected' : '' }}>
                  {{ $speciality->title ?? $speciality->name }}
                </option>
              @endforeach
            </select>

            <label>Designation</label>
            <input type="text" name="designation" value="{{ old('designation', $safe($doctor->designation)) }}" class="form-control">

            <label>Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification', $safe($doctor->qualification)) }}" class="form-control">

            <label>Experience</label>
            <input type="text" name="experience" value="{{ old('experience', $safe($doctor->experience)) }}" class="form-control">
          </div>

          <div class="col-md-6">
            <label>Short Description</label>
            <textarea name="description" class="form-control">{{ old('description', $safe($doctor->description)) }}</textarea>

            <label>Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <img id="imagePreview" class="preview-img"
                 src="{{ $doctor->profile_image ? asset('admin-assets/images/admin-image/doctors/' . $doctor->profile_image) : '' }}"
                 style="{{ $doctor->profile_image ? 'display:block;' : 'display:none;' }}" />

            <label>Profile URL</label>
            <input type="text" name="profile_url" id="profile_url" value="{{ old('profile_url', $safe($doctor->profile_url)) }}" class="form-control">

            <label>Appointment URL</label>
            <input type="url" name="appointment_url" value="{{ old('appointment_url', $safe($doctor->appointment_url)) }}" class="form-control">
          </div>
        </div>

        {{-- 📄 Detail Page Section --}}
        <div class="section-title">📄 Detail Page Information</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Brief Profile Heading</label>
            <input type="text" name="brief_profile_heading" value="{{ old('brief_profile_heading', $safe($doctor->brief_profile_heading)) }}" class="form-control">

            <label>Brief Profile Description</label>
            <textarea name="brief_profile_description" class="form-control">{{ old('brief_profile_description', $safe($doctor->brief_profile_description)) }}</textarea>

            <label>Brief Profile Image</label>
            <input type="file" name="brief_profile_image" id="brief_profile_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <img id="briefImagePreview" class="preview-img"
                 src="{{ $doctor->brief_profile_image ? asset('admin-assets/images/admin-image/doctors/' . $doctor->brief_profile_image) : '' }}"
                 style="{{ $doctor->brief_profile_image ? 'display:block;' : 'display:none;' }}" />
          </div>

          <div class="col-md-6">
            <label>Brief Notable Records</label>
            <textarea name="brief_notable_records" id="brief_notable_records" class="form-control ckeditor">{{ old('brief_notable_records', $safe($doctor->brief_notable_records)) }}</textarea>

            <label>Brief Metrics</label>
            <div id="metricsWrapper">
              @php $metrics = old('brief_metrics', $doctor->brief_metrics ?? []); @endphp
              @if(!empty($metrics) && is_array($metrics))
                @foreach($metrics as $index => $metric)
                  <div class="d-flex align-items-center gap-2 mb-2 row">
                    <div class="col-md-5">
                      <input type="text" name="brief_metrics[{{ $index }}][label]" value="{{ $safe($metric['label'] ?? '') }}" placeholder="Label (e.g. Years of Excellence)" class="form-control">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="brief_metrics[{{ $index }}][value]" value="{{ $safe($metric['value'] ?? '') }}" placeholder="Value (e.g. 10+)" class="form-control">
                    </div>
                    <div class="col-md-2">
                      @if($index === 0)
                        <button type="button" class="btn btn-success add-row-btn add-metric">+</button>
                      @else
                        <button type="button" class="remove-row-btn remove-metric">-</button>
                      @endif
                    </div>
                  </div>
                @endforeach
              @else
                <div class="d-flex align-items-center gap-2 mb-2 row">
                  <div class="col-md-5"><input type="text" name="brief_metrics[0][label]" placeholder="Label (e.g. Years of Excellence)" class="form-control"></div>
                  <div class="col-md-5"><input type="text" name="brief_metrics[0][value]" placeholder="Value (e.g. 10+)" class="form-control"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success add-row-btn add-metric">+</button></div>
                </div>
              @endif
            </div>
          </div>
        </div>

        {{-- 🏅 Professional Achievements --}}
        <div class="section-title mt-4">🏅 Professional Achievements</div>
        <label class="fw-semibold pt-3">Professional Heading</label>
        <input type="text" name="professional_heading" value="{{ old('professional_heading', $safe($doctor->professional_heading)) }}" class="form-control mb-3">

        <label class="fw-semibold">Professional Description</label>
        <div id="professionalWrapper" class="pt-2">
          @php $proDesc = old('professional_description', $doctor->professional_description ?? []); @endphp
          @if(!empty($proDesc) && is_array($proDesc))
            @foreach($proDesc as $i => $p)
              {{-- expecting each item either as array ['label'=>..,'value'=>..] or string --}}
              @php
                $label = is_array($p) ? ($p['label'] ?? '') : (is_string($p) ? $p : '');
                $value = is_array($p) ? ($p['value'] ?? '') : '';
              @endphp
              <div class="row mb-2 align-items-center">
                <div class="col-md-5">
                  <input type="text" name="professional_description[{{ $i }}][label]" value="{{ $safe($label) }}" class="form-control" placeholder="Label (e.g. Award Title)">
                </div>
                <div class="col-md-5">
                  <input type="text" name="professional_description[{{ $i }}][value]" value="{{ $safe($value) }}" class="form-control" placeholder="Value (e.g. Gold Medal)">
                </div>
                <div class="col-md-2 text-center">
                  @if($i === 0)
                    <button type="button" class="btn btn-success add-row-btn add-professional">+</button>
                  @else
                    <button type="button" class="remove-row-btn remove-professional">-</button>
                  @endif
                </div>
              </div>
            @endforeach
          @else
            <div class="row mb-2 align-items-center">
              <div class="col-md-5"><input type="text" name="professional_description[0][label]" class="form-control" placeholder="Label"></div>
              <div class="col-md-5"><input type="text" name="professional_description[0][value]" class="form-control" placeholder="Value"></div>
              <div class="col-md-2"><button type="button" class="btn btn-success add-row-btn add-professional">+</button></div>
            </div>
          @endif
        </div>

        {{-- 🎓 Training Programs Conducted --}}
        <div class="section-title">🎓 Training Programs Conducted</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Training Heading</label>
            <input type="text" name="training_heading" value="{{ old('training_heading', $safe($doctor->training_heading)) }}" class="form-control">

            <label>Training Description</label>
            <div id="trainingWrapper" class="pt-2">
              @php $tDesc = old('training_description', $doctor->training_description ?? []); @endphp
              @if(!empty($tDesc) && is_array($tDesc))
                @foreach($tDesc as $i => $t)
                  @php
                    $label = is_array($t) ? ($t['label'] ?? '') : (is_string($t) ? $t : '');
                    $value = is_array($t) ? ($t['value'] ?? '') : '';
                  @endphp
                  <div class="row mb-2 align-items-center">
                    <div class="col-md-5">
                      <input type="text" name="training_description[{{ $i }}][label]" value="{{ $safe($label) }}" class="form-control" placeholder="Label">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="training_description[{{ $i }}][value]" value="{{ $safe($value) }}" class="form-control" placeholder="Value">
                    </div>
                    <div class="col-md-2 text-center">
                      @if($i === 0)
                        <button type="button" class="btn btn-success add-row-btn add-training">+</button>
                      @else
                        <button type="button" class="remove-row-btn remove-training">-</button>
                      @endif
                    </div>
                  </div>
                @endforeach
              @else
                <div class="row mb-2 align-items-center">
                  <div class="col-md-5"><input type="text" name="training_description[0][label]" class="form-control" placeholder="Label"></div>
                  <div class="col-md-5"><input type="text" name="training_description[0][value]" class="form-control" placeholder="Value"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success add-row-btn add-training">+</button></div>
                </div>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <label>Training Records (Detailed)</label>
            <textarea name="training_record" id="training_record" class="form-control ckeditor">{{ old('training_record', $safe($doctor->training_record)) }}</textarea>
          </div>
        </div>

        {{-- 🩺 Specialized Procedures --}}
        <div class="section-title">🩺 Specialized Procedures</div>
        <div class="row pt-3">
          <div class="col-md-6">
            <label>Specialized Heading</label>
            <input type="text" name="specialized_heading" value="{{ old('specialized_heading', $safe($doctor->specialized_heading)) }}" class="form-control">
            <label>Specialized Subheading</label>
            <input type="text" name="specialized_subheading" value="{{ old('specialized_subheading', $safe($doctor->specialized_subheading)) }}" class="form-control">
          </div>

          <div class="col-md-6">
            <label>Specialized Descriptions</label>
            <div id="specializedWrapper" class="pt-2">
              @php $specDesc = old('specialized_description', $doctor->specialized_description ?? []); @endphp
              @if(!empty($specDesc) && is_array($specDesc))
                @foreach($specDesc as $i => $s)
                  @php
                    $label = is_array($s) ? ($s['label'] ?? '') : (is_string($s) ? $s : '');
                    $value = is_array($s) ? ($s['value'] ?? '') : '';
                  @endphp
                  <div class="row mb-2 align-items-center">
                    <div class="col-md-5">
                      <input type="text" name="specialized_description[{{ $i }}][label]" value="{{ $safe($label) }}" class="form-control" placeholder="Label">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="specialized_description[{{ $i }}][value]" value="{{ $safe($value) }}" class="form-control" placeholder="Value">
                    </div>
                    <div class="col-md-2 text-center">
                      @if($i === 0)
                        <button type="button" class="btn btn-success add-row-btn add-specialized">+</button>
                      @else
                        <button type="button" class="remove-row-btn remove-specialized">-</button>
                      @endif
                    </div>
                  </div>
                @endforeach
              @else
                <div class="row mb-2 align-items-center">
                  <div class="col-md-5"><input type="text" name="specialized_description[0][label]" class="form-control" placeholder="Label"></div>
                  <div class="col-md-5"><input type="text" name="specialized_description[0][value]" class="form-control" placeholder="Value"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success add-row-btn add-specialized">+</button></div>
                </div>
              @endif
            </div>
          </div>
        </div>

        {{-- 🧬 Areas of Specialization --}}
        <div class="section-title">🧬 Areas of Specialization</div>
        <label class="mt-3 fw-semibold pt-3">Areas of Specialization Heading</label>
        <input type="text" name="area_specialized_heading" value="{{ old('area_specialized_heading', $safe($doctor->area_specialized_heading)) }}" class="form-control mb-2" placeholder="Areas of Specialization Heading">

        <label>Areas of Specialization Descriptions</label>
        <div id="areasWrapper" class="pt-2">
          @php $areas = old('areas_of_specialization', $doctor->areas_of_specialization ?? []); @endphp
          @if(!empty($areas) && is_array($areas))
            @foreach($areas as $i => $a)
              <div class="d-flex mb-2">
                <input type="text" name="areas_of_specialization[]" value="{{ is_string($a) ? $a : '' }}" class="form-control me-2">
                @if($i == 0)
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
        <label class="pt-3">Contributions Heading</label>
        <input type="text" name="contributions_heading" value="{{ old('contributions_heading', $safe($doctor->contributions_heading)) }}" class="form-control">
        <label>Contributions Description</label>
        <textarea name="contributions_description" class="form-control ckeditor">{{ old('contributions_description', $safe($doctor->contributions_description)) }}</textarea>
        <label>Latest Achievements</label>
        <textarea name="latest_achievement" class="form-control ckeditor">{{ old('latest_achievement', $safe($doctor->latest_achievement)) }}</textarea>

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
  // CKEditor
  document.querySelectorAll('.ckeditor').forEach(el => CKEDITOR.replace(el));

  // Image previews
  function setupPreview(inputId, imgId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.addEventListener('change', (e) => {
      const [file] = e.target.files;
      if (file) {
        const img = document.getElementById(imgId);
        img.src = URL.createObjectURL(file);
        img.style.display = 'block';
      }
    });
  }
  setupPreview('profile_image', 'imagePreview');
  setupPreview('brief_profile_image', 'briefImagePreview');

  // Generic helper to add a new row for paired label/value repeaters
  function addRow(wrapperId, baseName) {
    const wrapper = document.getElementById(wrapperId);
    // compute next index by counting rows that have inputs
    const rows = wrapper.querySelectorAll('.row.mb-2');
    let nextIndex = rows.length;
    // if wrapper uses d-flex children instead of .row, fallback:
    if (nextIndex === 0) {
      const flexChildren = wrapper.querySelectorAll('.d-flex.mb-2, .d-flex.align-items-center');
      nextIndex = flexChildren.length;
    }

    const row = document.createElement('div');
    row.className = 'row mb-2 align-items-center';
    row.innerHTML = `
      <div class="col-md-5"><input type="text" name="${baseName}[${nextIndex}][label]" class="form-control" placeholder="Label"></div>
      <div class="col-md-5"><input type="text" name="${baseName}[${nextIndex}][value]" class="form-control" placeholder="Value"></div>
      <div class="col-md-2 text-center"><button type="button" class="remove-row-btn">-</button></div>
    `;
    wrapper.appendChild(row);
  }

  // Event delegation: add / remove rows for each repeater using classes on buttons
  document.addEventListener('click', function(e) {
    // Add metric
    if (e.target.classList.contains('add-metric')) {
      const wrapper = document.getElementById('metricsWrapper');
      // Determine current highest index (count rows)
      const rows = wrapper.querySelectorAll('.row.mb-2');
      const idx = rows.length;
      const newRow = document.createElement('div');
      newRow.className = 'd-flex align-items-center gap-2 mb-2 row';
      newRow.innerHTML = `
        <div class="col-md-5">
          <input type="text" name="brief_metrics[${idx}][label]" placeholder="Label (e.g. Years of Excellence)" class="form-control">
        </div>
        <div class="col-md-5">
          <input type="text" name="brief_metrics[${idx}][value]" placeholder="Value (e.g. 10+)" class="form-control">
        </div>
        <div class="col-md-2">
          <button type="button" class="remove-row-btn remove-metric">-</button>
        </div>`;
      wrapper.appendChild(newRow);
    }

    // Add professional
    if (e.target.classList.contains('add-professional')) {
      addRow('professionalWrapper', 'professional_description');
    }

    // Add training
    if (e.target.classList.contains('add-training')) {
      addRow('trainingWrapper', 'training_description');
    }

    // Add specialized
    if (e.target.classList.contains('add-specialized')) {
      addRow('specializedWrapper', 'specialized_description');
    }

    // Remove single row buttons (works for - buttons added by addRow or initial ones)
    if (e.target.classList.contains('remove-row-btn') || e.target.classList.contains('remove-metric') || e.target.classList.contains('remove-professional') || e.target.classList.contains('remove-training') || e.target.classList.contains('remove-specialized')) {
      // find nearest row
      const row = e.target.closest('.row') || e.target.closest('.d-flex');
      if (row) row.remove();
    }

    // Add / remove areas simple list
    if (e.target.classList.contains('add-area')) {
      const wrapper = document.getElementById('areasWrapper');
      const div = document.createElement('div');
      div.className = 'd-flex mb-2';
      div.innerHTML = `<input type="text" name="areas_of_specialization[]" class="form-control me-2"><button type="button" class="btn btn-danger remove-area">-</button>`;
      wrapper.appendChild(div);
    }
    if (e.target.classList.contains('remove-area')) {
      const div = e.target.closest('.d-flex');
      if (div) div.remove();
    }
  });

  // Auto slug from doctor name -> profile_url
  const nameInput = document.getElementById('doctor_name');
  const urlInput = document.getElementById('profile_url');
  if (nameInput && urlInput) {
    nameInput.addEventListener('input', () => {
      const name = nameInput.value.trim();
      urlInput.value = name ? name.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-') : '';
    });
  }
</script>
@endsection
