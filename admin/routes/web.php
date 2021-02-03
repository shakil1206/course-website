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

Route::get('/','HomeController@HomeIndex')->middleware('loginCheck');

Route::get('/visitor','VisitorController@VisitorIndex')->middleware('loginCheck');


//Admin Panel Service Management
Route::get('/service','ServiceController@ServiceIndex')->middleware('loginCheck');
Route::get('/getServceData','ServiceController@getServiceData')->middleware('loginCheck');
Route::post('/serviceDelete','ServiceController@serviceDelete')->middleware('loginCheck');
Route::post('/serviceDetails','ServiceController@getServiceDetails')->middleware('loginCheck');
Route::post('/serviceUpdate','ServiceController@serviceUpdate')->middleware('loginCheck');
Route::post('/serviceAdd','ServiceController@serviceAdd')->middleware('loginCheck');


//Admin Panel Courses Management
Route::get('/courses', "CoursesController@CoursesIndex")->middleware('loginCheck');
Route::get('/getCoursesData','CoursesController@getCoursesData')->middleware('loginCheck');
Route::post('/getCoursesDetails','CoursesController@getCoursesDetails')->middleware('loginCheck');
Route::post('/coursesDelete','CoursesController@coursesDelete')->middleware('loginCheck');
Route::post('/coursesUpdate','CoursesController@coursesUpdate')->middleware('loginCheck');
Route::post('/coursesAdd','CoursesController@coursesAdd')->middleware('loginCheck');




//Admin Panel Project Management
Route::get('/project',"OurProjectController@ProjectIndex")->middleware('loginCheck');
Route::get('/getProjectData',"OurProjectController@GetProjectData")->middleware('loginCheck');
Route::post('/projectAdd',"OurProjectController@projectAdd")->middleware('loginCheck');
Route::post('/getProjectDetails',"OurProjectController@getProjectDetails")->middleware('loginCheck');
Route::post('/projectUpdate',"OurProjectController@projectUpdate")->middleware('loginCheck');
Route::post('/projectDelete',"OurProjectController@projectDelete")->middleware('loginCheck');



// Admin Panel Contact Management
Route::get('/contact',"ContactController@ContactIndex")->middleware('loginCheck');
Route::get('/getContactData',"ContactController@GetContactData")->middleware('loginCheck');
Route::post('/contactDelete',"ContactController@contactDelete")->middleware('loginCheck');


// Admin Panel Contact Management
Route::get('/review',"ReviewController@reviewIndex")->middleware('loginCheck');
Route::get('/getReviewData',"ReviewController@GetReviewData")->middleware('loginCheck');
Route::post('/reviewAdd',"ReviewController@reviewAdd")->middleware('loginCheck');
Route::post('/reviewDelete',"ReviewController@reviewDelete")->middleware('loginCheck');
Route::post('/getReviewDetails',"ReviewController@getReviewDetails")->middleware('loginCheck');
Route::post('/reviewUpdate',"ReviewController@reviewUpdate")->middleware('loginCheck');


// Admin Photo Gallery Management
Route::get('/photo',"PhotoController@photoIndex")->middleware('loginCheck');
Route::post('/photoUpload',"PhotoController@photoUpload")->middleware('loginCheck');
Route::get('/photoJson',"PhotoController@photoJson")->middleware('loginCheck');
Route::get('/photoJsonById/{id}',"PhotoController@photoJsonById")->middleware('loginCheck');
Route::post('/photoDelete',"PhotoController@photoDelete")->middleware('loginCheck');






// Admin Login
Route::get('/login',"LoginController@loginPage");
Route::get('/logout',"LoginController@onLogOut");
Route::post('/onLogin',"LoginController@onLogin");

