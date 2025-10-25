@extends('admin.layouts.master')

@section('css')
<style>
    .preview-icon {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: block;
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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Vision & Mission</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-sm-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.vision-mission.index') }}">Vision & Mission</a></li>
                <li class="breadcrumb-item active">Edit Vision & Mission</li>
            </ol>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Vision & Mission Details</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.vision-mission.update', $vision->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- VISION SECTION -->
                    <div class="col-md-6">
                        <div class="section-title mb-3">🌟 Vision Section</div>

                        <div class="form-group">
                            <label>Vision Icon <span class="text-danger">*</span></label>
                            <input type="text" name="icon_vission" class="form-control"
                                value="{{ old('icon_vission', $vision->icon_vission) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Vision Heading <span class="text-danger">*</span></label>
                            <input type="text" name="heading_vission" class="form-control"
                                value="{{ old('heading_vission', $vision->heading_vission) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Vision Description <span class="text-danger">*</span></label>
                            <textarea name="vission_description" class="form-control" rows="5" required>{{ old('vission_description', $vision->vission_description) }}</textarea>
                        </div>
                    </div>

                    <!-- MISSION SECTION -->
                    <div class="col-md-6">
                        <div class="section-title mb-3">🎯 Mission Section</div>

                        <div class="form-group">
                            <label>Mission Icon <span class="text-danger">*</span></label>
                            <input type="text" name="icon_mission" class="form-control"
                                value="{{ old('icon_mission', $vision->icon_mission) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Mission Heading <span class="text-danger">*</span></label>
                            <input type="text" name="heading_mission" class="form-control"
                                value="{{ old('heading_mission', $vision->heading_mission) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Mission Description <span class="text-danger">*</span></label>
                            <textarea name="mission_description" class="form-control" rows="5" required>{{ old('mission_description', $vision->mission_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- STATS SECTION -->
                <div class="section-title mb-3">📊 Stats Section</div>
                <div id="statsContainer">
                    @php
                        $stats = json_decode(old('stats', $vision->stats), true) ?? [];
                    @endphp

                    @if(count($stats) > 0)
                        @foreach($stats as $index => $stat)
                            <div class="row mb-3 stat-item">
                                <div class="col-md-5">
                                    <input type="text" name="stats[{{ $index }}][label]" class="form-control"
                                        value="{{ $stat['label'] ?? '' }}" placeholder="Label (e.g., Years of Excellence)" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="stats[{{ $index }}][value]" class="form-control"
                                        value="{{ $stat['value'] ?? '' }}" placeholder="Value (e.g., 15+)" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger removeStat">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row mb-3 stat-item">
                            <div class="col-md-5">
                                <input type="text" name="stats[0][label]" class="form-control"
                                    placeholder="Label (e.g., Years of Excellence)" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="stats[0][value]" class="form-control"
                                    placeholder="Value (e.g., 15+)" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger removeStat">Remove</button>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" id="addStat" class="btn btn-sm btn-success mb-3">+ Add Stat</button>

                <!-- Submit Buttons -->
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update Vision & Mission</button>
                    <a href="{{ route('admin.vision-mission.index') }}" class="btn btn-light">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
let statIndex = {{ count($stats) }};
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
