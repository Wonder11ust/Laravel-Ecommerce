@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    @foreach ($orders as $item)
                    <div class="card-body">
                        <h5>Id Pesanan:{{ $item->id }}</h5>
                        <h5>Jumlah Yang Harus Dibayar:{{ $item->totalPrice }}</h5>
                        <button class="btn btn-success" id="pay-button">Pay Now</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
@endsection