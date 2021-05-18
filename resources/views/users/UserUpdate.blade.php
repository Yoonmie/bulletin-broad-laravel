@extends('layouts.app')

@section('content')
  <div class="container col-8">
      <div class="row my-5">
        <label>Update User</label>
      </div>
      
      <div class="row">
        <div class="col-7">
            <form method="post" action="{{route('user.usershow',$users->id)}}" enctype="multipart/form-data"> 
            @csrf
            <div class="form-group row">
                <div class="col-3">
                    <label for="name">Name</label>
                </div>
                <div class="col-5">
                    <input type="text" id="name" class="form-control @error('name') border-danger @enderror" name="name" value="{{ $users -> name }}">
                </div>
                @error('name')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="email">Email Address</label>
                </div>
                <div class="col-5">
                    <input type="text" id="email" class="form-control @error('email') border-danger @enderror" name="email" value="{{ $users -> email }}">
                </div>
                @error('email')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="type">Type</label>
                </div>
                <div class="col-5">
                    <select class="form-select form-control col-12 border-1 @error('type') border-danger @enderror" aria-label="Default select example" name="type" >
                        <option selected value="{{ $users -> type }}"></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">Visitor</option>
                    </select>
                </div>
                @error('type')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="phone">Phone</label>
                </div>
                <div class="col-5">
                    <input type="text" id="phone" class="form-control @error('phone') border-danger @enderror" name="phone" value="{{ $users -> phone }}">
                </div>
                @error('phone')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="col-5">
                    <input type="text" id="dob" class="form-control @error('dob') border-danger @enderror" name="dob" value="{{ $users -> dob }}">
                </div>
                @error('dob')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="address">Address</label>
                </div>
                <div class="col-5">
                   <textarea name="address" id="address" rows="3" class="col-12 form-control @error('name') border-danger @enderror" name="address">{{ $users -> address }}</textarea>
                </div>
                @error('address')
                    <div class="col-4 text-danger text-sm">
                        *{{$message}} 
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <div class="col-3">
                    <label for="profile">Profile</label>
                </div>
                <div class="col-5">
                    <div class="col-7">
                        <input type="file" name="updateimage" id="updateimage">
                   </div>
                </div>
                
            </div>

            <div class="form-group">
                <img src="" alt="">Image
            </div>

            <a href="{{ route('user.change', $users -> id ) }}">Change Password</a>


        </div>

        <div class="col-5">
            <div class="form-group row">
                <img src="/{{ $users -> image }}" alt="/{{ $users -> image }}" class="avatar img-circle img-thumbnail">
                <input type="hidden" name="image" value="{{ $users -> image }}">
                <input type="hidden" name="password" value="{{ $users -> password }}">
            </div>
        </div>
      </div>
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-3">Confirm</button>
            <button type="reset" class="btn btn-primary ml-3">Clear</button>
        </div>
    </form>	
  </div>

@endsection