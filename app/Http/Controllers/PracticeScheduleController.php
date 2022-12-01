<?php

namespace App\Http\Controllers;

use App\Models\PracticeSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class PracticeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = PracticeSchedule::all();
        return view('shcedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id', 2)->get();
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
        return view('shcedule.create', compact('users', 'days'));
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
            'user_id' => 'required',
            'day' => 'required',
            'start_time' => 'required|max:5',
            'end_time' => 'required|max:5',
        ]);

        PracticeSchedule::create($data);
        return redirect('/dashboard/practice-schedules')->with('success', 'Jadwal Dokter Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PracticeSchedule  $practiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(PracticeSchedule $practice_schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PracticeSchedule  $practiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PracticeSchedule $practice_schedule)
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
        return view('shcedule.edit', compact('practice_schedule', 'days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PracticeSchedule  $practiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PracticeSchedule $practice_schedule)
    {
        $data = $request->validate([
            'day' => 'required',
            'start_time' => 'required|max:5',
            'end_time' => 'required|max:5',
        ]);

        $practice_schedule->update($data);
        return redirect('/dashboard/practice-schedules')->with('success', 'Jadwal Dokter Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PracticeSchedule  $practiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PracticeSchedule $practice_schedule)
    {
        $practice_schedule->delete();
        return redirect('/dashboard/practice-schedules')->with('success', 'Jadwal Dokter Dihapus');
    }
}
