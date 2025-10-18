@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 320px;
        height: auto;
        margin-top: 10px;
        display: none;
        border: 2px solid #ccc;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="card-title mb-0">Edit Patient Education</h4>
      <a href="{{ route('admin.patient-education.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.patient-education.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Select Dropdown -->
        <div class="form-group mb-3">
          <label>Category <span class="text-danger">*</span></label>
          <select name="heading" class="form-control" required>
            <option value="" disabled>Select Category</option>
            <option value="Your Rights as a Patient" {{ $education->heading == 'Your Rights as a Patient' ? 'selected' : '' }}>Your Rights as a Patient</option>
            <option value="Your Responsibilities as a Patient" {{ $education->heading == 'Your Responsibilities as a Patient' ? 'selected' : '' }}>Your Responsibilities as a Patient</option>
          </select>
        </div>

        <!-- ✅ Dynamic Description Fields -->
        <div class="form-group mb-3">
          <label>Description(s) <span class="text-danger">*</span></label>
          <div id="descriptionWrapper">
            @php
              $descriptions = json_decode($education->description, true) ?? [];
            @endphp

            @foreach($descriptions as $desc)
              <div class="d-flex mb-2">
                <textarea name="descriptions[]" class="form-control me-2" rows="3" placeholder="Enter description">{{ $desc }}</textarea>
                <button type="button" class="btn btn-danger remove-field">-</button>
              </div>
            @endforeach

            @if(empty($descriptions))
              <div class="d-flex mb-2">
                <textarea name="descriptions[]" class="form-control me-2" rows="3" placeholder="Enter description"></textarea>
                <button type="button" class="btn btn-success add-description">+</button>
              </div>
            @endif
          </div>
          <button type="button" class="btn btn-success add-description mt-2">+ Add Description</button>
        </div>

        <!-- Buttons -->
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.patient-education.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const descriptionWrapper = document.getElementById('descriptionWrapper');

    descriptionWrapper.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-description')) {
            const div = document.createElement('div');
            div.classList.add('d-flex', 'mb-2');
            div.innerHTML = `
                <textarea name="descriptions[]" class="form-control me-2" rows="3" placeholder="Enter another description"></textarea>
                <button type="button" class="btn btn-danger remove-field">-</button>
            `;
            descriptionWrapper.appendChild(div);
        } else if (e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });
});
</script>
@endsection
