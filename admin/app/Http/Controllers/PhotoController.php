<?php

namespace App\Http\Controllers;

use App\PhotoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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




    public function photoJson()
    {
        return PhotoModel::take(3)->get();
    }

    public function photoJsonById(Request $request)
    {
        $firstId = $request->id;
        $lastId = $firstId + 3;
        return PhotoModel::where('id', '>',$firstId)->where('id', '<=', $lastId)->get();
    }


    public function photoDelete(Request $request)
    {
        // $photoId = $request->id;
        // $photoUrl = $request->photoUrl;

        $oldPhotoUrl = $request->input('OldPhotoUrl');
        $oldPhotoId = $request->input('id');

        $oldPhotoUrlArray = explode('/',$oldPhotoUrl);
        $oldPhotoName = end($oldPhotoUrlArray);

        $deletePhotoFile = Storage::delete('public/'.$oldPhotoName);

        $deleteRow = PhotoModel::where('id','=', $oldPhotoId)->delete();
        return $deleteRow;

    }
}
