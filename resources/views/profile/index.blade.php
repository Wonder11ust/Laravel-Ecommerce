@extends('layouts.main')
@section('content')
    <div class="container">
     

            <div class="row">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/300" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" readonly value="{{ $profile->name }}">
                              </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" readonly value="{{ $profile->email }}">
                              </div>
                        </div>
                        <a href="/profile/{{ $profile->id }}" class="btn btn-success">Edit Profile</a>
                    </div>
               
            </div>
 
    </div>
@endsection