@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #ccc;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Rare Case</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.rare-cases.index') }}">Rare Cases</a></li>
                <li class="breadcrumb-item active">Edit Rare Case</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Rare Case Details</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rare-cases.update', $case->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Case Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ $case->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Source</label>
                            <input type="text" name="source" class="form-control" value="{{ $case->source }}">
                        </div>
                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" name="short_description" class="form-control" value="{{ $case->short_description }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control" rows="8">{{ $case->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Case Image</label>
                            <input type="file" name="image" id="case_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                            @if($case->image)
                                <img id="imagePreview" src="{{ asset('admin-assets/images/admin-image/rare-cases/'.$case->image) }}" class="preview-img" alt="Case Image">
                            @else
                                <img id="imagePreview" class="preview-img" style="display:none;">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update Rare Case</button>
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
