<?php

namespace App\Http\Controllers;

use App\serviceModel;
use App\VisitorModel;
use App\CourseModel;
use App\project_model;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function HomeIndex()
    {
        $UserIp = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $timeDate = date('Y-m-d h:i:sa');

        VisitorModel::insert(['ip_address'=>$UserIp, 'visit_time'=>$timeDate]);

        $servicesData = json_decode(serviceModel::all());

        $coursesData = json_decode(CourseModel::orderBy('id', 'desc')->limit(6)->get());
        $projectData = json_decode(project_model::orderBy('id', 'desc')->limit(10)->get());


        return view('home',[
            'servicesData'=>$servicesData,
            'coursesData'=>$coursesData,
            'projectData'=>$projectData,
            ]);
    }



}
