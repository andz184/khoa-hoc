<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index(){
        return view('client.index');
    }
    public function course(){
        return view('client.cource');
    }

    public function courceDetail(){
        return view('client.course_details');
    }

    public function homeLearn() {

        return view('client.learn.index');
    }

    public function listCourse() {
        return view('client.learn.listcousre');
    }
    public function watchVideo() {
        return view('client.learn.watchvideo');
    }
    public function homeAdmin() {

        return view('admin.index');
    }
}
