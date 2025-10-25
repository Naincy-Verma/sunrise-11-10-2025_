@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add Specialized Course</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.specialized_course.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
          <label>Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="form-group mb-3">
          <label>Sub Title</label>
          <input type="text" name="sub_title" class="form-control" placeholder="Enter sub title">
        </div>

        <div class="form-group mb-3">
          <label>Badge Label</label>
          <input type="text" name="badge_label" class="form-control" placeholder="Enter badgle label ( popular, premium )" required>
        </div>

        <div class="form-group mb-3">
          <label>Price</label>
          <input type="number" name="price" step="0.01" class="form-control" placeholder="Enter price" required>
        </div>

        <!-- ✅ Dynamic Features -->
        <div class="form-group mb-3">
          <label>Features</label>
          <div id="features-wrapper">
            <div class="feature-input mb-2">
              <input type="text" name="features[]" class="form-control mb-2" placeholder="Enter feature" required>
            </div>
          </div>
          <button type="button" id="add-feature" class="btn btn-secondary btn-sm">Add Feature</button>
        </div>

        <div class="form-group mb-3">
          <label>Button Text</label>
          <input type="text" name="button_text" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
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
});
</script>
@endsection
