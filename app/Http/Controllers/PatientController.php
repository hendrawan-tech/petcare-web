<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\SpeciesPatient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id', '3')->get();
        $species = SpeciesPatient::all();
        return view('patient.create', compact('users', 'species'));
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
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'species_patient_id' => 'required',
            'user_id' => 'required',
            'image' => 'file|between:0,2048|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('image');
        $nameFile = $file->getClientOriginalName();
        $destinationPath = public_path() . '/upload';
        $file->move($destinationPath, $nameFile);
        $filename = $file->getClientOriginalName();

        $data['image'] = $filename;

        Patient::create($data);

        return redirect('/dashboard/patients')->with('success', 'Pasien Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/dashboard/patients')->with('success', 'Pasien Dihapus');
    }
}
