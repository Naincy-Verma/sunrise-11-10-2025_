@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add Gallery Images</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Upload Gallery Images for Community Events</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.community-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="community_event_id" value="{{ $event_id }}">
                <div class="form-group mt-3">
                    <label>Gallery Images <span class="text-danger">*</span></label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                </div>

                <div class="form-group mt-3">
                    <label>Caption (optional)</label>
                    <input type="text" name="caption" class="form-control" placeholder="Enter caption for images">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Upload Gallery</button>
                <a href="{{ route('admin.community-gallery.index') }}" class="btn btn-light mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
