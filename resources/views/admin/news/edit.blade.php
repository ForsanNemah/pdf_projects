@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit news</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Name</label>

            <div class="col-md-6">
 

                <textarea id="w3review"   rows="4" cols="50" name="content"  required>
                    {{ $news->content }}
                </textarea>
            </div>
        </div>


 




        


         <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                 save
                </button>

               
            </div>
        </div>
    </form>
@endsection