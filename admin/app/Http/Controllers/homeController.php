<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitorModel;
use App\servesModel;
use App\courseModel;
use App\projectModel;
use App\contuctModel;
use App\ReviewModel;

class homeController extends Controller
{
    function homeIndex(){
        $TotalVisitor =visitorModel::count();
        $TotalService =servesModel::count();
        $TotalCourse =courseModel::count();
       $TotalProject=projectModel::count();
       $TotalContact=contuctModel::count();
       $TotalReview =ReviewModel::count();


       
        return view('home',[
           'TotalVisitor' =>$TotalVisitor,
            'TotalService'=>$TotalService,
            'TotalCourse'=> $TotalCourse,
            
            'TotalProject'=>$TotalProject,
           'TotalContact' =>$TotalContact,
           'TotalReview' =>$TotalReview

        ]);
    }
}
