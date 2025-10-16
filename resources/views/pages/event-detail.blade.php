@extends('layout.master')

@section('css')
    <style>
        /* Gallery Styles */
        .gallery-container {
            padding: 50px 0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 5px;
            overflow: hidden;
            cursor: pointer;
            background: white;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .25);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--medium-teal), var(--medium-blue));
            opacity: 0;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .plus-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .plus-icon:hover {
            background: var(--primary-teal);
            transform: scale(1.1);
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css"/>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h5>Event Detail</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Event Detail</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Gallery -->
    <section class="gallery-container">
        <div class="container">
            <h2 class="text-center">Event Gallery</h2>
            <p class="text-center text-muted mb-4">Explore moments from our previous medical summits and conferences</p>
            <div class="gallery-grid">
                    @forelse($galleries as $gallery)
                    <a href="{{ asset('admin-assets/images/admin-image/community-events/gallery/' . $gallery->images) }}" data-fancybox="gallery" data-caption="Medical Conference Hall" class="gallery-item">
                        <img src="{{ asset('admin-assets/images/admin-image/community-events/gallery/'.$gallery->images) }}" alt="Conference Hall">
                        <div class="gallery-overlay">
                            <span class="plus-icon">+</span>
                        </div>
                    </a>
                @empty
                    <p class="text-muted">No gallery images found for this event.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox='gallery']", {
            Toolbar: {
                display: [
                    { id: "counter", position: "center" }, // shows image count
                    "close" // shows the close button
                ]
            },
            closeButton: "outside" // show close button in top right (outside image)
        });
    </script>
@endsection
