<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use Carbon\Carbon;

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
            'email' => ['required'],
            'fecha_nacimiento' => ['required'],
            'edad' => ['required'],
            'telefono' => ['required'],
            'celular' => ['required'],
            'direccion' => ['required'],
        ]);
        
        /*
            tipos
            1=>escuchar-imagen
            2=>escuchas-imagen-escoger
            3=>ver-escribir-oracion-correcta
            4=>escuchar-escribir
            5=>ver-hablar
        */

        $user = User::findOrFail($request->id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->save();

        $dat=date_create($request->fecha_nacimiento);
        $date = date_format($dat,"Y-m-d");

        if(isset($request->id_persona)){
            $perfil = Persona::findOrFail($request->id_persona);
            $perfil->fecha_nacimiento=$date;
            $perfil->edad= $request->edad;
            $perfil->telefono= $request->telefono;
            $perfil->celular= $request->celular;
            $perfil->direccion= $request->direccion;
            $perfil->id_users= $request->id;
            $perfil->save();
        }else{
            $perfil = new Persona();
            $perfil->fecha_nacimiento=$date;
            $perfil->edad= $request->edad;
            $perfil->telefono= $request->telefono;
            $perfil->celular= $request->celular;
            $perfil->direccion= $request->direccion;
            $perfil->id_users= $request->id;
            $perfil->save();
        }
    }
    public function imagen(Request $request){
        $id = Auth::user()->id;
        if ($request->file('imagen')) {
            $file_imagen = $request->file('imagen');
            $nombre = $file_imagen->getClientOriginalName();
            $data = User::where("id", "=", $id)->get();
            $imagenborrar = $data[0]["foto"];
            if(strlen($imagenborrar)>3){
                if (file_exists(base_path().'/imagenes/'.$imagenborrar)) {
                    unlink(base_path().'/imagenes/'.$imagenborrar);
                }
            }
            $nombre_imagen = $id.'tesis'. $nombre;
            $request->file('imagen')->move(base_path().'/imagenes', $nombre_imagen);

            $user = User::findOrFail($id);
            $user->foto = $nombre_imagen;
            $user->save();
        }

        $request->user()->tokens()->delete();
        $user = User::where('id', $id)->first();
        return $user->createToken("browser")->plainTextToken;
    }
    public function password(Request $request){
        $id = Auth::user()->id;

        $user = User::where('id', $id)->first();
        if (!$user || !Hash::check($request->old_password, $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => ['The provided credentials are incorrect.'],
            ]);
        }

        $request->validate([
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $userc = User::findOrFail($request->id);
        $userc->password = Hash::make($request->password);
        $userc->save();

        $request->user()->tokens()->delete();
        $user = User::where('id', $id)->first();
        return $user->createToken("browser")->plainTextToken;
    }
}
