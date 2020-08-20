<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken("browser")->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }






    public function perfil(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users']
        ]);
        if(strlen($request->password)>=8){
            $request->validate([
                'password' => ['required', 'min:8', 'confirmed']
            ]);
        }

        $user = User::findOrFail();
        if(strlen($request->password)>=8){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $perfil = Perfil::findOrFail();
        $perfil->id=$request->id;
        $perfil->name=$request->name;
        $perfil->email=$request->email;
        $perfil->password=$request->password;
        $perfil->password_confirmation=$request->password_confirmation;
        $perfil->save();

        if(strlen($request->password)>=8){
            $request->user()->tokens()->delete();
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required'
            ]);
    
            $user = User::where('email', $request->email)->first();
    
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
    
            return $user->createToken($request->device_name)->plainTextToken;
        }
        
    }
}
