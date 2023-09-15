@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <table class="table">
                    <tr>
                        <td>Product Id</td>
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Price / item</td>
                    </tr>
                    @foreach ($detailItems as $detail)
                        <tr>
                            <td>{{ $detail->product_id }}</td>
                            <td>{{ $detail->product->product_name }}</td>
                            <td>{{ $detail->quantity}}</td>
                            <td>Rp{{ number_format($detail->price,0,',','.')}}</td>
                        </tr>
                    @endforeach
    
                  
                </table>
            </div>
        </div>
    </div>
@endsection