<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDevices;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    /**
     * API Based registration
     *
     * @param Request $request
     * @return mixed
     */
    public function register (Request $request)
    {
        $this->validator($request->all())->validate();

//        event(new Registered($user = $this->create($request->all())));

        if ($user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
        ])) {
            $user_device = new UserDevices();
            $user_device->user_id = $user->id;
            $user_device->device_id = $request->device_id;
            $user_device->device_model = $request->device_model;
            $user_device->version = $request->version;
            $user_device->os_version = $request->os_version;
            $user_device->save();
            return $user;
        }
        return response()
            ->json(['Error Creating User' => 'An Unknown Error Occured'], 500);
    }

    /**
     * Login via API
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('test');
            dd($token);
            return Auth::user();
        }
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
