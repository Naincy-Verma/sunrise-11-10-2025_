@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Country</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
          <label>Country Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $country->name) }}" required>
          @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.countries.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
