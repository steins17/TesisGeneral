<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\Usuario_pregunta;
use App\Models\Preguntas_subnivel;


class Nivel3Controller extends Controller
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

            $nv3 = new Preguntas_subnivel();
            $nv3->tipo = $tipo;
            $nv3->id_users = $user;
            $nv3->id_nivel = $nivel;
            $nv3->id_subnivel = $subnivel;
            $nv3->id_pre_nive = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
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

            $nv3 = new Preguntas_subnivel();
            $nv3->tipo = $tipo;
            $nv3->id_users = $user;
            $nv3->id_nivel = $nivel;
            $nv3->id_subnivel = $subnivel;
            $nv3->id_pre_nive = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
        }
    }
    function palabras_respuesta(Request $rp){
        $user = Auth::user()->id;
        for($i=0; $i<strlen($rq); $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.*, sb.id_nivel FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id_subnivel=ps.id_subnivel WHERE id_preguntas_subnivel = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $nivel = $res->id_nivel;
            $subnivel = $res->id_subnivel;
            $preguntas_subnivel = $res->id_preguntas_subnivel;

            $nv3 = new Preguntas_subnivel();
            $nv3->tipo = $tipo;
            $nv3->id_users = $user;
            $nv3->id_nivel = $nivel;
            $nv3->id_subnivel = $subnivel;
            $nv3->id_pre_nive = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
        }
    }

    function llamardatos(){
        $subnivel = Subnivel::select('*')->where("nivel", "=", 3)->get();

        $preguntas = Preguntas_subnivel::select('id','valor_campo',  'nivel', 'id_subnivel')->where("nivel", "=", 3)->get();
        return [
            'subnivel' => $subnivel,
            'preguntas' => $preguntas,
        ];
    }
}
