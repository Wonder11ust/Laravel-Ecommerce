@extends('layouts.main')
@section('content')
    <div class="container">
        {{-- carousel --}}
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators my-2">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1689600242990-25189446fd24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1332&q=80" class="d-block w-100" alt="..." width="450px" height="350px">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://images.unsplash.com/3/www.madebyvadim.com.jpg?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1182&q=80" class="d-block w-100" alt="..." width="450px" height="350px">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1611864581049-aca018410b97?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1088&q=80" class="d-block w-100" alt="..." width="450px" height="350px">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          {{-- carousel end --}}
          {{-- hero section start --}}
          <header class="jumbotron jumbotron-fluid bg-info text-white text-center">
            <div class="container my-3">
              <h1 class="display-4">Selamat Datang di Toko Online Kami</h1>
              <p class="lead">Temukan berbagai produk berkualitas dengan harga terbaik!</p>
              <a href="#" class="btn btn-primary btn-lg">Belanja Sekarang</a>
            </div>
          </header>
          {{-- hero section end --}}

          {{-- product section start --}}
          <section class="container my-2">
            <h2 class="text-center mb-4">Our Products</h2>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 my-2">
                    <div class="card" style="width:18rem">
                            <img src="{{ asset('storage/'.$product->product_image) }}" alt="">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5 class="card-text">{{ $product->product_name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="/products/{{ $product->id }}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
                <a href="/products" class="btn btn-primary">More Items</a>
            </div>
          </section>
          {{-- product section end --}}
    </div>
@endsection