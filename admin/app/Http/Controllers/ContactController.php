<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contuctModel;


class ContactController extends Controller
{
    function ContacttIndex(){
       
        return view('Contact');
    }

    function getContacttData(){
        $resultData=json_encode(contuctModel::orderBy('id','desc')->get());
        return $resultData;
    }

    function ContactDatatDelete(Request $req){

        $id=$req->input('id');
        $result=contuctModel::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }
}
