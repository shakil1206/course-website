<?php

namespace App\Http\Controllers;

use App\PhotoModel;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function photoIndex()
    {
        return view('photo');
    }



    public function photoUpload(Request $request)
    {
        $photoPath = $request->file('photo')->store('public');


        $photoName = (explode('/',$photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://".$host."/storage/".$photoName;


       $result =  PhotoModel::insert(['location'=>$location]);

        return $result;
    }
}
