<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $campus = json_decode(file_get_contents(base_path('public/local/campus.json')), true);
        $specialist = json_decode(file_get_contents(base_path('public/local/specialist.json')), true);
        return view('user.create', compact('campus', 'specialist'));
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
            'phone' => 'required|regex:/(0)[0-9]{9}/|max:16',
            'address' => 'required|min:3',
            'email' => 'required|min:3|unique:users,email',
            'alumni' => 'required|min:3',
            'specialist' => 'required|min:3',
            'str_number' => 'required|digits:16|numeric',
            'experience' => 'required|max:2',
            'avatar' => 'required|file|between:0,2048|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('avatar');
        $nameFile = $file->getClientOriginalName();
        $destinationPath = public_path() . '/upload';
        $file->move($destinationPath, $nameFile);
        $filename = $file->getClientOriginalName();

        $user = User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'role_id' => 2,
            'avatar' => $filename,
            'password' => Hash::make('12345678'),
            'verified' => '1',
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
