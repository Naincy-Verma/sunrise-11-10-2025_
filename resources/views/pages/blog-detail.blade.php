@extends('layout.master')
@section('css')
    <style>
        .blog-content {
            position: relative;
            z-index: 10;
        }

        .featured-image {
            width: 100%;
        }
        .content-body h3 {
            color: #003366;
            font-weight: 600;
            font-size: 20px;
            margin: 1.5rem 0 1rem;
        }
        .content-body ul, .content-body ol {
            margin-bottom: 1.5rem;
            padding-left: 1rem;
        }

        .content-body li {
            margin-bottom: 0.5rem;
            font-size: 16px;
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(36,162,205, 0.05) 0%, rgba(0,151,167, 0.05) 100%);
            border-left: 4px solid rgb(36,162,205);
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 0 10px 10px 0;
        }

        .tags-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f8f9fa;
        }

        .tag {
            background: rgba(36,162,205, 0.1);
            color: rgb(36,162,205);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 0.25rem;
            transition: all 0.3s ease;
        }

        .tag:hover {
            background: rgb(36,162,205);
            color: white;
            transform: translateY(-2px);
        }

        .sidebar {
            padding-left: 2rem;
        }

        .sidebar-widget {
            background: white;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 1px 4px 0 rgba(34, 34, 34, .302);
            transition: transform 0.3s ease;
        }

        .sidebar-widget:hover {
            transform: translateY(-3px);
        }

        .widget-title {
            color: #003366;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, rgb(0 51 102) 0%, rgb(0 51 102) 100%);
            border-radius: 2px;
        }

        .related-post {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #d9e0e6;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }
        .related-post:last-child {
            border-bottom: none;
        }

        .related-post-img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .related-post-content h6 {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 0.25rem;
            line-height: 1.3;
            color: #003366;
        }

        .related-post-date {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .share-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            color: white;
        }

        .share-facebook { background: #3b5998; }
        .share-twitter { background: #1da1f2; }
        .share-linkedin { background: #0077b5; }
        .share-whatsapp { background: #25d366; }

        .cta-section {
            background: linear-gradient(135deg, rgb(36,162,205) 0%, rgb(0,151,167) 100%);
            color: white;
            padding: 3rem;
            border-radius: 15px;
            text-align: center;
            margin: 2rem 0;
        }

        .cta-btn {
            background: white;
            color: rgb(36,162,205);
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            color: rgb(36,162,205);
        }

        @media (max-width: 768px) {
            .blog-title {
                font-size: 1.8rem;
            }

            .content-body {
                padding: 2rem 1.5rem;
            }

            .sidebar {
                padding-left: 0;
                margin-top: 2rem;
            }

            .blog-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
@endsection
@section('content')
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
                <div class="col-lg-8">
                    <article class="blog-content">
                        <!-- Featured Image -->
                        <img src="{{ asset('admin-assets/images/admin-image/blogs/' . $blog->image) }}" 
                            alt="{{ $blog->title }}" class="featured-image">

                        <div class="content-body mt-4">
                            <h1>{{ $blog->title }}</h1>

                            {!! $blog->content !!}  
                            {{-- Use {!! !!} if content has HTML --}}
                            
                            {{-- Optional: If you have a short description --}}
                            {{-- <p>{{ $blog->short_description }}</p> --}}
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Related Posts Widget -->
                        <div class="sidebar-widget">
                            <h5 class="widget-title">Related Blog</h5>

                            <a href="#" class="related-post">
                                <img src="https://www.sunrisehospitals.in/wp-content/uploads/2025/04/Pregnancy-Specialist-in-Delhi-1024x576.webp" alt="PCOS" class="related-post-img">
                                <div class="related-post-content">
                                    <h6>Pregnancy Specialist in Delhi at Sunrise Hospital with Dr. Nikita Trehan</h6>
                                    <div class="related-post-date">Jan 28, 2024</div>
                                </div>
                            </a>

                            <a href="#" class="related-post">
                                <img src="https://www.sunrisehospitals.in/wp-content/uploads/2023/08/dr-nikita-trehan-1-464x487-1.jpg%22" alt="Pregnancy" class="related-post-img">
                                <div class="related-post-content">
                                    <h6>Health Concern for Women and Best Endometriosis Treatment in Delhi</h6>
                                    <div class="related-post-date">Jan 15, 2024</div>
                                </div>
                            </a>

                            <a href="#" class="related-post">
                                <img src="https://www.sunrisehospitals.in/wp-content/uploads/2023/11/images-2.jpeg" alt="Menopause" class="related-post-img">
                                <div class="related-post-content">
                                    <h6>Can Endometriosis Get Worse with Age and best Endometriosis Treatment in Delhi?</h6>
                                    <div class="related-post-date">Jan 8, 2024</div>
                                </div>
                            </a>
                        </div>

                        <!-- Categories Widget -->
{{--                        <div class="sidebar-widget">--}}
{{--                            <h5 class="widget-title">Categories</h5>--}}
{{--                            <div class="d-flex flex-column gap-2">--}}
{{--                                <a href="#" class="tag">Women's Health (15)</a>--}}
{{--                                <a href="#" class="tag">Pregnancy Care (12)</a>--}}
{{--                                <a href="#" class="tag">Fertility (8)</a>--}}
{{--                                <a href="#" class="tag">Menopause (6)</a>--}}
{{--                                <a href="#" class="tag">Preventive Care (10)</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection