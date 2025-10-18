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
        <h4>Add About Section</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About</a></li>
        <li class="breadcrumb-item active">Add About</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">About Page Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">📄 About Information</div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Heading <span class="text-danger">*</span></label>
                    <input type="text" name="heading" class="form-control" placeholder="Enter heading" required>
                </div>

                <div class="form-group">
                    <label>Slug (auto-generated)</label>
                    <input type="text" class="form-control" placeholder="Generated automatically" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="6" placeholder="Write a short description..." required></textarea>
                </div>
            </div>

            <!-- 🖼️ ABOUT IMAGE -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">About Main Image</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" id="about_image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp" required>
                                    <label class="custom-file-label" for="about_image">Choose image</label>
                                </div>
                            </div>
                            <img id="imagePreview" class="preview-img" alt="About Image Preview">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🖼️ Small IMAGE 1 -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Small Image 1</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_small1" id="image_small1" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp" required>
                                    <label class="custom-file-label" for="image_small1">Choose image</label>
                                </div>
                            </div>
                            <img id="imagePreviewSmall1" class="preview-img" alt="About Small Image 1 Preview">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🖼️ Small IMAGE 2 -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Small Image 2</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_small2" id="image_small2" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp" required>
                                    <label class="custom-file-label" for="image_small2">Choose image</label>
                                </div>
                            </div>
                            <img id="imagePreviewSmall2" class="preview-img" alt="About Small Image 2 Preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save About</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- ✅ Image Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const aboutImage = document.getElementById('about_image');
    const imagePreview = document.getElementById('imagePreview');

    if (aboutImage) {
        aboutImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);

                const label = this.nextElementSibling;
                if(label) label.textContent = file.name;
            }
        });
    }

    // Small Image 1 preview
    const smallImage1 = document.getElementById('image_small1');
    const smallPreview1 = document.getElementById('imagePreviewSmall1');
    if (smallImage1) {
        smallImage1.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    smallPreview1.src = e.target.result;
                    smallPreview1.style.display = 'block';
                }
                reader.readAsDataURL(file);
                this.nextElementSibling.textContent = file.name;
            }
        });
    }

    // Small Image 2 preview
    const smallImage2 = document.getElementById('image_small2');
    const smallPreview2 = document.getElementById('imagePreviewSmall2');
    if (smallImage2) {
        smallImage2.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    smallPreview1.src = e.target.result;
                    smallPreview1.style.display = 'block';
                }
                reader.readAsDataURL(file);
                this.nextElementSibling.textContent = file.name;
            }
        });
    }
});
</script>
@endsection
