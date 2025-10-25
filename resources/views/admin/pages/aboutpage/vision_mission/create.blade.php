@extends('admin.layouts.master')

@section('css')
<style>
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
</style>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Header -->
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Add Vision & Mission</h4>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-sm-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.vision-mission.index') }}">Vision & Mission</a></li>
        <li class="breadcrumb-item active">Add Vision & Mission</li>
      </ol>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Vision & Mission Details</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.vision-mission.store') }}" method="POST">
        @csrf

        <!-- VISION SECTION -->
       
        <div class="row">
          <div class="col-md-6">
             <div class="section-title mb-3">🌟 Vision Section</div>
            <div class="form-group">
              <label>Vision Icon <span class="text-danger">*</span></label>
              <input type="text" name="icon_vission" class="form-control" placeholder="e.g. la la-eye" required>
            </div>

            <div class="form-group">
              <label>Vision Heading <span class="text-danger">*</span></label>
              <input type="text" name="heading_vission" class="form-control" placeholder="e.g. Our Vision" required>
            </div>
            <div class="form-group">
              <label>Vision Description <span class="text-danger">*</span></label>
              <textarea name="vission_description" class="form-control" rows="5" placeholder="Write vision description..." required></textarea>
            </div>
          </div>
        
          <div class="col-md-6">
            <div class="section-title mb-3">🎯 Mission Section</div>
            <div class="form-group">
              <label>Mission Icon <span class="text-danger">*</span></label>
              <input type="text" name="icon_mission" class="form-control" placeholder="e.g. la la-handshake" required>
            </div>

            <div class="form-group">
              <label>Mission Heading <span class="text-danger">*</span></label>
              <input type="text" name="heading_mission" class="form-control" placeholder="e.g. Our Mission" required>
            </div>
             <div class="form-group">
              <label>Mission Description <span class="text-danger">*</span></label>
              <textarea name="mission_description" class="form-control" rows="5" placeholder="Write mission description..." required></textarea>
            </div>
          </div>
        </div>
        <hr>

        <!-- STATS SECTION -->
        <div class="section-title mb-3">📊 Stats Section</div>
        <div id="statsContainer">
          <div class="row mb-3 stat-item">
            <div class="col-md-5">
              <input type="text" name="stats[0][label]" class="form-control" placeholder="Label (e.g. Years of Excellence)" required>
            </div>
            <div class="col-md-5">
              <input type="text" name="stats[0][value]" class="form-control" placeholder="Value (e.g. 15+)" required>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-danger removeStat">Remove</button>
            </div>
          </div>
        </div>
        <button type="button" id="addStat" class="btn btn-sm btn-success mb-3">+ Add Stat</button>

        <!-- Submit Buttons -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Vision & Mission</button>
            <a href="{{ route('admin.vision-mission.index') }}" class="btn btn-light">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  let statIndex = 1;
  document.getElementById('addStat').addEventListener('click', function() {
      const container = document.getElementById('statsContainer');
      const newStat = document.createElement('div');
      newStat.classList.add('row', 'mb-3', 'stat-item');
      newStat.innerHTML = `
          <div class="col-md-5">
              <input type="text" name="stats[${statIndex}][label]" class="form-control" placeholder="Label (e.g. Expert Gynecologists)" required>
          </div>
          <div class="col-md-5">
              <input type="text" name="stats[${statIndex}][value]" class="form-control" placeholder="Value (e.g. 20+)" required>
          </div>
          <div class="col-md-2">
              <button type="button" class="btn btn-danger removeStat">Remove</button>
          </div>
      `;
      container.appendChild(newStat);
      statIndex++;
  });

  document.addEventListener('click', function(e) {
      if (e.target.classList.contains('removeStat')) {
          e.target.closest('.stat-item').remove();
      }
  });
</script>
@endsection
