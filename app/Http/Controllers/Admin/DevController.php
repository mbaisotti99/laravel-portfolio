<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Technology;
use Illuminate\Http\Request;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devs = Developer::paginate(10);
        return view("devs.index", compact("devs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $techs = Technology::all();
        return view("devs.create", compact("techs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newDev = new Developer();

        $newDev->nome = $data['nome'];
        $newDev->soprannome = $data['soprannome'];
        $newDev->descrizione = $data['descrizione'];
        
        $newDev->save();
        if (isset($data['techs'])){
            $newDev->technologies()->attach($data['techs']);
        }

        return redirect()->route('devs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $dev)
    {
        $techs = Technology::all();
        return view('devs.edit', compact('dev', "techs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $dev)
    {
        $data = $request->all();
        $dev->nome = $data['nome'];
        $dev->soprannome = $data['soprannome'];
        $dev->descrizione = $data['descrizione'];

        $dev->update();

        if (isset($data['techs'])){
            $dev->technologies()->sync($data['techs']);
        } else{
            $dev->technologies()->detach();
        }
        
        return redirect()->route("devs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $dev)
    {
        $dev->delete(); 
        return redirect()->route("devs.index");
    }
}
