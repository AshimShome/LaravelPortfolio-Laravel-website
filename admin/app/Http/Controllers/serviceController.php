<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servesModel;
class serviceController extends Controller
{
    function serviceIndex(){
       
        return view('service');
    }

    function getServiceData(){
        $resultData=json_encode(servesModel::orderBy('id','desc')->get());
        return $resultData;
    }


    function getServiceDetails(Request $req){
        $id=$req->input('id');
        $result=servesModel::where('id','=',$id)->get();       
         return $result;
    }

    function deleteServiceData(Request $req){

        $id=$req->input('id');
        $result=servesModel::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function updateServiceData(Request $req){

        $id=$req->input('id');
        $img=$req->input('img');
        $name=$req->input('name');
        $des=$req->input('des');

        $result=servesModel::where('id','=',$id)->update(['service_img'=> $img,'service_name'=> $name,'service_des'=>$des]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function serviceAdd(Request $req){

        $img=$req->input('img');
        $name=$req->input('name');
        $des=$req->input('des');

        $result=servesModel::insert(['service_img'=> $img,'service_name'=> $name,'service_des'=>$des]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }


}

