<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index(){
        return view('client.index');
    }
    public function cource(){
        return view('client.cource');
    }

    public function courceDetail(){
        return view('client.course_details');
    }

    public function homeLearn() {
        return view('client.learn.index');
    }
}
