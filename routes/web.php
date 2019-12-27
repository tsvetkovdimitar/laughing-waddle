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

    $staff = Staff::find(6);

    $staff->photos()->create(['path'=>'logo.jpg']);


});

Route::get('/read', function(){

    $staff = Staff::findOrFail(5);

    foreach ($staff->photos as $photo){

        return $photo->path;

    }

});

Route::get('/update', function(){

    $staff = Staff::findOrFail(5);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "Update example.jpg";

    $photo->save();

});

Route::get('/delete', function(){

    $staff = Staff::findOrFail(5);

    $staff->photos()->delete();

});

Route::get('/assign', function(){

    $staff = Staff::findOrFail(6);

    $photo = Photo::findOrFail(6);

    $staff->photos()->save($photo);

});

Route::get('/un-assign', function(){

    $staff = Staff::findOrFail(6);

//    $photo = Photo::findOrFail(6);

    $staff->photos()->whereId(6)->update(['imageable_id'=>1, 'imageable_type'=>'']);

});
