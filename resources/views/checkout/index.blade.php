@extends('layouts.main')
@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                  Your Items
                </div>
                <div class="card-body">
                  <h5 class="card-title">
             <form method="POST" action="/checkout">
                       @csrf
                    @foreach ($items as $item)
                    {{ $item->product->product_name  }} ({{ $item->quantity }}) 
                    <div class="input-group mb-3">
                      <input type="hidden" class="form-control"  id="name" name="name" value="{{ $item->user->name }}">
                      <input type="hidden" class="form-control"  id="email" name="email" value="{{ $item->user->email }}">
                    </div>
                @endforeach
                
                  </h5>
                 
                
                  <p class="card-text">Total Price: Rp{{ number_format($totalPrice,0,',','.') }}</p>
                 
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Shipping Address" aria-label="shipping_address" id="shipping_address" name="shipping_address" aria-describedby="basic-addon1">
                  </div>
                  <select class="form-select my-2" aria-label="Default select example" id="payment_method" name="payment_method">
                    <option selected>Payment Method</option>
                    <option value="Ovo">OVO</option>
                    <option value="GoPay">GOPAY</option>
                    <option value="ShopeePay">Shoppe Pay</option>
                  </select>
                  <input type="hidden" id="totalPrice" name="totalPrice" value="{{ $totalPrice }}">
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
            </form>
              </div>
           
        </div>
    </div>
</div>



</body>
</html>
   
@endsection