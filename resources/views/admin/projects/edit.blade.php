@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
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
  
    <form action="{{ route('projects.update',$project->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Name</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" value="{{ $project->name }}"   name="name" autofocus   >

               
            </div>
        </div>




        <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Client</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->client }}"   name="client" autofocus   >

           
        </div>
    </div>





    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Person Contact</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->person_contact }}"   name="person_contact" autofocus   >

           
        </div>
    </div>



    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Year</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->year }}"   name="year" autofocus   >

           
        </div>
    </div>





    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Status</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->status }}"   name="status" autofocus   >

           
        </div>
    </div>



    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Detail</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->detail }}"   name="detail" autofocus   >

           
        </div>
    </div>





    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">File name</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" value="{{ $project->file_name }}"   name="old_file_name" autofocus   >

           
        </div>
    </div>







     



    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">File</label>

        <div class="col-md-6">
            <input id="email" type="file" class="form-control"    name="file_name" autofocus     >

           
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