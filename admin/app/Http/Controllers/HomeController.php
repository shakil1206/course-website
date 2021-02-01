<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contactModel;
use App\courseModel;
use App\projectModel;
use App\reviewModel;
use App\serviceModel;
use App\visitorModel;


class HomeController extends Controller
{



    public function HomeIndex()
    {
        $totalContact = ContactModel::count();
        $totalCourse = CourseModel::count();
        $totalProject = projectModel::count();
        $totalReview = ReviewModel::count();
        $totalService = serviceModel::count();
        $totalVisitor = VisitorModel::count();

        return view('home',[
            'totalContact'=> $totalContact,
            'totalCourse'=> $totalCourse,
            'totalProject'=> $totalProject,
            'totalReview'=> $totalReview,
            'totalService'=> $totalService,
            'totalVisitor'=> $totalVisitor,
        ]);
    }
}
