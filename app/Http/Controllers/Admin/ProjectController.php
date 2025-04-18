<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view("projects.projects", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Project $project)
    {
        return view("projects.details", compact("project"));
    }

    public function create()
    {
        $types = Type::all();
        $techs = Technology::all();
        return view("projects.create", compact("types", "techs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();
        $newProject->titolo = $data["titolo"];
        $newProject->cliente = $data["cliente"];
        $newProject->descrizione = $data["descrizione"];
        $devsArr = array_filter($data, function ($var, $key){
            if (str_contains($key, "dev") && trim($var) !== ""){
                return true;
            }else {
                return false;
            };
        }, ARRAY_FILTER_USE_BOTH);
        $newProject->devs = array_values($devsArr);
        $newProject->data = $data["data"];
        $newProject->type_id = $data["type_id"];

        $newProject->save();

        if (isset($data["techs"])) {
            $newProject->technologies()->attach($data["techs"]);
        }

        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $techs = Technology::all();

        return view("projects.edit", compact("project", "types", "techs" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->titolo = $data["titolo"];
        $project->descrizione = $data["descrizione"];
        $project->cliente = $data["cliente"];
        $devsArr = array_filter($data, function ($var, $key){
            if (str_contains($key, "dev") && trim($var) !== ""){
                return true;
            }else {
                return false;
            };
        }, ARRAY_FILTER_USE_BOTH);
        $project->devs = array_values($devsArr);
        $project->data = $data["data"];
        $project->type_id = $data["type_id"];

        $project->update();

        if (isset($data["techs"])) {
            $project->technologies()->sync($data["techs"]);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("projects.index");
    }
}
