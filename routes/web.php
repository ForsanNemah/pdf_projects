<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects_api', [App\Http\Controllers\ProjectsController::class, 'projects_api'])->name('projects_api');
Route::get('/news_api', [App\Http\Controllers\NewsController::class, 'news_api'])->name('news_api');





Route::group(['middleware' => ['auth']], function () { 

    Route::get('/', function () {
        return view('home');
    });
    


    Route::resource('projects', App\Http\Controllers\ProjectsController::class);
    Route::resource('news', App\Http\Controllers\NewsController::class);




    Route::get('download/{file_name}', function( $file_name)
    {
        $path =public_path()."/".$file_name;
        echo $path;

        
        if (file_exists($path)) {
            //return Response::download($path);
            return response()->download( $path,"project.pdf",['Content-Type: application/zip']);
        }
        
        
    })->name('download');




   


});