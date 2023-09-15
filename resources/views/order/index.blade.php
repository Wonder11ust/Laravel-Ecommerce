@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($orders)!==0)
            <table class="table" align="center">
                <tr>
                    <td>Order Id</td>
                    <td>Total Amount</td>
                    <td>Order Date</td>
                    <td>Payment Method</td>
                    <td>Shipping Address</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                @foreach ($orders as $order)
                <tr>
                <td><a href="detailItem/{{ $order->id }}" class="btn btn-secondary">{{ $order->id }}</a></td>
                <td>Rp{{ number_format($order->totalPrice,0,',','.') }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->shipping_address }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="/payment/{{ $order->id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Pay Now</button>
                    </form>
                </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>

@endif

   
@endsection