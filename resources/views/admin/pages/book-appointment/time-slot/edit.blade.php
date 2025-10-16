@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Time Slot</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.time-slots.update', $timeSlot->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
          <label>Start Time <span class="text-danger">*</span></label>
          <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $timeSlot->start_time) }}" required>
           @error('start_time')
        <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
          <label>End Time <span class="text-danger">*</span></label>
          <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $timeSlot->end_time) }}" required>
           @error('end_time')
         <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ $timeSlot->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $timeSlot->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.time-slots.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
