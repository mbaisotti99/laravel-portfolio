<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Technology::all();
        return view("techs.index", compact("techs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("techs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTech = new Technology();

        $data = $request->all();
        $newTech->nome = $data['nome'];
        $newTech->descrizione = $data['descrizione'];
        $newTech->colore = $data['colore'];

        $newTech->save();

        return redirect()->route('techs.index');
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
    public function edit(Technology $tech)
    {
        return view("techs.edit", compact("tech"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $tech)
    {
        $data = $request->all();
        $tech->nome = $data["nome"];
        $tech->descrizione = $data["descrizione"];
        $tech->colore = $data["colore"];

        $tech->update();

        return redirect()->route("techs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $tech)
    {
        $tech->delete();
        return redirect()->route("techs.index");
    }
}
