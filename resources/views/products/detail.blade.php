@extends('layouts.main')
@section('content')
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row mt-5">
            <div class="col-md-8">
                <img width="500px" height="400px" src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->product_name }}">
                
            </div>
            <div class="col-md-4">
                <form action="/add" method="POST">
                    @csrf
                    <h4><b> {{ strtoupper($product->product_name) }}</b></h4>
                    <p>Stocks:{{ $product->stocks }}</p>
                    <small>Description</small>
                    <p>{{ $product->description }}</p>
                    <input type="number" value="1" min="1" max="{{ $product->stocks }}" name="quantity">
                    <p>Price:Rp{{ number_format($product->product_price,0,',','.') }}</p>
                    <input type="hidden" name="productId" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-success">Add To Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection