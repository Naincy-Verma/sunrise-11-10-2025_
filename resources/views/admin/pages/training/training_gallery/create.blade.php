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
    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        background: #f1f5f9;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        margin-top: 15px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Add Training Gallery Images</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.training-gallery.index') }}">Training Gallery</a></li>
        <li class="breadcrumb-item active">Add Images</li>
      </ol>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Upload Gallery Images</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.training-gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="section-title mb-3">📸 Select Multiple Images</div>
        <div class="form-group">
            <input type="file" name="images[]" id="images" class="form-control" multiple accept=".jpg,.jpeg,.png,.webp" required>
            @error('images')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div id="preview" class="image-preview-container mt-3"></div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="{{ route('admin.training-gallery.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('images').addEventListener('change', function() {
    const previewContainer = document.getElementById('preview');
    previewContainer.innerHTML = "";
    for (const file of this.files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('preview-img');
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
