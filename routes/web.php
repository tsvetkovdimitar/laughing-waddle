<?php

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

use App\Staff;
use App\Photo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){

    echo "Test";

});

Route::get('/create', function(){

    $staff = Staff::find(5);

    $staff->photos()->create(['path'=>'example.jpg']);


});

Route::get('/read', function(){

    $staff = Staff::findOrFail(5);

    foreach ($staff->photos as $photo){

        return $photo->path;

    }

});
