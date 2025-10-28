@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit FAQ</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Question <span class="text-danger">*</span></label>
          <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Answer <span class="text-danger">*</span></label>
          <textarea name="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="form-group">
          <label>FAQ Image (Optional)</label>
          <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
          @if($faq->image)
            <div class="mt-2">
              <img src="{{ asset('admin-assets/images/admin-image/faqs/' . $faq->image) }}" width="100" class="rounded">
            </div>
          @endif
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
