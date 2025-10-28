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
        <h4>Add Blog</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
        <li class="breadcrumb-item active">Add Blog</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Blog Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">📰 Blog Information</div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Blog Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter blog title" required>
                </div>

                <div class="form-group">
                    <label>Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter blog slug (e.g. my-first-blog)" required>
                </div>

                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="author" class="form-control" placeholder="Enter author name">
                </div>

                <div class="form-group">
                    <label>Published Date</label>
                    <input type="date" name="published_date" class="form-control">
                </div>
                
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" placeholder="Brief blog summary">
                </div>

                <div class="form-group">
                    <label>Content / Full Description</label>
                    <textarea name="content" id="content" class="form-control" rows="8"></textarea>
                </div>
            </div>

            <!-- 🖼️ BLOG IMAGE -->
            <div class="col-lg-12">
               <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Blog Image</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" id="blog_image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp">
                                    <label class="custom-file-label" for="blog_image">Choose image</label>
                                </div>
                            </div>
                            <img id="imagePreview" class="preview-img" alt="Blog Image Preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Blog</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">Cancel</a>
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
    const blogImage = document.getElementById('blog_image');
    const imagePreview = document.getElementById('imagePreview');

    if (blogImage) {
        blogImage.addEventListener('change', function() {
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
});
</script>

<!-- ✅ CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<!-- ✅ Initialize CKEditor -->
<script>
    CKEDITOR.replace('content', {
        height: 300,
        removeButtons: 'PasteFromWord'
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.querySelector('input[name="title"]');
    const slugInput = document.querySelector('input[name="slug"]');

    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()                    // lowercase
                .replace(/[^a-z0-9\s-]/g, '')     // remove special chars
                .trim()                           // trim spaces
                .replace(/\s+/g, '-')             // replace spaces with dashes
                .replace(/-+/g, '-');             // remove multiple dashes

            slugInput.value = slug;
        });
    }
});
</script>

@endsection
