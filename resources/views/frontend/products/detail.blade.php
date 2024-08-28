@extends('frontend.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container mt-5" style="padding-top: 100px;">
        <div class="row">
            <!-- Image Preview Column -->
            <div class="col-md-1 d-flex flex-column align-items-center">

                <!-- Image Previews -->
                @foreach ($product->images as $index => $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                        class="img-fluid rounded mb-2 preview-image @if ($index === 0) border-dark @endif"
                        alt="{{ $product->name }}" style="max-width: 100%;" data-bs-target="#carouselMainImage"
                        data-bs-slide-to="{{ $index }}" data-index="{{ $index }}">
                @endforeach

            </div>

            <!-- Main Image Column with Carousel -->
            <div class="col-md-5">
                <div id="carouselMainImage" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($product->images as $index => $image)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" loading="lazy"
                                    alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMainImage"
                        data-bs-slide="prev">
                        <i class="bi bi-chevron-left" style="font-size: 2rem; color: black;"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMainImage"
                        data-bs-slide="next">
                        <i class="bi bi-chevron-right" style="font-size: 2rem; color: black;"></i>
                    </button>
                </div>
                <!-- Accordion for Description and Technical Details -->
                <div class="accordion mt-4" id="productAccordion">
                    <div class="accordion-item" style="background: transparent; border: none;">
                        <h2 class="accordion-header" id="headingDescription">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDescription" aria-expanded="true"
                                aria-controls="collapseDescription" style="background: transparent;">
                                <strong>Deskripsi Produk</strong>
                            </button>
                        </h2>
                        <div id="collapseDescription" class="accordion-collapse collapse show"
                            aria-labelledby="headingDescription" data-bs-parent="#productAccordion">
                            <div class="accordion-body" style="background: transparent;">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" style="background: transparent; border: none;">
                        <h2 class="accordion-header" id="headingDetails">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails"
                                style="background: transparent;">
                                <strong>Detail Teknis</strong>
                            </button>
                        </h2>
                        <div id="collapseDetails" class="accordion-collapse collapse" aria-labelledby="headingDetails"
                            data-bs-parent="#productAccordion">
                            <div class="accordion-body" style="background: transparent;">
                                <ul>
                                    <li><strong>Berat:</strong> {{ $product->weight }} kg</li>
                                    <li><strong>Dimensi:</strong> {{ $product->dimensions }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Product Info Column -->
            <div class="col-md-6">
                <p>
                    Kategori: <strong>{{ $product->category->name }}</strong>
                    <span class="ms-3"> <!-- Adds margin to the left side of the text -->
                        Brand: <strong>{{ $product->brand->name }}</strong>
                    </span>
                </p>
                <h2 style="font-family: 'Anton'; font-size:50px;">{{ $product->name }}</h2>
                <p>
                    Stok:
                    <span class="stock-icon">
                        <x-heroicon-s-check-circle style="width: 20px; height: 20px; fill: #16a34a;" />



                    </span>
                    {{ $product->stock_quantity }} Remaining In Stock<br>
                </p>

                <h3 class="text-dark" style="font-family: 'Anton'; font-size:20px;">Rp.
                    {{ number_format($product->price, 2) }}</h3>
                <button class="btn btn-dark p-3 w-100">Tambah ke keranjang</button>


            </div>

        </div>
    </div>


    <!-- Tambahkan Carousel Produk Terkait -->
    <div class="related-products mt-5 mb-5 d-none d-md-block">
        <h4 class="mb-4 ms-5" style="font-family: 'Geologica'; font-size:30px;">
            <strong>Produk Ini Juga Cocok Untukmu</strong>
        </h4>

        <div id="relatedProductsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($relatedProducts->chunk(3) as $key => $chunk)
                    <!-- Mengelompokkan produk ke dalam grup yang terdiri dari 3 produk -->
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $relatedProduct)
                                <div class="col-md-4">
                                    <div class="card rounded-4 position-relative">
                                        <a href="{{ route('detail', $relatedProduct->id) }}" class="text-decoration-none text-dark">
                                            <img src="{{ asset('storage/' . $relatedProduct->images->first()->image_path) }}"
                                                 class="card-img-top small-carousel-img d-flex and justify-content-center" alt="{{ $relatedProduct->name }}"
                                                 loading="lazy" style="max-width: 150px; height: auto; margin: 0 auto;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                                <p class="card-text text-success">Rp. {{ number_format($relatedProduct->price, 2) }}</p>
                                            </div>
                                        </a>
                                        <!-- Icon arrow up right -->
                                        <a href="{{ route('detail', $relatedProduct->id) }}"
                                           class="btn btn-light rounded-circle position-absolute"
                                           style="bottom: 15px; right: 15px;">
                                            <i class="bi bi-arrow-up-right"
                                               style="color: #EB5633; font-size: 1.5rem;"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#relatedProductsCarousel" data-bs-slide="prev">
                <i class="bi bi-chevron-left text-dark"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#relatedProductsCarousel" data-bs-slide="next">
                <i class="bi bi-chevron-right text-dark"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <style>
        .carousel-control-prev,
        .carousel-control-next {}

        .carousel-control-prev i,
        .carousel-control-next i {
            font-size: 24px;
            /* Adjust icon size if needed */
        }

        .accordion-header {

            border-bottom: 1px solid #000;
            /* Bottom border */
        }

        .accordion-button {
            border: none;
            /* Remove button border */
            box-shadow: none !important;
            /* Remove shadow from the button */
            background: transparent;
            /* Ensure background is transparent */
        }

        .accordion-body {
            padding-top: 15px;
            /* Optional: Add padding above the content */
        }
    </style>
@endsection
