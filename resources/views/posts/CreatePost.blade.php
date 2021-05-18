@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-8">
      <div class="row my-5">
        <h2>Create Post</h2>
      </div>

      <form action="{{ url('post/confirm') }}" method="POST" enctype="multipart/form-data">
        @csrf
     
        <div class="form-group row">
            <div class="col-3">
                <label for="title">Title</label>
            </div>
            <div class="col-5">
                <input type="text" id="title" name="title" class="form-control @error('title') border-danger @enderror">
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('title'){{$message}} @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="description">Description</label>
            </div>
            <div class="col-5">
                <textarea id="description" name="description" class="form-control col-12 @error('description') border-danger @enderror" cols="" rows="3"></textarea>
            </div>
            <div class="col-4 text-danger text-sm">
                * @error('description'){{$message}} @enderror
            </div>
        </div>
       
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary my-2">Confirm</button>
            <button type="reset" class="btn btn-outline-primary m-2 px-3">Clear</button>
        </div>
    </form>
  </div>

@endsection