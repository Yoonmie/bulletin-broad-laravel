@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-8">
      <div class="row my-5">
       <h2>Update Post Confirmation</h2>
      </div>

      <form action="{{ route('post.update' , $request -> id) }}" method="POST">
        @csrf
        @method('PUT')
     
        <div class="form-group row">
            <div class="col-3">
                <label for="title">Title</label>
            </div>
            <div class="col-5">
                <label for="title" id="title">{{ $request -> title }}</label>
                <input type="hidden" name="title" value="{{ $request -> title }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="description">Description</label>
            </div>
            <div class="col-5">
                <label for="description" id="description" name="description">{{ $request -> description }}</label>
                <input type="hidden" name="description" value="{{ $request -> description }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="status">Status</label>
            </div>
            <div class="col-5">
                <div class="form-check form-switch">
                    @php
                        if($updatedstatus == 0 ){
                            echo '<input type="checkbox" data-toggle="toggle">';
                        }
                        else {
                           echo '<input type="checkbox" data-toggle="toggle"  checked>';
                        }
                    @endphp
                   <input type="hidden" name="status" value="{{ $updatedstatus }}">
                  </div>
            </div>
        </div>
       
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary my-2">Update</button>
            <a href="{{ url('posts/PostConfirm') }}" class="btn btn-outline-primary m-2 px-3">Cancel</a>
        </div>
    </form>
  </div>

@endsection