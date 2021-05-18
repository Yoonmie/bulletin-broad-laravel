@extends('layouts.app')

@section('content')
  <div class="container mt-5 border col-8">
      {{-- <div class="row"> --}}
        <label>Log In</label>
      {{-- </div> --}}

      <form action="{{ route('login') }}" method="POST">
        @csrf
     
        <div class="form-group row">
            <div class="col-3">
                <label for="email">Email</label>
            </div>
            <div class="col-5">
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="password">Password</label>
            </div>
            <div class="col-5">
                <input type="text" id="password" name="password" class="form-control">
            </div>
        </div>
        <div class="form-group d-flex justify-content-center">
            <div class="items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>
            <a href="#" class="row">Register Now ?</a>
        </div>
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </form>
  </div>

@endsection