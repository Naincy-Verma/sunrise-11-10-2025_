@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h4 class="card-title">Edit Training Program</h4></div>
    <div class="card-body">
      <form action="{{ route('admin.training_program.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- <div class="form-group">
          <label>S.No <span class="text-danger">*</span></label>
          <input type="number" name="s_no" value="{{ old('s_no', $program->s_no) }}" class="form-control" required>
        </div> -->
        <div class="form-group mt-3">
          <label>Training Course <span class="text-danger">*</span></label>
          <input type="text" name="training_course" value="{{ old('training_course', $program->training_course) }}" class="form-control" required>
        </div>
        <div class="form-group mt-3">
          <label>Duration <span class="text-danger">*</span></label>
          <input type="text" name="duration" value="{{ old('duration', $program->duration) }}" class="form-control" required>
        </div>
        <div class="form-group mt-3">
          <label>Schedule <span class="text-danger">*</span></label>
          <input type="text" name="schedule" value="{{ old('schedule', $program->schedule) }}" class="form-control" required>
        </div>
        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.training_program.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
