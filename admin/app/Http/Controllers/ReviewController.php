<?php

namespace App\Http\Controllers;

use App\ReviewModel;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewIndex()
    {
        return view('review');
    }



    public function GetReviewData()
    {
        $result = json_encode(ReviewModel::orderBy('id','desc')->get());
        return $result;
    }



    public function reviewAdd(Request $request)
    {
        $review_name = $request->input('review_name');
        $review_desc = $request->input('review_desc');
        $review_img = $request->input('review_img');

        $result = ReviewModel::insert([
            'name' => $review_name,
            'description' => $review_desc,
            'image' => $review_img,

        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }




    public function getReviewDetails(Request $request)
    {
        $id = $request->input('id');
        $result = json_encode(ReviewModel::where('id', '=', $id)->get());
        return $result;
    }



    public function reviewUpdate(Request $request)
    {
        $id = $request->input('review_id');
        $review_name = $request->input('review_name');
        $review_desc = $request->input('review_desc');
        $review_img = $request->input('review_img');


        $result = ReviewModel::where('id', '=', $id)->update([
            'name' => $review_name,
            'description' => $review_desc,
            'image' => $review_img,
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }





    public function reviewDelete(Request $request)
    {
        $id = $request->input('id');
        $result = ReviewModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



}
