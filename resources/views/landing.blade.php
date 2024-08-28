@extends('frontend.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Hero Section with Background Image -->
    <section class="hero-section"
        style="background-image: url('{{ asset('template/dist/assets/compiled/jpg/landing.jpg') }}'); background-size: cover; background-position: center; height: 100vh; position: relative;">
        <div class="container text-center text-light d-flex justify-content-center align-items-center"
            style="height: 100%; flex-direction: column;">
            <div>
                <h1 class="display-3 fw-bold">
                    <strong>EXPLORE</strong> <span style="color:#EB5633;"><strong>LATEST</strong></span>
                    <strong>TENT</strong>
                </h1>
                <p class="lead mt-3"><strong>Shop our new arrivals collection and latest products</strong></p>
                <a href="#shop" class="btn mt-4 rounded w-20 p-3 me-5"
                    style="background-color: #EB5633; border-color: #EB5633; color: #E6E3DB; font-size: 18px;">
                    <strong>Shop Now</strong>
                </a>
                <a href="#about-us" class="btn mt-4 rounded w-20 p-3"
                    style="background-color: #E6E3DB; border-color: #E6E3DB; color: #27292C; ">
                    <strong>About US</strong>
                </a>

            </div>
        </div>
        <!-- Arrow Icon centered at the bottom -->
        <div class="d-flex justify-content-center mb-5"
            style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 100;">
            <a href="#shop" class="d-flex justify-content-center align-items-center bounce"
                style="width: 60px; height: 60px; background-color: #EB5633; border-radius: 50%; color: white; text-decoration: none;">
                <i class="bi bi-arrow-down" style="font-size: 24px;"></i>
            </a>
        </div>

    </section>

    <section id="promotion" class="hero text-center" style="margin-top: 100px;">
        <div id="promotionCarousel" class="carousel slide">
            <div id="promotionCarousel" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($promotions as $promotion)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="card" style="background: #E6E3DB; border:none;">
                                <img src="{{ asset('storage/' . $promotion->image_path) }}" loading="lazy" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $promotion->title }}</h5>
                                    <p class="card-text">{{ $promotion->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Custom Buttons -->
                <button class="carousel-control-custom prev-btn" type="button" data-bs-target="#promotionCarousel" data-bs-slide="prev">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="carousel-control-custom next-btn" type="button" data-bs-target="#promotionCarousel" data-bs-slide="next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>


    </section>


    <section id="shop" class="mb-5">
        <!-- Main Content -->
        <div class="container mt-5">
            <!-- Filter and Sort Options -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn fs-3">FILTER +</button>
                <div>
                    <button class="btn fs-3">SORT BY: NEWEST</button>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach($products as $product)
                <div class="  col ">
                    <div class="card product-card h-100 rounded-4" style="border: none;">
                        @php
                            $primaryImage = $product->images()->where('is_primary', true)->first();
                        @endphp
                        @if($primaryImage)
                            <img src="{{ asset('storage/' . $primaryImage->image_path) }}" loading="lazy" class="card-img-top rounded-4" alt="{{ $product->name }}">
                        @else
                            <img src="default-image.jpg" loading="lazy" class="card-img-top rounded-4" alt="Default Image">
                        @endif
                        <div class="card-body d-flex flex-column"> <!-- Removed fixed height -->
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-end mt-auto">
                                <p class="card-text fw-bold mb-0 me-3 me-md-0">Rp. {{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('detail', $product->id) }}" class="btn btn-light rounded-circle">
                                    <i class="bi bi-arrow-up-right" style="color: #EB5633; font-size: 1rem;"></i>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
    @media (max-width: 576px) {
        .card-body {
            padding: 4px;
        }
        .card-title {
            font-size: 1rem;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .btn {
            font-size: 1.2rem;
        }
    }
    </style>


    <!-- Bootstrap JS -->
   <!-- Include Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
@endsection
