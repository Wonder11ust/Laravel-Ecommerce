@extends('layouts.admin')
@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
            @elseif(session()->has('success_edit'))
            <div class="alert alert-primary">
                {{ session('success_edit') }}
            </div>
            @elseif(session()->has('success_delete'))
            <div class="alert alert-primary">
                {{ session('success_delete') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>Rp{{number_format( $product->product_price,0,',','.') }}</td>
                                    <td>{{ $product->stocks }}</td>
                                    <td>
                                        <a href="/admin/dashboard/{{ $product->id }}/edit" class="btn btn-outline-warning">Edit</a>
                                        <form action="/admin/dashboard/{{ $product->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                    {{ $products->links() }}
                </div>
                <div class="col-md-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}">
                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="">Product Price</label>
                        <input type="number" name="product_price" class="form-control @error('product_price') is-invalid @enderror" value="{{ old('product_price') }}">
                        @error('product_price')
                            <div class="invalid-feeedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="">Product Image</label>
                        <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror">
                        @error('product_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="">Stocks</label>
                        <input type="number" name="stocks" class="form-control @error('stocks') is-invalid @enderror" value="{{ old('stocks') }}">
                        @error('stocks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        <button class="btn btn-outline-primary my-3" type="submit">Add New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection