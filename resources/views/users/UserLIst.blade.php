@extends('layouts.app')

@section('content')
  <div class="container mt-5 border col-8">
      <div class="row mt-3">
        <h3>User List</h3>
      </div>
      
      <div class="row my-5">
        <form action="{{ url('/usersearch') }}" method="GET" class="col-md-10 row">
           
          <div class="col-md-2 "> <input type="text" name="name" id="name" class="form-control text-primary" placeholder="Name" value="{{old('name')}}"/></div>
          <div class="col-md-2 "> <input type="text" name="email" id="email" class="form-control text-primary" placeholder="Email" value="{{ old('email')}}"/></div>
          <div class="col-md-3 "> <input type="date" name="created_from" class="form-control text-primary"  placeholder="Created From" value="{{ old('created_from')}}"/></div>
          <div class="col-md-3 "> <input type="date" name="created_to" class="form-control text-primary"  placeholder="Created To" value="{{ old('created_to')}}"/></div>
          <button class="btn btn-primary mr-2">Search</button>
        </form>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add</a>

      </div>
      @if(Session('message'))
        <div class="alert alert-dismissible alert-success show fade">
          {{ Session('message') }}  
          <button class="close" data-dismiss="alert">&times;</button>
        </div>
      @endif

        <table class="table">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created User</th>
            <th>Phone</th>
            <th>BirthDate</th>
            <th>Address</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th></th>
          </tr>

          @php $i = 1;@endphp
          @foreach ($users as $user)
            <tr>
                <td>{{ $i++ }}</td>
                <td><a href="{{ route('user.show', $user->id) }}">{{ $user -> name }}</a></td>
                <td>{{ $user -> email }}</td>
                <td>{{ $user -> name }}</td>
                <td>{{ $user -> phone }}</td>
                <td>{{ $user -> dob }}</td>
                <td>{{ $user -> address }}</td>
                <td>{{ $user -> created_at }}</td>
                <td>{{ $user -> updated_at }}</td>
                <td>
                    <form method="post" action="{{route('user.destroy',$user->id)}}" onsubmit="return confirm('Are you sure?')"> 	
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                    </form>	
                    
                </td>
             
            </tr>
            @endforeach
        </table>

        
        {{-- {{ $users->appends(Request::get('page'))->links() }} --}}
    
  </div>

@endsection