<?php

namespace App\Http\Controllers;
use App\CourseModel;

use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function CoursePage()
    {


        $coursesData = json_decode(CourseModel::orderBy('id', 'desc')->get());


        return view('course',[
            'coursesData'=>$coursesData,
        ]);
    }
}
