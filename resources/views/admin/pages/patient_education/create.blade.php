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
      <h4 class="card-title mb-0">Add Patient Education</h4>
      <a href="{{ route('admin.patient-education.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.patient-education.store') }}" method="POST">
        @csrf

        <!-- Select Dropdown -->
        <div class="form-group mb-3">
          <label>Category <span class="text-danger">*</span></label>
          <select name="heading" class="form-control" required>
            <option value="" disabled selected>Select Category</option>
            <option value="Your Rights as a Patient">Your Rights as a Patient</option>
            <option value="Your Responsibilities as a Patient">Your Responsibilities as a Patient</option>
          </select>
        </div>

        <!-- ✅ Dynamic Description Fields -->
        <div class="form-group mb-3">
          <label>Description(s) <span class="text-danger">*</span></label>
          <div id="descriptionWrapper">
            <div class="d-flex mb-2">
              <textarea name="descriptions[]" class="form-control me-2" rows="3" placeholder="Enter description"></textarea>
              <button type="button" class="btn btn-success add-description">+</button>
            </div>
          </div>
        </div>

        <!-- Buttons -->
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Save</button>
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
