<?php

namespace App\Http\Controllers;

use App\project_model;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function ProjectsPage()
    {

        $projectData = json_decode(project_model::orderBy('id', 'desc')->get());

        return view('projects',[
            'projectData'=>$projectData,
        ]);
    }
}
