@extends('layout/layout')
@section('content')
@php
    /**
     * Return a usable image URL for products. Handles both stored values like
     * - "products/filename.jpg" (from Storage::put('products', ...))
     * - "filename.jpg" (legacy)
     * - absolute URLs
     */
    if (!function_exists('product_image_url')) {
        function product_image_url($img) {
            if (empty($img)) return asset('img/placeholder.png');
            if (strpos($img, 'http') === 0) return $img;
            if (strpos($img, '/') !== false) {
                return asset('storage/' . ltrim($img, '/'));
            }
            return asset('storage/products/' . $img);
        }
    }
@endphp

<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a href="#" role="button" class="btn btn-outline-primary border-2 active" data-filter="*">All</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="#" role="button" class="btn btn-outline-primary border-2" data-filter=".category-4">Vegetable</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="#" role="button" class="btn btn-outline-primary border-2" data-filter=".category-5">Fruits</a>
                        </li>
                        <li class="nav-item me-0">
                            <a href="#" role="button" class="btn btn-outline-primary border-2" data-filter=".category-6">Fresh</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($products as $item)
                        @php $catId = $item->category_id ?? 0; @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 product-col category-{{ $item->category_id }}">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ product_image_url($item->image) }}" alt="{{ $item->name }}">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $item->name }}</a>
                                    <span class="text-primary me-1">${{ $item->gia }}</span>
                                    <span class="text-body text-decoration-line-through">$29</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        const buttons = document.querySelectorAll('.nav .btn[data-filter]');
        const items = document.querySelectorAll('.product-col');
        const noResults = document.createElement('div');
        noResults.className = 'text-center py-5 no-results d-none';
        noResults.innerHTML = '<div class="alert alert-warning">Không có sản phẩm phù hợp.</div>';
        const grid = document.querySelector('.tab-content .row');
        if(grid) grid.parentNode.insertBefore(noResults, grid.nextSibling);

        function setActive(btn){
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }

        function applyFilter(filter) {
            let shown = 0;
            if(filter === '*'){
                items.forEach(i => { i.style.display = ''; shown++; });
            } else {
                const cls = filter.replace('.', '');
                items.forEach(i => {
                    if(i.classList.contains(cls)) { i.style.display = ''; shown++; }
                    else { i.style.display = 'none'; }
                });
            }
            if(shown === 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
            console.debug('Filter applied:', filter, 'shown:', shown);
        }

        buttons.forEach(btn => {
            // click
            btn.addEventListener('click', function(e){
                e.preventDefault();
                setActive(btn);
                applyFilter(btn.getAttribute('data-filter'));
            });
            // keyboard
            btn.addEventListener('keydown', function(e){
                if(e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    btn.click();
                }
            });
        });

        // initialize (show all)
        applyFilter('*');
    });
    </script>


    <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                    <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


@endsection
