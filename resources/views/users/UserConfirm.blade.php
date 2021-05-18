@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-7">
      <div class="row mb-3">
        <label>User Confirmation</label>
      </div>
      
      <div class="row">
        <div class="col-7">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group row">
                <div class="col-3">
                    <label for="name">Name</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="name" class="form-control" name="name" value="{{ $request -> name }}">
                    <label for="name">{{ $request -> name }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="email">Email Address</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="email" class="form-control" name="email" value="{{ $request -> email }}">
                    <label for="email">{{ $request -> email }}</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label for="password">Password</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="password" class="form-control"  name="password" value="{{ $request -> password }}">
                    <label for="password">{{ $request -> password }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="type">Type</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="type" class="form-control" name="type" value="{{ $request -> type }}">
                    <label for="password">{{ $request -> password }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="phone">Phone</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="phone" class="form-control" name="phone" value="{{ $request -> phone }}">
                    <label for="phone">{{ $request -> phone }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="dob" class="form-control" name="dob" value="{{ $request -> dob }}">
                    <label for="dob">{{ $request -> dob }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="address">Address</label>
                </div>
                <div class="col-5">
                    <input type="hidden" id="address" class="form-control" name="address" value="{{ $request -> address }}">
                    <label for="address">{{ $request -> address }}</label>
                </div>
            </div>

        </div>

        <div class="col-5">
            <div class="form-group row">
                <img src="{{ asset($path) }}" class="avatar img-circle img-thumbnail" width="150px" alt="/{{ $path }}">
                <input type="hidden" value="{{ $path }}" name="image" id="profile"> 
            </div>
        </div>
      </div>
        
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-3">Register</button>
            <a href="{{ url('user/create') }}" class="btn btn-outline-primary mx-3">Cancel</a>
        </div>
    </form>
  </div>

@endsection