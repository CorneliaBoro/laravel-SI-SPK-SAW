<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('dashboard.index');
    }

    function profile(){
        return view('dashboards.profile.index');
    }

}
