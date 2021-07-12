<?php

namespace App\Http\Controllers;

use App\projectModel;
use Illuminate\Http\Request;
use App\courseModel;
class courseController extends Controller
{
   function coursePage(){

       $courseData=json_decode(courseModel::orderBy('id','desc')->get());
       return view('course',['courseData'=>$courseData]);
   }
}
