<?php

namespace App\Http\Controllers;

use App\Models\SpeciesPatient;
use Illuminate\Http\Request;

class SpeciesPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = SpeciesPatient::all();
        return view('species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('species.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);

        SpeciesPatient::create($data);
        return redirect('/dashboard/species')->with('success', 'Spesies Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpeciesPatient  $speciesPatient
     * @return \Illuminate\Http\Response
     */
    public function show(SpeciesPatient $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpeciesPatient  $speciesPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(SpeciesPatient $species)
    {
        return view('species.edit', compact('species'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpeciesPatient  $speciesPatient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpeciesPatient $species)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);

        $species->update($data);
        return redirect('/dashboard/species')->with('success', 'Spesies Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpeciesPatient  $speciesPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpeciesPatient $species)
    {
        $species->delete();
        return redirect('/dashboard/species')->with('success', 'Spesies Dihapus');
    }
}
