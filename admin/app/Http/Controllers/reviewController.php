<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class reviewController extends Controller
{
    function reviewIndex(){
       
        return view('review');
    }

    function getreviewData(){
        $resultData=json_encode(ReviewModel::orderBy('id','desc')->get());
        return $resultData;
    }


    function getreviewDetails(Request $req){
        $id=$req->input('id');
        $result=ReviewModel::where('id','=',$id)->get();       
         return $result;
    }

    function deletereviewData(Request $req){

        $id=$req->input('id');
        $result=ReviewModel::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function updatereviewData(Request $req){

        $id=$req->input('id');
        $img=$req->input('img');
        $name=$req->input('name');
        $des=$req->input('des');

        $result=ReviewModel::where('id','=',$id)->update(['img'=> $img,'name'=> $name,'des'=>$des]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function reviewAdd(Request $req){

        $img=$req->input('img');
        $name=$req->input('name');
        $des=$req->input('des');

        $result=ReviewModel::insert(['img'=> $img,'name'=> $name,'des'=>$des]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

}
