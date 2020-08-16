<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PerfilController extends Controller
{
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

        $perfil = Pefril::findOrFail();
        $perfil->fecha_nacimiento=$request->fecha_nacimiento;
        $perfil->edad= $request->edad;
        $perfil->telefono= $request->telefono;
        $perfil->celular= $request->celular;
        $perfil->direccion= $request->direccion;
        $perfil->email= $request->email;
        $perfil->foto= $request->foto;
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

    // public function listar(){
    //     $datos = Persona::all('*');
    //     return $datos;
    // }
    // public function agregar(Request $request)
    // {
    //     $datos = new Persona();
    //     $datos->fecha_nacimiento=$request->fecha_nacimiento;
    //     $datos->edad= $request->edad;
    //     $datos->telefono= $request->telefono;
    //     $datos->celular= $request->celular;
    //     $datos->direccion= $request->direccion;
    //     $datos->foto= $request->foto;
    //     $datos->save();
    // }
}
