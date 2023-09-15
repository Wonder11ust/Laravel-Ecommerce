@extends('layouts.admin')
@section('content')
<div style="margin-left: 250px; padding: 20px;">
<h1>Selamat datang di Admin Panel</h1>
<p>Silakan pilih menu di sidebar untuk mengelola data Anda.</p>
</div>
<div class="container">
    <div class="col-md-10 mx-5">
        <div class="my-2">
            <h4 class="my-2">Product Dashboard </h4>
            <div class="col-md-12 my-1">
                <div class="row">
                    <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                   
                                <h5 class="my-2 text-white" style="font-size: 30px;">{{ $totalProducts }}</h5>
                                <h5 class="text-white">Total</h5>
                                <h5 class="text-white">Products</h5>
                                </div>
                                <div class="col-md-4">
                                    <i class="fa fa-mobile fa-3x my-4" style="color:white;"></i>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                   
                                <h5 class="my-2 text-white" style="font-size: 30px;">{{ $totalOrders }}</h5>
                                <h5 class="text-white">Total</h5>
                                <h5 class="text-white">Orders</h5>
                                </div>
                                <div class="col-md-4">
                                    <i class="fa fa-flag fa-3x my-4" style="color:white;"></i>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                   
                                <h5 class="my-2 text-white" style="font-size: 30px;">{{ $totalUsers }}</h5>
                                <h5 class="text-white">Total</h5>
                                <h5 class="text-white">Users</h5>
                                </div>
                                <div class="col-md-4">
                                    <i class="fa fa-users-cog fa-3x my-4" style="color:white;"></i>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection