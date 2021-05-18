@extends('layouts.app')

@section('content')
  <div class="container mt-5 col-8">
      <div class="row mt-3">
        <h3>Post List</h3>
      </div>
      {{-- url('/search') --}}
        
      <div class="row my-5">
        <form action="{{ route('posts.search') }}" method="GET" class="col-md-5 row">
            <div class="col-sm-6 mr-5"> <input type="text" name="search" class="form-control"  required/></div>
            <button type="submit" class="btn btn-primary px-2 col-sm-3">Search</button>
         </form>
        <a href="{{ route('post.create') }}" class="btn btn-primary mx-3 col-2">Add</a>
        <a href="{{ url('/excel')}}" class="btn btn-primary mx-2 col-2">Upload</a>
        <a href="{{ route('export') }}" class="btn btn-primary mx-2 col-2">Download</a>
      </div>

        <table class="table">
          <tr>
            <th>No</th>
            <th>Post Title</th>
            <th>Post Description</th>
            <th>Posted User</th>
            <th>Posted Date</th>
            <th></th>
            <th></th>
          </tr>

          @php $i = 1;@endphp
          @foreach ($posts as $post)         
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $post -> title }}</td>
                <td>{{ $post -> description }}</td>
                <td>{{ $post -> user -> name }}</td>
                <td>{{ $post -> updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('post.edit',$post->id) }}" > 	
                        @csrf
                        @method('GET')
                    <button type="submit" class="text-primary border-0 bg-transparent ">Edit</button>
                    </form>
                </td>
                
                <td>
                    <form method="post" action="{{ route('post.destroy' , $post->id ) }}" onsubmit="return confirm('Are you sure?')"> 	
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="text-primary border-0 bg-transparent">Delete</button>
                    </form>
                </td>
             
            </tr>
            @endforeach
        </table>
        {{ $posts -> links('vendor.pagination.simple-bootstrap-4') }}
        
        
   
  </div>

@endsection