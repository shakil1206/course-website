<?php

namespace App\Http\Controllers;

use App\CourseModel;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function CoursesIndex()
    {
        return view('courses');
    }


    public function getCoursesData()
    {
        $result = json_encode(CourseModel::orderBy('id','desc')->get());
        return $result;
    }


    public function getCoursesDetails(Request $request)
    {
        $id = $request->input('id');
        $result = json_encode(CourseModel::where('id', '=', $id)->get());
        return $result;
    }


    public function coursesDelete(Request $request)
    {
        $id = $request->input('id');
        $result = CourseModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function coursesUpdate(Request $request)
    {
        $id = $request->input('course_id');
        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');


        $result = CourseModel::where('id', '=', $id)->update([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function coursesAdd(Request $request)
    {
        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');

        $result = CourseModel::insert([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
