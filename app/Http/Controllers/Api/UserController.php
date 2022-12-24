<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return ResponseFormatter::error($validateUser->errors(), 'validation error', 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return ResponseFormatter::error(null, 'Email atau Kata Sandi anda salah!', 401);
            }

            $user = User::where('email', $request->email)->with('userMetas')->first();

            return ResponseFormatter::success([
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user,
            ], 'Berhasil Login',);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getUser(Request $request)
    {
        $user = $request->user();
        $user['user_metas'] = $request->user()->userMetas;
        if ($user) {
            return ResponseFormatter::success($user);
        } else {
            return ResponseFormatter::error();
        }
    }

    public function getOwner(Request $request)
    {
        $user = User::where('role_id', 3)->paginate($request->limit);
        if ($user) {
            return ResponseFormatter::success($user);
        } else {
            return ResponseFormatter::error();
        }
    }

    public function getPatient()
    {
        $patient = Patient::with('user', 'speciesPatient')->get();
        if ($patient) {
            return ResponseFormatter::success($patient);
        } else {
            return ResponseFormatter::error();
        }
    }

    public function getDetailUser(Request $request)
    {
        $patient = Patient::where('user_id', $request->id)->with('speciesPatient')->paginate($request->limit);
        if ($patient) {
            return ResponseFormatter::success($patient);
        } else {
            return ResponseFormatter::error();
        }
    }

    // get()
}
