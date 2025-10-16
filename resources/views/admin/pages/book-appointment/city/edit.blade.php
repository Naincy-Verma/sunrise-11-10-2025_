@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit City</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Country -->
        <div class="form-group mb-3">
          <label>Select Country <span class="text-danger">*</span></label>
          <select name="country_id" id="country" class="form-control" required>
            <option value="">-- Select Country --</option>
            @foreach($countries as $country)
              <option value="{{ $country->id }}" {{ $city->state->country_id == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- State -->
        <div class="form-group mb-3">
          <label>Select State <span class="text-danger">*</span></label>
          <select name="state_id" id="state" class="form-control" required>
            <option value="">-- Select State --</option>
            @foreach($city->state->country->states as $state)
              <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>
                {{ $state->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- City Name -->
        <div class="form-group mb-3">
          <label>City Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ $city->name }}" required>
        </div>

        <!-- Buttons -->
        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.cities.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');

    countrySelect.addEventListener('change', function() {
        let countryId = this.value;

        fetch(`/admin/get-states/${countryId}`)
            .then(response => response.json())
            .then(data => {
                stateSelect.innerHTML = '<option value="">-- Select State --</option>';
                data.forEach(state => {
                    stateSelect.innerHTML += `<option value="${state.id}">${state.name}</option>`;
                });
            })
            .catch(error => console.error('Error fetching states:', error));
    });
});
</script>
@endsection
