<?php

namespace App\Http\Controllers;

use App\serviceModel;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function ServiceIndex()
    {
        return view('services');
    }


    public function getServiceData()
    {
        $result = json_encode(serviceModel::orderBy('id','desc')->get());
        return $result;
    }

    public function getServiceDetails(Request $request)
    {
        $id = $request->input('id');
        $result = json_encode(serviceModel::where('id','=',$id)->get());
        return $result;
    }



    public function serviceDelete(Request $request)
    {
        $id = $request->input('id');
        $result = serviceModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }

   }

    public function serviceUpdate(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $des = $request->input('des');
        $imgLink = $request->input('imgLink');

        $result = serviceModel::where('id','=',$id)->update(['serivce_name'=>$name, 'service_des'=>$des, 'service_img'=>$imgLink]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }

   }



    public function serviceAdd(Request $request)
    {
        $name = $request->input('name');
        $des = $request->input('des');
        $imgLink = $request->input('imgLink');

        $result = serviceModel::insert(['serivce_name'=>$name, 'service_des'=>$des, 'service_img'=>$imgLink]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }

   }


}
