@extends('layout.master')
@section('content')
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Rare Cases & Medical Breakthroughs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="rare-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Rare Cases & Medical Breakthroughs</h2>
                <p>
                    At Sunrise Hospital, South Delhi, our internationally trained doctors handle rare medical cases and
                    deliver innovative gynecology, IVF, and minimally invasive treatments. Patients from India and abroad
                    trust us for cutting-edge healthcare solutions.
                </p>
            </div>

            <!-- Swiper -->
            <div class="swiper myRareSwiper">
                <div class="swiper-wrapper">
                    @foreach($cases as $case)
                        <div class="swiper-slide">
                            <div class="card rare-card">
                                <img src="{{ asset('admin-assets/images/admin-image/rare-cases/' . $case->image) }}"
                                    alt="{{ $case->title }}" />
                                <div class="rare-card-body">
                                    <h5 class="truncate-heading">{{ $case->title }}</h5>
                                    <p class="truncate-text">{{ $case->short_description }}</p>
                                    <a href="{{ $case->source }}" target="_blank" class="btn-read">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Swiper Controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

@endsection