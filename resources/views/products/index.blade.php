@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="product">
                <img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->product_name }}">
                <h3>{{ $product->product_name }}</h3>
                <p class="card-text">Rp{{ number_format($product->product_price, 0, ',', '.') }}</p>
                <p class="card-text">{{ $product->description }}</p>
                <a href="/products/{{ $product->id }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
