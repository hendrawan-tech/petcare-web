<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function updatepassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        $currentPassword = Auth::user()->password;
        if (Hash::check($data['old_password'], $currentPassword)) {
            if ($data['new_password'] == $data['confirm_password']) {
                $user = User::where('id', Auth::user()->id)->first();
                $password = Hash::make($data['new_password']);
                $user->update(['password' => $password]);
                return redirect('/dashboard/settings/profile')->with('success', 'Password Diganti');
            } else {
                return redirect('/dashboard/settings/profile')->with('password', 'Konfirmasi Password Salah');
            }
        } else {
            return redirect('/dashboard/settings/profile')->with('password', 'Password Lama Salah');
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return view('user.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'avatar' => 'file|between:0,2048|mimes:jpeg,jpg,png',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if ($request['avatar']) {
            $file = $request->file('avatar');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload = 'upload/';
            $file->move($upload, $filename);
            $data['avatar'] = $filename;
        }

        $user->update($data);
        return redirect('/dashboard/settings/profile')->with('success', 'Profil Diubah');
    }
}
