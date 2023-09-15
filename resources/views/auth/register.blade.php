@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form action="/register" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username </label>
                    <input type="text" class="form-control" id="username" name="name">
                  </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection