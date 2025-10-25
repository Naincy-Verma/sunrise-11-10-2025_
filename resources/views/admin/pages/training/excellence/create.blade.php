@extends('admin.layouts.master')

@section('css')
<style>
.preview-img { width: 320px; height: auto; margin-top: 10px; display: none; border: 2px solid #ccc; border-radius: 10px; }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4 class="card-title">Add Excellence</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.excellences.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label>Heading <span class="text-danger">*</span></label>
          <input type="text" name="heading" class="form-control" placeholder="Enter heading" required>
        </div>

        <div class="form-group mt-3">
          <label>Description <span class="text-danger">*</span></label>
          <textarea name="description" class="form-control" rows="5" placeholder="Enter description" required></textarea>
        </div>

        <div class="form-group mt-3">
          <label>Image</label>
          <input type="file" name="image" id="excellence_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
          <img id="imagePreview" class="preview-img" alt="Excellence Image Preview">
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.excellences.index') }}" class="btn btn-light">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('excellence_image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput?.addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }
    });
});
</script>
@endsection
