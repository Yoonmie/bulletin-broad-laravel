@extends('layouts.app')

@section('content')
  <div class="container col-7">
      <div class="row my-5">
        <label>Update User</label>
      </div>
      
      <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('user.pwupdate', $users -> id ) }}" > 
                @csrf
                @method('PUT')
                {{-- @method('PUT'){{route('user.usershow',$users->id)}} --}}

            <div class="form-group row">
                <div class="col-3">
                    <label for="pw">Old Password</label>
                </div>
                <div class="col-5">
                    <input type="text" id="pw" class="form-control" name="pw"  value="{{ $users -> password }}">
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="password">New Password</label>
                </div>
                <div class="col-5">
                    <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror">
                </div>
                
                @error('password')<!--id-->
                    <div class="col-4 text-danger text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            <div class="form-group row">
                <div class="col-3">
                    <label for="password_confirmation" >Confirm New Password</label>
                </div>
                <div class="col-5">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Reenter Password" class="form-control @error('password_confirmation') border-danger @enderror">
                </div>
                @error('password_confirmation')<!--id-->
                    <div class="col-5 text-danger text-sm">
                        {{$message}}
                    </div>
                @enderror

            </div>
    
       
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-3">Confirm</button>
            <button type="reset" class="btn btn-primary ml-3">Clear</button>
        </div>
    </form>	
  </div>

@endsection