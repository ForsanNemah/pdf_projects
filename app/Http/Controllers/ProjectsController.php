<?php

namespace App\Http\Controllers;

use App\Models\admin\projects;
use App\Http\Requests\StoreprojectsRequest;
use App\Http\Requests\UpdateprojectsRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        $data =projects::latest()->paginate(5);
        // return $data; 
       
         return view('admin.projects.index',compact('data'))
             ->with('i', (request()->input('page', 1) - 1) * 5);
             
    }






    public function projects_api()
    {
        //

        //echo public_path();

        $data =projects::get();

        foreach($data as $r){
             
             $r->file_name=public_path()."/".$r->file_name;
        }

/*
        foreach($data as $r){
             
            echo $r->file_name ;
       }
       */
        return $data; 
       
       
             
    }








  



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.projects.create');
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
            'name' => 'required',
            'file_name' => 'required|max:2048',
            
        ]);
      








        $name=$request->file('file_name')->getClientOriginalName();
$name=rand(10, 30).$name;
        $path = $request->file('file_name')->move('my_files',$name);
       // echo  $path;
       //echo  $name;

        $data = $request->all();

        $data['file_name']=$path;
       

       
       projects::create($data);
       
        return redirect()->route('projects.index')
                        ->with('success','project created successfully.');
                        
                        
                    



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
    public function edit(projects $project)
    {

       // echo $project;
        //
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectsRequest  $request
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectsRequest $request, projects $project)

 
    {
       // echo $project;
    
       $request->validate([
        'name' => 'required',
         
        
    ]);
  
  
    $data = $request->all();

    if ( $request->hasFile('file_name') ) {
       
        $name=$request->file('file_name')->getClientOriginalName();
        $name=rand(10, 30).$name;
                $path = $request->file('file_name')->move('my_files',$name);
               // echo  $path;
               //echo  $name;
        
               
        
                $data['file_name']=$path;
               

               $old_file_path= public_path()."/".$data['old_file_name'];
              echo   unlink( $old_file_path );


    }else{
        unset($data['file_name']);
       

    }
      
    unset($data['old_file_name']);























 


        $project->update( $data );

    
      
        return redirect()->route('projects.index')
                        ->with('success','project updated successfully');

                        
                  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $project)
    {
        //
 $project->delete();
       // echo "hhh";

       
        return redirect()->route('projects.index')
                        ->with('success','project deleted successfully');
                        
    }
}
