@extends('layouts.app')

@section('content')
  <div class="container col-5">
      <div class="row my-5">
        <label>Update User Confirm</label>
      </div>
      
      <div class="row">
        <div class="col-7">
            <form method="POST" action="{{ route('user.update',$id) }}" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                  

            <div class="form-group row">
                <div class="col-3">
                    <label for="name">Name</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> name }}" name="name">
                    <label for="name" name="name">{{ $request -> name }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="email">Email Address</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> email }}" name="email">
                    <label for="email" name="email">{{ $request -> email }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="type">Type</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> type }}" name="type">
                    <label for="type" name="type" value="{{ $request -> type }}">{{ $request -> type }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="phone">Phone</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> phone }}" name="phone">
                    <label for="phone" name="phone">{{ $request -> phone }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> dob }}" name="dob">
                    <label for="dob" name="dob">{{ $request -> dob }}</label>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="address">Address</label>
                </div>
                <div class="col-5">
                    <input type="hidden" value="{{ $request -> address }}" name="address">
                    <label for="address" name="address">{{ $request -> address }}</label>
                </div>
            </div>

        </div>

        <div class="col-5">
            <div class="form-group row">
                <input type="hidden" value="{{ $path }}" name="image">
                <img src="/{{ $path }}" alt="/{{ $path }}" class="avatar img-circle img-thumbnail">  
            </div>
        </div>
      </div>
      
        <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirm</button>
            
            <a href="{{ url('/users/UserUpdate') }}" class="btn btn-outline-primary mx-3">Cancel</a>
        </div>
    </form>	
  </div>

@endsection