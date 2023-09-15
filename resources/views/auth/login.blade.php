@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            @if (session()->has('error'))
                <div class="alert"> {{ session('error') }}</div>
            @endif
            <div class="col-md-8">
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection