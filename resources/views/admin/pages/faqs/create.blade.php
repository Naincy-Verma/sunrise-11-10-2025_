@extends('admin.layouts.master')

@section('css')
<style>
    /* Image preview styling */
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
    <div class="card-header">
      <h4 class="card-title">Add FAQ</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.faqs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Question -->
        <div class="form-group">
          <label>Question <span class="text-danger">*</span></label>
          <input type="text" name="question" class="form-control" placeholder="Enter question" required>
        </div>

        <!-- Answer -->
        <div class="form-group">
          <label>Answer <span class="text-danger">*</span></label>
          <textarea name="answer" class="form-control" rows="5" placeholder="Enter answer" required></textarea>
        </div>

        <!-- ✅ Image Upload with Preview -->
        <div class="col-lg-12">
          <div class="card mt-3">
            <div class="card-header">
              <h4 class="card-title">FAQ Image</h4>
            </div>
            <div class="card-body">
              <div class="basic-form custom_file_input">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" id="faq_image" class="custom-file-input" accept=".jpg,.jpeg,.png,.webp">
                    <label class="custom-file-label" for="faq_image">Choose image</label>
                  </div>
                </div>
                <img id="imagePreview" class="preview-img" alt="FAQ Image Preview">
              </div>
            </div>
          </div>
        </div>

        <!-- Buttons -->
        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqImage = document.getElementById('faq_image');
    const imagePreview = document.getElementById('imagePreview');

    if (faqImage) {
        faqImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                imagePreview.src = url;
                imagePreview.style.display = 'block';

                const label = this.nextElementSibling;
                if (label) label.textContent = file.name;
            } else {
                imagePreview.style.display = 'none';
            }
        });
    }
});
</script>
@endsection
