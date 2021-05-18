@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-8">
      <div class="row my-5">
        <h2>Update Post</h2>
      </div>

      <form action="{{ route('post.showpostupdate',$posts->id) }}" method="POST">
        @csrf
     
        <div class="form-group row">
            <div class="col-3">
                <label for="title">Title</label>
            </div>
            <div class="col-5">
                <input type="text" id="title" name="title" class="form-control @error('title') border-danger @enderror" value="{{ $posts -> title }}">
                <input type="hidden" name="id" class="form-control" value="{{ $posts -> id }}">
            </div>
            @error('title')
                <div class="col-4 text-danger text-sm">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="description">Description</label>
            </div>
            <div class="col-5">
                <textarea id="description" name="description" class="form-control col-12 @error('description') border-danger @enderror" cols="" rows="3">{{ $posts -> description }}</textarea>
            </div>
            @error('desctiption')
                <div class="col-4 text-danger text-sm">
                    {{$message}} 
                </div>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="status">Status</label>
            </div>
            <div class="col-5">
                {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                  </div> --}}
                  <input type="checkbox" data-toggle="toggle" class="form-control" id="status" name="status" vlaue="1" checked>
            </div>
        </div>

       
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary my-2">Confirm</button>
            <button type="reset" class="btn btn-outline-primary m-2 px-3">Clear</button>
        </div>
    </form>
  </div>

@endsection