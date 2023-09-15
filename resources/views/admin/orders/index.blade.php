@extends('layouts.admin')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Buyer Name</th>
                <th>Total Amount</th>
                <th>Order Ddate</th>
            </thead>
            <tbody>
               @foreach ($orders as $order)
               <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->totalPrice }}</td>
                    <td>{{ $order->order_date }}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
@endsection