<?php
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Auth;
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
    return view('home1');
});


// Route::get('/edu/courses', function () {
//     return view('/edu/courses');
// });


// Route::get('/edu/instructor', function () {
//     return view('/edu/instructor');
// });

Route::get('admin/courses/details_video/{id}', 'CourseController@video_details')->name('videodetail');



Route::get('/edu/blog','BlogController@index')->name('blog');;
Route::get('/edu/blog/{id}','BlogController@show')->name('blog_details');
Route::get('/edu/coursesingle/{id}','FrontCourseController@show')->name('coursesingle');

Route::get('/edu/courses','FrontCourseController@index');
Route::get('/edu/categories','FrontCategoryController@index')->name('categories');
Route::get('/edu/categories/{id}','FrontCategoryController@show')->name('categories.cources');

Route::group([
    'prefix' => 'admin',
    
    'middleware' => ['auth', 'checkuser:admin,super-admin'],
], function() {
Route::resource('/users','UserController');
Route::resource('/categories', 'CategoryController');
Route::resource('/courses', 'CourseController');
// Route::get('/courses/video', 'CourseController');
Route::get('/courses/cvideo', 'CourseController@video_details');
Route::resource('/news','NewsController');
Route::get('/admin/categories/{category}/courses', 'CategoryController@courses');

});


Route::resource('/home1', 'HomeController');


Auth::routes(
    [
        'register' => true ,
        'verify' => true,
    ]);


Route::get('/home', 'HomeController@index')->name('home');


