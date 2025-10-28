@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">{{ $faq->question }}</h4>
    </div>
    <div class="card-body">
      <p><strong>Answer:</strong></p>
      <p>{!! $faq->answer !!}</p>

      @if($faq->image && file_exists(public_path('admin-assets/images/admin-image/faqs/' . $faq->image)))
        <div class="mt-3">
          <img src="{{ asset('admin-assets/images/admin-image/faqs/' . $faq->image) }}" width="250" class="rounded border">
        </div>
      @endif

      <div class="mt-3">
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Back</a>
        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
</div>
@endsection
