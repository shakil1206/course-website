<?php

namespace App\Http\Controllers;

use App\contactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactIndex()
    {
        return view('contact');
    }



    public function GetContactData()
    {
        $result = json_encode(contactModel::orderBy('id','desc')->get());
        return $result;
    }


    public function contactDelete(Request $request)
    {
        $id = $request->input('id');
        $result = contactModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


}
