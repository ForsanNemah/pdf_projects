
 
 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">add  new newss</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Content</label>

                            <div class="col-md-6">
 
                                <textarea id="w3review"   rows="4" cols="50" name="content" required>

                                </textarea>
                            </div>
                        </div>












                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">File</label>

                            <div class="col-md-6">
                                <input id="email" type="file" class="form-control @error('email') is-invalid @enderror" name="file_name"   required autocomplete="email" autofocus>

                              
                            </div>
                        </div>








                       



 





                   

           







                       











                       



                        






















                       
                     











                          <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Language</label>

                            <div class="col-md-6">
                   
                                <select name="lang" id="cars">
                                    <option value="ar">Arabic</option>
                                    <option value="en">English</option>
                                   
                                   
                                  </select>
        

                              
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
