<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'HomeController@HomeIndex');
Route::post('/contactSend', 'HomeController@contactName');
Route::get('/course',"CoursesController@CoursePage");
Route::get('/project',"ProjectsController@ProjectsPage");
Route::get('/policy',"PolicyController@PolicyPage");
Route::get('/terms',"TerrmsController@TermsPage");
Route::get('/contact',"ContactController@ContactPage");


