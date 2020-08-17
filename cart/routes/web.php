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

Route::get('/', function () {
    return view('home');
});


Route::get('/blog/{id}','BlogController@show');

Route::get('/edu/coursesingle','CourseSingleController@index');

Route::get('/edu/courses','FrontCourseController@index');

Route::resource('/admin/users','UserController');

Route::resource('/admin/categories', 'CategoryController');

Route::resource('/home', 'HomeController');
Route::resource('/admin/courses', 'CourseController');
Route::resource('/admin/news','NewsController');
Route::get('/admin/categories/{category}/courses', 'CategoriesController@courses');
Auth::routes(
    [
        'register' => true ,
        'verify' => true,
    ]);





