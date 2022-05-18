@extends('peoples.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Person Details</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="home"> Back</a>
        </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('peoples.create') }}"> Create New One</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($peoples as $people)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $people->name }}</td>
            <td>{{ $people->phone_number }}</td>
            <td>{{ $people->gender }}</td>
            <td>
                <form action="{{ route('peoples.destroy',$people->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('peoples.show',$people->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('peoples.edit',$people->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $peoples->links() !!}
@endsection