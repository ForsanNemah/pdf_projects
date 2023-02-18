 

@extends('layouts.app')
 
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Create</a>
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
            <th>content</th>
            <th>Image</th>
            <th>Language</th>
           
            <th width="280px"> </th>
        </tr>
        @foreach ($data as $data_array)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $data_array->content }}</td>
           
            <td> <img src="{{url("/".$data_array->file_name)}}" class="img-fluid" alt="Responsive image" width="200" height="200">       </td>
            <td>{{ $data_array->lang }}</td>
            
             

            
            <td>

               
                <form action="{{ route('news.destroy',$data_array->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('news.edit',$data_array->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
 
                </form>
 
                
            </td>
          
        </tr>
        @endforeach
    </table>
    
  
    
    {!! $data->links() !!}
      
@endsection