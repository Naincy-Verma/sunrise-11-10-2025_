@extends('admin.layouts.master')

@section('css')
<style>
.preview-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 10px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Course</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('specialties.index') }}">Courses</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Course</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Course Details</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('specialities.update', $speciality->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Title -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $speciality->title) }}" placeholder="Enter title" required>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $speciality->slug) }}" placeholder="Will be generated automatically" readonly>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Enter description">{{ old('description', $speciality->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Upload Image</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form custom_file_input">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image" class="custom-file-input" accept=".jpg,.jpeg,.png">
                                                <label class="custom-file-label">Choose image</label>
                                            </div>
                                        </div>
                                        <img id="imagePreview" class="preview-img" alt="Image Preview" 
                                             src="{{ $speciality->image ? asset($speciality->image) : '' }}" 
                                             style="{{ $speciality->image ? 'display:block;' : 'display:none;' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Icon Upload -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
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
                                                <input type="file" name="icon" id="icon" class="custom-file-input" accept=".jpg,.jpeg,.png,.svg">
                                                <label class="custom-file-label">Choose icon</label>
                                            </div>
                                        </div>
                                        <img id="iconPreview" class="preview-img" alt="Icon Preview" 
                                             src="{{ $speciality->icon ? asset($speciality->icon) : '' }}" 
                                             style="{{ $speciality->icon ? 'display:block;' : 'display:none;' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit/Cancel -->
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('specialities.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 250,
        removeButtons: 'PasteFromWord'
    });
</script>

{{-- Auto-generate slug --}}
<script>
    document.getElementById('title').addEventListener('keyup', function() {
        let title = this.value;
        let slug = title
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>

{{-- Image & Icon Preview --}}
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById('icon').addEventListener('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('iconPreview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
