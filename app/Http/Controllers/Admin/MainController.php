<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view("dashboard");
    }

    public function profilo(){
        $user = Auth::user();
        // dd($user);
        return view("profilo", compact("user"));
    }

}
