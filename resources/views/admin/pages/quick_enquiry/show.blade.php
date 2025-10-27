@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Quick Enquiry Details</h4>
      <a href="{{ route('admin.quick-enquiries.index') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-arrow-left"></i> Back
      </a>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="fw-bold">Name:</label>
          <p class="text-muted">{{ $enquiry->name }}</p>
        </div>

        <div class="col-md-6 mb-3">
          <label class="fw-bold">Mobile Number:</label>
          <p class="text-muted">{{ $enquiry->mobile_number }}</p>
        </div>

        <div class="col-md-6 mb-3">
          <label class="fw-bold">Preferred Time Slot:</label>
          <p class="text-muted">
            @if ($enquiry->timeSlot)
              {{ \Carbon\Carbon::parse($enquiry->timeSlot->start_time)->format('g:i A') }}
              -
              {{ \Carbon\Carbon::parse($enquiry->timeSlot->end_time)->format('g:i A') }}
            @else
              N/A
            @endif
          </p>
        </div>

        <div class="col-md-6 mb-3">
          <label class="fw-bold">Status:</label>
          <p class="text-muted">
            {{ $enquiry->timeSlot ? ucfirst($enquiry->timeSlot->status) : 'N/A' }}
          </p>
        </div>

        <div class="col-md-6 mb-3">
          <label class="fw-bold">Created At:</label>
          <p class="text-muted">{{ $enquiry->created_at->format('d M Y, h:i A') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
