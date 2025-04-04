<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;

class ApiDeveloperController extends Controller
{
    public function index(){
        $devs = Developer::with(["technologies", "projects"])->get();
        return response()->json([
            "success"=>"true",
            "data"=> $devs,
        ]);
    }

    public function show(Developer $dev){
        $dev->load(["technologies", "projects"]);
        return response()->json([
            "success"=>"true",
            "data"=> $dev,
        ]);
    }
}
