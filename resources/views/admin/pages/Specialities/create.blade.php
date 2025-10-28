@extends('admin.layouts.master')

@section('css')
<style>
.preview-img {
    width: 100%;
    max-width: 150px;
    height: auto;
    border-radius: 10px;
    margin-top: 10px;
    display: none;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add Specialities</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Specialities</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Specialities</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Courses Details</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.specialities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Slug </label>
                                <input type="text" name="slug" id="slug" class="form-control"  placeholder="url" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Enter description"></textarea>
                            </div>
                        </div>
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
                                        <img id="imagePreview" class="preview-img" alt="Image Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <img id="iconPreview" class="preview-img" alt="Icon Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.specialities.index') }}" class="btn btn-light">Cancel</a>
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

    {{-- Image preview --}}
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
@section('script')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection