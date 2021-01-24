<?php

namespace App\Http\Controllers;

use App\ContactModel;
use App\serviceModel;
use App\VisitorModel;
use App\CourseModel;
use App\project_model;
use App\ReviewModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function HomeIndex()
    {
        $UserIp = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $timeDate = date('Y-m-d h:i:sa');

        VisitorModel::insert(['ip_address' => $UserIp, 'visit_time' => $timeDate]);

        $servicesData = json_decode(serviceModel::all());

        $coursesData = json_decode(CourseModel::orderBy('id', 'desc')->limit(6)->get());
        $projectData = json_decode(project_model::orderBy('id', 'desc')->limit(10)->get());

        $reviewData = json_decode(ReviewModel::all());


        return view('home', [
            'servicesData' => $servicesData,
            'coursesData' => $coursesData,
            'projectData' => $projectData,
            'reviewData' => $reviewData,
        ]);
    }



    function contactName(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_mobile = $request->input('contact_mobile');
        $contact_email = $request->input('contact_email');
        $contact_msg = $request->input('contact_msg');

        $result = ContactModel::insert([
            'contact_name' => $contact_name,
            'contact_mobile' => $contact_mobile,
            'contact_email' => $contact_email,
            'contact_msg' => $contact_msg,

        ]);


        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
