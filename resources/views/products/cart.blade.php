@extends('layouts.main')
@section('content')
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-9">
                <table class="table">
                    <tr>
                        <td>No</td>
                        <td>Product Name</td>
                        <td>Product Image</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td></td>
                    </tr>
                    @if (count($carts)<=0)
                        <h1>No Items</h1>
                        @else
                        @foreach ($carts as $cart)
                    <tr>
                        <form action="/updateQty/{{ $cart->id }}" method="POST">
                            @csrf
                            @method('PUT')
                        
                        <td>{{ $loop->iteration }}</td>
                       <td>{{ $cart->product->product_name }}</td>
                       <td><img src="{{asset('storage/'. $cart->product->product_image) }}" alt="{{ $cart->product->product_name }}" width="100px" height="100px"></td>
                       <td><input type="number" value="{{ $cart->quantity }}" name="quantity"></td>
                       <td>Rp{{ number_format($cart->totalPrice,0,',','.') }}</td>
                       <td><a href="/remove/{{ $cart->id }}" class="btn btn-danger">Remove</a>
                     
                           
                            <button type="submit" class="btn btn-warning">Update Quantity</button>
                            
                        
                        
                    </td>
                    </tr>  
                </form>
                    @endforeach
                    <tr>
                        <td colspan="4">Total Price</td>
                        <td>{{ number_format($totalPrice,0,',','.') }}</td>
                        <td><a href="/checkout" class="btn btn-success">Checkout Now</a></td>
                        <td><a href="/clear" class="btn btn-secondary">Clear Cart</a></td>
                    </tr>
                    @endif
                    
                </table>
            </div>
        </div>
    </div>
@endsection