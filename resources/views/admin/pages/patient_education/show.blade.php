@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

  <div class="card mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">{{ $education->heading }}</h4>
      <a href="{{ route('admin.patient-education.index') }}" class="btn btn-light btn-sm">Back</a>
    </div>

    <div class="card-body">
        @if($allEducations->count())
            <div class="row">
                @foreach($allEducations as $edu)
                    <div class="col-md-6 mb-3">
                        <div class="p-3 border rounded bg-light">{{ $edu->description }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No descriptions found.</p>
        @endif
    </div>
  </div>

</div>
@endsection
