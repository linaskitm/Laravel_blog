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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'BlogController@index');
Route::get('/add', 'BlogController@addPost');
Route::post('/store','BlogController@store');
Route::get('/post/{post}', 'BlogController@showFull');
Route::get('/edit/{post}', 'BlogController@edit');
Route::patch('/storeupdate/{post}', 'BlogController@storeUpdate');
Route::get('/delete/{post}', 'BlogController@delete');

Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/storecategory', 'CategoryController@storeCategory');
Route::get('/del/{category}', 'CategoryController@deleteCategory');

// abu routai kreipiasi i skirtingus metodus, kad suskirstyti postus pagal kategorijas
Route::get('/postby/{category}', 'BlogController@showByCategory');
Route::get('/bycategory/{category}', 'CategoryController@selectByCategory');

Route::post('/post{post}/comment', 'CommentController@addComment');


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
