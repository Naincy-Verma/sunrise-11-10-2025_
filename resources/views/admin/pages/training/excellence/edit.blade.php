@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4 class="card-title">Edit Excellence</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.excellences.update', $excellence->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Heading <span class="text-danger">*</span></label>
          <input type="text" name="heading" value="{{ old('heading', $excellence->heading) }}" class="form-control" required>
        </div>

        <div class="form-group mt-3">
          <label>Description <span class="text-danger">*</span></label>
          <textarea name="description" class="form-control" rows="5" required>{{ old('description', $excellence->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
          <label>Image (Optional)</label>
          <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
          @if($excellence->image)
            <div class="mt-2">
              <img src="{{ asset('admin-assets/images/admin-image/excellences/'.$excellence->image) }}" width="100" class="rounded">
            </div>
          @endif
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.excellences.index') }}" class="btn btn-light">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
