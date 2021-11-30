<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('Message/{id}/{name?}',function ($id , $name = null){

//     echo "Test Message From Lravel Route File id = ".$id.' & Name = '.$name;
// }); 
// ->where(['id' => '[0-9]+','name' => '[a-zA-Z]+']);

// Route::get('Register',function (){
//      return view('register');
// });
//  Route::view('Register','register');



// Route::get('Message','userController@Message');
// //Route::get('UserDetails/{name}/{email}','userController@printDetails');

// Route::get('UserDetails/{name}/{email}',[userController::class , 'printDetails']);


 Route::get('Create','userController@create');
 Route::post('Store','userController@store');
 Route::get('profile','userController@shareData');


 Route::get('Student/','userController@index')->middleware('checkLogin');
 Route::get('edit/{id}','userController@edit')->middleware('checkLogin');
 Route::post('Update','userController@update')->middleware('checkLogin');
 Route::get('Delete/{id}','userController@delete')->middleware('checkLogin');

 Route::get('login','userController@login');
 Route::post('doLogin','userController@doLogin');
 Route::get('logOut','userController@logOut')->middleware('checkLogin');






/*
 get 
 post 
 put 
 patch 
 delete 
 resource
 any 
 match 
 option 
 view 
*/