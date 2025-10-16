@extends('layout.master')
@section('css')
    <style>


    </style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container container-custom">
            <!-- Breadcrumb -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog Section -->
    <section class="recent-articles">
        <div class="container">
            <div class="row">
                <!-- Blog Section -->
               <div class="col-lg-8">
                    <div class="row g-4" id="blog-list">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-12 blog-item">
                            <div class="blog-card">
                                <div class="blog-image">
                                    <img src="{{ asset('admin-assets/images/admin-image/blogs/' . $blog->image) }}" 
                                        alt="{{ $blog->title }}" />
                                </div>
                                <div class="blog-content">
                                    <a href="{{ route('blog-detail', $blog->slug) }}">
                                        <h3 class="blog-title">{{ $blog->title }}</h3>
                                    </a>
                                    <p class="blog-excerpt">{{ $blog->short_description }}</p>
                                    <div class="blog-meta">
                                        <span class="author">{{ $blog->author }}</span>
                                        <div class="meta-info">
                                            <span class="date">{{ date('M d, Y', strtotime($blog->published_date)) }}</span> |
                                            <span class="read-time">7 min read</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center mt-5">
                        <button id="loadMoreBtn" class="btn btn-lg" style="background: linear-gradient(135deg, rgb(36,162,205) 0%, rgb(0,151,167) 100%); color: white; border: none; border-radius: 10px; font-weight: 600;font-size: 14px;">
                            Load More
                        </button>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
                    <div class="specialities-sidebar p-3">
                        <h3 class="mb-3">Recent Blogs</h3>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded">Best Gynecologist in Delhi for Your Pregnancy and Reproductive Health</span>
                            <span class="badge rounded">Pregnancy Specialist in Delhi at Sunrise Hospital with Dr. Nikita Trehan</span>
                            <span class="badge rounded">Health Concern for Women and Best Endometriosis Treatment in Delhi</span>
                            <span class="badge rounded">Can Endometriosis Get Worse with Age and best Endometriosis Treatment in Delhi?</span>
                            <span class="badge rounded">Cervical Cancer: Risk Factors, Prevention, and Cervical Cancer Treatment Cast</span>
                            <span class="badge rounded">Preparing Yourself for a Healthy Pregnancy: Guidance from Sunrise Hospital, a Leading Gynecology</span>
                            <span class="badge rounded">Cancers in the Female Reproductive Organs: Symptoms, Prevention, and Advanced Treatment Options</span>
                            <span class="badge rounded">What Should You Do After Miscarriage? Most Common Signs And Symptoms Of Miscarriage?</span>
                            <span class="badge rounded">Hysterectomy Vs Open Surgery Vs Laparoscopic Surgery – A Critical Review</span>
                            <span class="badge rounded">Why We Need Laparoscopic Surgery & the Best Gynecologist in Delhi</span>
                            <span class="badge rounded">Best Endometriosis Treatment in Delhi – Advanced Care at Sunrise Hospital</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const excerpts = document.querySelectorAll(".blog-excerpt");

            excerpts.forEach(function (excerpt) {
                let text = excerpt.innerText.trim();
                let words = text.split(" ");

                if (words.length > 20) {
                    let shortText = words.slice(0, 20).join(" ") + "...";
                    excerpt.innerText = shortText;
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let items = document.querySelectorAll("#blog-list .blog-item");
            let loadMoreBtn = document.getElementById("loadMoreBtn");
            let visible = 4; // show first 4 cards

            // Hide extra items initially
            for (let i = visible; i < items.length; i++) {
                items[i].style.display = "none";
            }

            loadMoreBtn.addEventListener("click", function() {
                let hiddenItems = 0;
                for (let i = visible; i < visible + 4 && i < items.length; i++) {
                    items[i].style.display = "block";
                    hiddenItems++;
                }
                visible += hiddenItems;

                // Hide button if all items are visible
                if (visible >= items.length) {
                    loadMoreBtn.style.display = "none";
                }
            });
        });
    </script>
@endsection