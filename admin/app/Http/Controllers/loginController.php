<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adminLoginModel;
class loginController extends Controller
{
    function loginIndex(){
       
        return view('login');
    }

    function onLogin(Request $Request){
       $user=$Request->input('user');
       $pass=$Request->input('pass');

      $countValue= adminLoginModel::where('userName','=',$user)->where('passwords','=',$pass)->count();

      if($countValue==1){
        $Request->session()->put('user',$user);
     return 1;
      }else{
        return 0;
      }
    }
    function onLogout(Request $Request){
      $Request->session()->flush();
      return redirect('/login');
    }
}
