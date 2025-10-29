@extends('admin.layouts.master')

@section('css')
{{-- Optional custom styling --}}
<style>
    .card {
        border-radius: 12px;
    }
    .list-group-item {
        border-radius: 8px;
        transition: background 0.3s ease;
    }
    .list-group-item:hover {
        background: #eaf4ff;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

  <div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">{{ $education->heading }}</h4>
      <a href="{{ route('admin.patient-education.index') }}" class="btn btn-light btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Back
      </a>
    </div>

    <div class="card-body">
        @if($allEducations->count())
            <div class="row">
                @foreach($allEducations as $edu)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                {{-- Show heading if there are multiple categories --}}
                                <h6 class="fw-bold text-primary mb-3">{{ $edu->heading }}</h6>

                                @if(is_array($edu->description))
                                    <ul class="list-group list-group-flush">
                                        @foreach($edu->description as $point)
                                            <li class="list-group-item bg-light border-0 ps-3 py-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                {{ $point }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted mb-0">No details available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted text-center mb-0">No descriptions found.</p>
        @endif
    </div>
  </div>

</div>
@endsection
