<?php

namespace App\Http\Controllers;

use App\Models\admin\neew;
use App\Http\Requests\StoreprojectsRequest;
use App\Http\Requests\UpdateprojectsRequest;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        $data =neew::latest()->paginate(5);
        // return $data; 
       
         return view('admin.news.index',compact('data'))
             ->with('i', (request()->input('page', 1) - 1) * 5);
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprojectsRequest $request)
    {
        //
        $request->validate([
            'content' => 'required',
           
            
        ]);
      







/*
        $name=$request->file('file_name')->getClientOriginalName();
$name=rand(10, 30).$name;
        $path = $request->file('file_name')->move('my_files',$name);
       // echo  $path;
       //echo  $name;  $data['file_name']=$path;
*/










$name=$request->file('file_name')->getClientOriginalName();
$name=rand(10, 30).$name;
        $path = $request->file('file_name')->move('my_files',$name);
        echo $path;









        $data = $request->all();

      
        $data['file_name']=$path;

       
       neew::create($data);
       
        return redirect()->route('news.index')
                        ->with('success','news created successfully.');
                        
                        
                    



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(neew $news)
    {

       //echo $news;

       Session::put('old_file_name', $news['file_name']);
      // echo Session::get('old_file_path');

        
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectsRequest  $request
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectsRequest $request, neew $news)

 
    {
       // echo $project;
    
       $request->validate([
        'content' => 'required',
       
        
    ]);



    $data = $request->all();


    if ( $request->hasFile('file_name') ) {
       
        $name=$request->file('file_name')->getClientOriginalName();
        $name=rand(10, 30).$name;
                $path = $request->file('file_name')->move('my_files',$name);
               // echo  $path;
               //echo  $name;
        
               
        
                $data['file_name']=$path;
               

              $old_file_path= public_path()."/".Session::get('old_file_name');;
              echo   unlink( $old_file_path );


    }else{
        unset($data['file_name']);
       

    }
      






    $news->update( $data );

    
      
    return redirect()->route('news.index')
                    ->with('success','project updated successfully');



  
 

                        
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(neew $news)
    {


echo  $news;

echo $news['file_name'];

 

       
 $news->delete();


         

       


       if(file_exists(public_path()."/".$news['file_name'])){
         unlink(public_path()."/".$news['file_name'] );
    }else{
       // dd('File is not exists.');
    }








        return redirect()->route('news.index')
                        ->with('success','news deleted successfully');
                         
                        
    }













    public function news_api()
    {
        //

        //echo public_path();

        $data =neew::get();

     

/*

   foreach($data as $r){
             
             $r->file_name=public_path()."/".$r->file_name;
        }
        foreach($data as $r){
             
            echo $r->file_name ;
       }
       */
        return $data; 
       
       
             
    }














}
