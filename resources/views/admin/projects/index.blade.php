 

@extends('layouts.app')
{{$projects=$data}}
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Client</th>
            <th>Contacs Person </th>
            <th>Year</th>
            <th>Status </th>
            <th>Detail </th>
            <th>Language</th>
            <th width="280px"> </th>
        </tr>
        @foreach ($projects as $person)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->client }}</td>
            <td>{{ $person->person_contact }}</td>
            <td>{{ $person->year }}</td>
            <td>{{ $person->status }}</td>
            <td>{{ $person->detail }}</td>
            <td>{{ $person->lang }}</td>

            
            <td>

               
                <form action="{{ route('projects.destroy',$person->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('projects.edit',$person->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
                    <a class="btn btn-primary" href="{{ route('download',$person->file_name) }}">View</a>
                </form>
 
                
            </td>
          
        </tr>
        @endforeach
    </table>
    
  
    
    {!! $projects->links() !!}
      
@endsection