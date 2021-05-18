@extends('layouts.app')

@section('content')
  <div class="container col-5">
      <div class="row my-5">
        <h2>User Profile</h2>
        <a href="{{ route('user.edit', $users->id) }}" class="justify-content-end offset-5">Edit</a>
      </div>
      
      {{-- <div class="row">
        <div class="col-7"> --}}

            <div class="form-group row">
                <div class="col-3">
                    <label for="name">Name</label>
                </div>
                <div class="col-5">
                    <label for="name">: {{ $users -> name }}</label>
                    <input type="hidden" id="name" name="name" class="form-control" value="{{ $users -> name }}">
                    <input type="hidden" name="password" value="{{ $users -> password }}">
                </div>
            </div>

            <div class="form-group row">
                
                <div class="col-5 offset-3">
                    <img src="{{ asset($users -> image) }}" alt="{{ asset($users -> image) }}" class="avatar img-circle img-thumbnail" name="image">
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="email">Email Address</label>
                </div>
                <div class="col-5">
                    <label for="email">:   {{ $users -> email }}</label>
                    <input type="hidden" id="email" class="form-control" name="email" value="{{ $users -> email }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-3">
                    <label for="type">Type</label>
                </div>
                <div class="col-5">
                    <label for="type">:   {{ $users -> type }}</label>
                    <input type="hidden" id="type" class="form-control" name="type" value="{{ $users -> type }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-3">
                    <label for="phone">Phone</label>
                </div>
                <div class="col-5">
                    <label for="phone">:   {{ $users -> phone }}</label>
                    <input type="hidden" id="phone" class="form-control" name="phone" value="{{ $users -> phone }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-3">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="col-5">
                    <label for="dob">:   {{ $users -> dob }}</label>
                    <input type="hidden" id="dob" class="form-control" name="dob" value="{{ $users -> dob }}">
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="address">Address</label>
                </div>
                <div class="col-5">
                    <label for="address">:   {{ $users -> address }}</label>
                    <input type="hidden" id="address" class="form-control" name="address" value="{{ $users -> address }}">
                </div>
            </div>

            
        </div>

        
      {{-- </div> --}}
      
       
  </div>

@endsection