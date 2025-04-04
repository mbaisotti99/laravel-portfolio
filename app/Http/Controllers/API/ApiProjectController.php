<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    public function index(){
        $projects = Project::with(["technologies", "developers"])->get();
        return response()->json([
            "success"=>"true",
            "data"=> $projects,
        ]);
    }

    public function show(Project $project){
        $project->load(["technologies", "developers"]);
        return response()->json([
            "success"=>"true",
            "data"=> $project,
        ]);
    }
}
