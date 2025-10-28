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
        <h4>Add Rare Case</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rare-cases.index') }}">Rare Cases</a></li>
        <li class="breadcrumb-item active">Add Rare Case</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Rare Case Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.rare-cases.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- 🏥 CASE BASIC INFO -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">🏥 Basic Information</div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Case Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter rare case title" required>
                </div>
                <div class="form-group">
                    <label>Source</label>
                    <input type="text" name="source" class="form-control" placeholder="Source or reference">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" placeholder="Brief case summary">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control" rows="8" placeholder="Detailed case description"></textarea>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Icon</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form custom_file_input">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" id="case_image" name="image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp,.svg">
                        <label class="custom-file-label">Choose icon</label>
                      </div>
                    </div>
                    <img id="imagePreview" class="preview-img" alt="Case Preview">
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Rare Case</button>
            <a href="{{ route('admin.rare-cases.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const caseImage = document.getElementById('case_image');
    const imagePreview = document.getElementById('imagePreview');
    if (caseImage) {
        caseImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endsection
