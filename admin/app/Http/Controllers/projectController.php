<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projectModel;

class projectController extends Controller
{
    function projectIndex(){
       
        return view('project');
    }

    function getProjectData(){
        $resultData=json_encode(projectModel::orderBy('id','desc')->get());
        return $resultData;
    }


    function getProjectDetails(Request $req){
        $id=$req->input('id');
        $result=projectModel::where('id','=',$id)->get();       
         return $result;
    }

    function deleteProjectData(Request $req){

        $id=$req->input('id');
        $result=projectModel::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function updateProjectData(Request $req){

        $id=$req->input('id');
        $img=$req->input('project_img');
        $name=$req->input('project_name');
        $des=$req->input('project_des');
        $link=$req->input('project_link');


        $result=projectModel::where('id','=',$id)->update(['project_img'=> $img,'project_name'=> $name,'project_des'=>$des,'project_link'=>$link]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    function AddProject(Request $req){
        $project_img=$req->input('project_img');
        $project_name=$req->input('project_name');
        $project_des=$req->input('project_des');
        $project_link=$req->input('project_link');


        $result=projectModel::insert(['project_name'=> $project_name,'project_des'=>$project_des,'project_link'=>$project_link,'project_img'=> $project_img]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }
}
