<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\Preguntas_subnivel;

class Nivel2Controller extends Controller
{
    function letras_respuesta(Request $rq){
        $user = Auth::user()->id;
        for($i=0; $i<strlen($rq); $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.*, sb.id_nivel FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id_subnivel=ps.id_subnivel WHERE id_preguntas_subnivel = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $nivel = $res->id_nivel;
            $subnivel = $res->id_subnivel;
            $preguntas_subnivel = $res->id_preguntas_subnivel;

            $nv2 = new Nivel2();
            $nv2->tipo = $tipo;
            $nv2->id_users = $user;
            $nv2->id_nivel = $nivel;
            $nv2->id_subnivel = $subnivel;
            $nv2->id_pre_nive = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
    }
    function silabas_respuesta(Request $rq){
        $user = Auth::user()->id;
        for($i=0; $i<strlen($rq); $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.*, sb.id_nivel FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id_subnivel=ps.id_subnivel WHERE id_preguntas_subnivel = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $nivel = $res->id_nivel;
            $subnivel = $res->id_subnivel;
            $preguntas_subnivel = $res->id_preguntas_subnivel;

            $nv2 = new Nivel2();
            $nv2->tipo = $tipo;
            $nv2->id_users = $user;
            $nv2->id_nivel = $nivel;
            $nv2->id_subnivel = $subnivel;
            $nv2->id_pre_nive = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
    }
    function oraciones_respuesta(Request $rp){
        $user = Auth::user()->id;
        for($i=0; $i<strlen($rq); $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.*, sb.id_nivel FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id_subnivel=ps.id_subnivel WHERE id_preguntas_subnivel = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $nivel = $res->id_nivel;
            $subnivel = $res->id_subnivel;
            $preguntas_subnivel = $res->id_preguntas_subnivel;

            $nv2 = new Nivel2();
            $nv2->tipo = $tipo;
            $nv2->id_users = $user;
            $nv2->id_nivel = $nivel;
            $nv2->id_subnivel = $subnivel;
            $nv2->id_pre_nive = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
    }
    function llamardatos(){
        $nivel = Nivel::select('*')->where("nivel", "=", 2)->get();
        for($i=0; $i<count($nivel); $i++){
            $valor = $nivel[$i]["id_nivel"];
            $subnivel = Subnivel::select('*')->where("id_nivel", "=", $valor)->get();
            $preguntas = Preguntas_subnivel::select('*')->get();//->where("id_nivel", "=", $valor)->get();
        }
        return [
            'nivel' => $nivel,
            'subnivel' => $subnivel,
            'preguntas' => $preguntas,
        ];
    }
}
