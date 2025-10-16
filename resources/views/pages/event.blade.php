@extends('layout.master')
@section('css')
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5>Sunrise Hospital: Where Care Meets Community</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Sunrise Hospital: Where Care Meets Community</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

 <section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($events as $event)
                <div class="col-md-4 col-lg-4 mb-4">
                    <div class="card rare-card">
                        <img src="{{ asset('admin-assets/images/admin-image/community-events/' . $event->image) }}" 
                             alt="{{ $event->title }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="rare-card-body">
                            <h5 class="truncate-heading">{{ $event->title }}</h5>
                            <p class="truncate-text">{{ $event->short_description }}</p>
                            <a href="{{ url('event/' . $event->slug) }}" class="btn-read">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No events found.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Truncate paragraph text to 14 words
            document.querySelectorAll(".truncate-text").forEach(function (el) {
                let words = el.innerText.trim().split(" ");
                if (words.length > 12) {
                    el.innerText = words.slice(0, 12).join(" ") + "...";
                }
            });
        });
    </script>
@endsection
