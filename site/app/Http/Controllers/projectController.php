<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projectModel;
class projectController extends Controller
{
    function projectPage(){
        $projectData=json_decode(projectModel::orderBy('id','desc')->get());

        return view('project',['projectData'=>$projectData]);
    }

}
