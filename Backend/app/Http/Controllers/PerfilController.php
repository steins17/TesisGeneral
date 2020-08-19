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
            'name' => ['required', 'name', 'users'],
            'email' => ['required', 'email', 'unique:users'],
            'fecha_nacimiento' => ['required', 'fecha_nacimiento', 'persona'],
            'edad' => ['required', 'edad', 'persona'],
            'telefono' => ['required', 'telefono', 'persona'],
            'celular' => ['required', 'celular', 'persona'],
            'direccion' => ['required', 'direccion', 'persona'],
            'foto' => ['required', 'foto', 'persona']
        ]);
        if(strlen($request->password)>=8){
            $request->validate([
                'password' => ['required', 'min:8', 'confirmed']
            ]);
        }
        /*
            tipos
            1=>escuchar-imagen
            2=>escuchas-imagen-escoger
            3=>escuchar-escribir
        */

        $user = User::findOrFail();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->save();

        $perfil = Persona::findOrFail();
        $perfil->fecha_nacimiento=$request->fecha_nacimiento;
        $perfil->edad= $request->edad;
        $perfil->telefono= $request->telefono;
        $perfil->celular= $request->celular;
        $perfil->direccion= $request->direccion;
        $perfil->foto= $request->foto;
        $perfil->save();

        $request->user()->tokens()->delete();
        $user = User::where('id', $id)->first();
        return $user->createToken($request->device_name)->plainTextToken;
    }
}
