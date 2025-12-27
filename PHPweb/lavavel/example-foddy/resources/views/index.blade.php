@extends('layout/layout')
@section('content')
@php $products = $products ?? collect(); @endphp
<!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Organic Food Is Good For Health</h1>
                                    <a href="{{ route('product') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Natural Food Is Always Healthy</h1>
                                    <a href="{{ route('product') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Features</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-1.png" alt="">
                        <h4 class="mb-3">Natural Process</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h4 class="mb-3">Organic Products</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h4 class="mb-3">Biologically Safe</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


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
                        @forelse($products as $item)
                        @php $catId = $item->category_id ?? 0; @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 product-col category-{{ $item->category_id ?? 0 }}">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <a href="{{ route('admin.products.edit', $item->id) }}">
                                        <img class="img-fluid w-100" src="{{ $item->image ? asset('storage/' . $item->image) : asset('img/default-product.png') }}" alt="{{ $item->name }}">
                                    </a>
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="{{ route('admin.products.edit', $item->id) }}">{{ $item->name }}</a>
                                    <span class="text-primary me-1">${{ $item->gia }}</span>
                                    <span class="text-body text-decoration-line-through">$29</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('admin.products.edit', $item->id) }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        @php
                                            $cartAddRoute = \Illuminate\Support\Facades\Route::has('cart.add') ? route('cart.add', $item->id) : null;
                                        @endphp
                                        @if($cartAddRoute)
                                            <form action="{{ $cartAddRoute }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-body border-0 bg-transparent">
                                                    <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="text-body border-0 bg-transparent" disabled title="Cart unavailable">
                                                <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                            </button>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No products found.</p>
                        </div>
                        @endforelse
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
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
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


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Latest Blog</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/blog-1.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid" src="img/blog-2.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="img/blog-3.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
