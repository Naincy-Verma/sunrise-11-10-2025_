@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add Time Slot</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.time-slots.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
          <label>Start Time <span class="text-danger">*</span></label>
          <input type="time" name="start_time" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>End Time <span class="text-danger">*</span></label>
          <input type="time" name="end_time" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.time-slots.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
