@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit State</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.states.update', $state->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Country Dropdown -->
        <div class="form-group mb-3">
          <label>Select Country <span class="text-danger">*</span></label>
          <select name="country_id" class="form-control" required>
            @foreach($countries as $country)
              <option value="{{ $country->id }}" {{ $country->id == $state->country_id ? 'selected' : '' }}>
                {{ $country->name }}
              </option>
            @endforeach
          </select>
          @error('country_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- State Name -->
        <div class="form-group mb-3">
          <label>State Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $state->name) }}" required>
          @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.states.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
