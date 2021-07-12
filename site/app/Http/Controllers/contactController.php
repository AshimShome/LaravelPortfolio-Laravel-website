<?php

namespace App\Http\Controllers;

use App\courseModel;
use Illuminate\Http\Request;

class contactController extends Controller
{
    function ContactPage(){

        return view('contact');
    }
}
