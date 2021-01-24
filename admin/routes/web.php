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

Route::get('/','HomeController@HomeIndex');

Route::get('/visitor','VisitorController@VisitorIndex');


//Admin Panel Service Management
Route::get('/service','ServiceController@ServiceIndex');
Route::get('/getServceData','ServiceController@getServiceData');
Route::post('/serviceDelete','ServiceController@serviceDelete');
Route::post('/serviceDetails','ServiceController@getServiceDetails');
Route::post('/serviceUpdate','ServiceController@serviceUpdate');
Route::post('/serviceAdd','ServiceController@serviceAdd');


//Admin Panel Courses Management
Route::get('/courses', "CoursesController@CoursesIndex");
Route::get('/getCoursesData','CoursesController@getCoursesData');
Route::post('/getCoursesDetails','CoursesController@getCoursesDetails');
Route::post('/coursesDelete','CoursesController@coursesDelete');
Route::post('/coursesUpdate','CoursesController@coursesUpdate');
Route::post('/coursesAdd','CoursesController@coursesAdd');




//Admin Panel Project Management
Route::get('/project',"OurProjectController@ProjectIndex");
Route::get('/getProjectData',"OurProjectController@GetProjectData");
Route::post('/projectAdd',"OurProjectController@projectAdd");
Route::post('/getProjectDetails',"OurProjectController@getProjectDetails");
Route::post('/projectUpdate',"OurProjectController@projectUpdate");
Route::post('/projectDelete',"OurProjectController@projectDelete");



// Admin Panel Contact Management
Route::get('/contact',"ContactController@ContactIndex");
Route::get('/getContactData',"ContactController@GetContactData");
Route::post('/contactDelete',"ContactController@contactDelete");
