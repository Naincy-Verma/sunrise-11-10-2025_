@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4 class="card-title">Add Training Program</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.training_program.store') }}" method="POST">
        @csrf
        <!-- <div class="form-group">
          <label>S.No <span class="text-danger">*</span></label>
          <input type="number" name="s_no" class="form-control" placeholder="Enter serial number" required>
        </div> -->
        <div class="form-group mt-3">
          <label>Training Course <span class="text-danger">*</span></label>
          <input type="text" name="training_course" class="form-control" placeholder="Enter course name" required>
        </div>
        <div class="form-group mt-3">
          <label>Duration <span class="text-danger">*</span></label>
          <input type="text" name="duration" class="form-control" placeholder="Enter duration" required>
        </div>
        <div class="form-group mt-3">
          <label>Schedule <span class="text-danger">*</span></label>
          <input type="text" name="schedule" class="form-control" placeholder="Enter schedule" required>
        </div>
        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ route('admin.training_program.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
