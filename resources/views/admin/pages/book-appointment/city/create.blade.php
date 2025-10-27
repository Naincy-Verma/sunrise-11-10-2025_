@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add City</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.cities.store') }}" method="POST">
        @csrf

        <!-- Country -->
        <div class="form-group mb-3">
            <label>Select Country <span class="text-danger">*</span></label>
            <select name="country_id" id="country" class="form-control" required 
                    data-states-url="{{ url('admin/get-states') }}">
                <option value="">-- Select Country --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- State -->
        <div class=" mb-3">
            <label>Select State <span class="text-danger">*</span></label>
            <select name="state_id" id="state" class="form-control" required>
                <option value="">-- Select State --</option>
            </select>
        </div>

        <!-- City Name -->
        <div class="form-group mb-3">
          <label>City Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" placeholder="Enter city name" required>
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.cities.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');

    countrySelect.addEventListener('change', async function () {
        const countryId = this.value;
        const baseUrl = this.dataset.statesUrl; // e.g. /admin/get-states
        const statesUrl = `${baseUrl}/${countryId}`;

        console.log('Fetching states from URL:', statesUrl);

        // Reset dropdown before loading
        stateSelect.innerHTML = '<option value="">-- Select State --</option>';

        if (!countryId) return;

        try {
            const response = await fetch(statesUrl);
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

            const states = await response.json();
            console.log('Received states data:', states);

            // If no states found
            if (!Array.isArray(states) || states.length === 0) {
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'No states available';
                stateSelect.appendChild(option);
                return;
            }

            // Append options dynamically
            states.forEach(state => {
                const option = document.createElement('option');
                option.value = state.id;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });

            console.log('All states appended:', stateSelect.innerHTML);

            // ✅ Refresh UI if you're using a plugin (like Select2 or Bootstrap Select)
            if (window.jQuery) {
                if ($('#state').hasClass('select2-hidden-accessible')) {
                    $('#state').trigger('change.select2');
                } else if ($('#state').data('selectpicker')) {
                    $('#state').selectpicker('refresh');
                }
            }

        } catch (error) {
            console.error('Error fetching states:', error);
        }
    });
});
</script>
@endsection
