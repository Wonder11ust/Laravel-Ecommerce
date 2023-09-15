@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/dashboard/{{ $product->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" value="{{ old('product_name',$product->product_name) }}" class="form-control">
                        <label for="">Product Price</label>
                        <input type="number" name="product_price" value="{{ old('product_price',$product->product_price) }}" class="form-control">
                        <label for="">Product Image</label>
                        <input type="hidden" name="old_image" value="{{ $product->product_image }}">
                        <input type="file" name="product_image" class="form-control">
                        <label for="">Stocks</label>
                        <input type="number" name="stocks" value="{{ old('stocks',$product->stocks) }}" class="form-control">
                        <label for="">Description</label>
                        <input type="text" name="description" value="{{ old('description',$product->description) }}" class="form-control">

                        <button class="btn btn-outline-primary my-3" type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection