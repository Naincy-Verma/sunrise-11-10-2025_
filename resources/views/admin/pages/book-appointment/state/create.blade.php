@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add State</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.states.store') }}" method="POST">
        @csrf

        <!-- Country Dropdown -->
        <div class="form-group mb-3">
          <label>Select Country <span class="text-danger">*</span></label>
          <select name="country_id" class="form-control" required>
            <option value="">-- Select Country --</option>
            @foreach($countries as $country)
              <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
          </select>
          @error('country_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- State Name -->
        <div class="form-group mb-3">
          <label>State Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" placeholder="Enter state name" required>
          @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.states.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
