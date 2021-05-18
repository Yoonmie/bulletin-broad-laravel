@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-8 offset-3">
      <div class="row my-5">
       <h2>Create Post Confirmation</h2>
      </div>
      
      <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group row x">
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
                <label for="description" id="description">{{ $request -> description }}</label>
                <input type="hidden" name="description" value="{{ $request -> description }}">
            </div>
        </div>
       
      
        <div class="form-group d-flex offset-2">
            <button type="submit" class="btn btn-primary my-3">Create</button>
            <a href="/{{ url('posts/CreatePost') }}" class="btn btn-outline-primary my-3 px-3 offset-1">Cancel</a>
        </div>
    </form>
  </div>

@endsection