<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'phone' => 'required|max:16',
            'email' => 'required|min:3',
            'address' => 'required|min:3',
            'alumni' => 'required|min:3',
            'specialist' => 'required|min:3',
            'str_number' => 'required|max:16',
            'experience' => 'required|max:2',
            'avatar' => 'required|file|between:0,2048|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('images');
        $nameFile = $file->getClientOriginalName();
        $destinationPath = public_path() . '/upload';
        $file->move($destinationPath, $nameFile);
        $filename = $file->getClientOriginalName();

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'role_id' => 2,
            'avatar' => $filename,
            'password' => Hash::make('12345678'),
        ]);

        UserMeta::create([
            'alumni' => $data['alumni'],
            'specialist' => $data['specialist'],
            'str_number' => $data['str_number'],
            'experience' => $data['experience'],
            'user_id' => $user->id,
        ]);

        return redirect('/dashboard/users')->with('success', 'Dokter Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
