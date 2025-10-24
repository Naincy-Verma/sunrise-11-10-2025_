@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: none;
        border: 2px solid #ccc;
    }
    .section-title {
        font-weight: 600;
        font-size: 16px;
        background: #f1f5f9;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        margin-top: 15px;
    }
    hr {
        border-top: 2px dashed #ccc;
        margin: 25px 0;
    }
    .remove-btn {
        color: #fff;
        background-color: #dc3545;
        border: none;
        border-radius: 4px;
        padding: 3px 8px;
        font-size: 13px;
        cursor: pointer;
    }
    .add-btn {
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Header -->
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Add Package Section</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}">Package</a></li>
        <li class="breadcrumb-item active">Add Package</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Package Page Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-3">📄 Package Information</div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Heading <span class="text-danger">*</span></label>
                    <input type="text" name="heading" class="form-control" placeholder="Enter heading" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Tests <span class="text-danger">*</span></label>

                    <div id="tests-container">
                        <div class="input-group mb-2">
                            <input type="text" name="tests[]" class="form-control" placeholder="Enter test name" required>
                            <button type="button" class="remove-btn ms-2" onclick="removeTest(this)">×</button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-success add-btn" onclick="addTest()">+ Add Test</button>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Package</button>
            <a href="{{ route('admin.package.index') }}" class="btn btn-light">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    function addTest() {
        const container = document.getElementById('tests-container');
        const newInput = document.createElement('div');
        newInput.classList.add('input-group', 'mb-2');
        newInput.innerHTML = `
            <input type="text" name="tests[]" class="form-control" placeholder="Enter test name" required>
            <button type="button" class="remove-btn ms-2" onclick="removeTest(this)">×</button>
        `;
        container.appendChild(newInput);
    }

    function removeTest(button) {
        button.parentElement.remove();
    }
</script>
@endsection
