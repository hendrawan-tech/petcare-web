<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseFormatter;
use App\Verify\Service;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Verification service
     *
     * @var Service
     */
    protected $verify;

    /**
     * Create a new controller instance.
     *
     * @param Service $verify
     */
    public function __construct(Service $verify)
    {
        $this->verify = $verify;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'phone' => $data['phone_number'],
            'address' => "BWS",
            'role_id' => "1",
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, User $user)
    {
        $verification = $this->verify->startVerification($user->phone_number, $request->post('channel', 'sms'));
        if (!$verification->isValid()) {
            $user->delete();

            $errors = new MessageBag();
            foreach ($verification->getErrors() as $error) {
                $errors->add('verification', $error);
            }

            return ResponseFormatter::error($errors);
        }

        $messages = new MessageBag();
        $messages->add('verification', "Code sent to {$request->user()->phone_number}");

        return ResponseFormatter::success(null, "Registrasi Berhasil");
    }
}
