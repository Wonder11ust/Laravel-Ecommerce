@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/300" alt="">
                </div>
                <div class="col-md-8">
                    <form action="/profile/{{ $data->id }}" method="POST">
                        @method('put')
                        @csrf
                    <div class="col-md-6">
                        <label for="Name">Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                          </div>
                          <label for="Email">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                          </div>
               
                    </div>
                  <button type="submit" class="btn btn-success">Update Data</button>
                </form>
                </div>
           
        </div>
    </div>
@endsection