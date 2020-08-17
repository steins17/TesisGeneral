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
    public function recuperar(){
        $user = Auth::user()->id;
        $data = User::select("*")->leftJoin("persona", "persona.id_users", "=", "users.id")->where("users.id", "=", $user)->get();
        return $data[0];
    }

    public function restablecer(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'direccion' => ['required']
        ]);
        if(strlen($request->password)>=8){
            $request->validate([
                'password' => ['required', 'min:8', 'confirmed']
            ]);
        }

        $user = User::findOrFail();
        $user->save();

        $perfil = Persona::findOrFail();
        $perfil->fecha_nacimiento=$request->fecha_nacimiento;
        $perfil->edad= $request->edad;
        $perfil->telefono= $request->telefono;
        $perfil->celular= $request->celular;
        $perfil->direccion= $request->direccion;
        $perfil->email= $request->email;
        $perfil->foto= $request->foto;
        $perfil->save();

        $request->user()->tokens()->delete();
        $user = User::where('id', $id)->first();
        return $user->createToken($request->device_name)->plainTextToken;
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
