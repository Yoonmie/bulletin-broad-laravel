@extends('layouts.app')

@section('content')
  <div class="container mt-5 border col-8">
      <div class="row mb-3">
        <label>User Create</label>
      </div>

      <form action="{{url('user/confirm')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-3">
                <label for="name">Name</label>
            </div>
            <div class="col-5">
                <input type="text" id="name" name="name" class="form-control @error('name') border-danger @enderror">
            </div>
           <!--id-->
                <div class="col-4 text-danger text-sm">
                    * @error('name'){{$message}} @enderror
                </div>
           
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="email">Email Address</label>
            </div>
            <div class="col-5">
                <input type="email" id="email"  name="email" class="form-control @error('email') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('email'){{$message}} @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-3">
                <label for="password">Password</label>
            </div>
            <div class="col-5">
                <input type="password" id="password"  name="password" class="form-control @error('password') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('password'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="password_confirmation">Confirm Password</label>
            </div>
            <div class="col-5">
                <input type="password" id="password_confirmation"  name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('password_confirmation'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="type">Type</label>
            </div>
            <div class="col-5">
                <select class="form-select form-control col-12 border-1 @error('type') border-danger @enderror" aria-label="Default select example" name="type">
                    <option selected>Choose type</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                    <option value="3">Visitor</option>
                  </select>
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('type'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="phone">Phone</label>
            </div>
            <div class="col-5">
                <input type="text" id="phone" name="phone" class="form-control @error('phone') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('phone'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="dob">Date of Birth</label>
            </div>
            <div class="col-5">
                <input type="date" id="dob" name="dob" class="form-control @error('dob') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('dob'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="address">Address</label>
            </div>
            <div class="col-5">
               <textarea name="address" id="address" name="address" rows="3" class="col-12 @error('address') border-danger @enderror"></textarea>
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('address'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="profile" class="col-4">Profile</label>
            </div>
            <div class="col-7">
                 <input type="file" name="image" >
            </div>
           
        </div>

        <div class="form-group row">
            <img src="" alt="">Image
        </div>
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-3">Confirm</button>
            <button type="submit" class="btn btn-primary ml-3">Clear</button>
        </div>
      </form>
  </div>

@endsection