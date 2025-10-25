@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Specialized Course</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.specialized_course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
          <label>Title</label>
          <input type="text" name="title" value="{{ $course->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Sub Title</label>
          <input type="text" name="sub_title" value="{{ $course->sub_title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Badge Label</label>
          <input type="text" name="badge_label" value="{{ $course->badge_label }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Price</label>
          <input type="number" name="price" step="0.01" value="{{ $course->price }}" class="form-control" required>
        </div>

        <!-- ✅ Dynamic Features for Edit -->
        <div class="form-group mb-3">
          <label>Features</label>
          <div id="features-wrapper">
            @foreach($course->features as $feature)
              <div class="feature-input mb-2">
                <input type="text" name="features[]" class="form-control mb-2" value="{{ $feature }}" required>
                <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
              </div>
            @endforeach
          </div>
          <button type="button" id="add-feature" class="btn btn-secondary btn-sm">Add Feature</button>
        </div>

        <div class="form-group mb-3">
          <label>Button Text</label>
          <input type="text" name="button_text" value="{{ $course->button_text }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ $course->status=='active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $course->status=='inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.specialized_course.index') }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('features-wrapper');
    const addBtn = document.getElementById('add-feature');

    addBtn.addEventListener('click', function () {
        const div = document.createElement('div');
        div.classList.add('feature-input', 'mb-2');
        div.innerHTML = `
            <input type="text" name="features[]" class="form-control mb-2" placeholder="Enter feature" required>
            <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
        `;
        wrapper.appendChild(div);

        div.querySelector('.remove-feature').addEventListener('click', function () {
            div.remove();
        });
    });

    // Remove existing feature
    document.querySelectorAll('.remove-feature').forEach(btn => {
        btn.addEventListener('click', function () {
            this.closest('.feature-input').remove();
        });
    });
});
</script>
@endsection
