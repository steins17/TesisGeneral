<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\Usuario_pregunta;
use App\Models\Preguntas_subnivel;

class Nivel2Controller extends Controller
{
    function letras_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 1");
        for($i=0; $i<4; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $preguntas_subnivel = $res->id_subnivel;

            $nv2 = new Usuario_pregunta();
            $nv2->tipo = $tipo;
            $nv2->nivel = 2;
            $nv2->subnivel = 1;
            $nv2->id_users = $user;
            $nv2->id_pre_nivel = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 1");
    }
    function silabas_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 2");
        for($i=0; $i<10; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $preguntas_subnivel = $res->id_subnivel;

            $nv2 = new Usuario_pregunta();
            $nv2->tipo = $tipo;
            $nv2->nivel = 2;
            $nv2->subnivel = 2;
            $nv2->id_users = $user;
            $nv2->id_pre_nivel = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 2");
    }
    function oraciones_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 3");
        for($i=0; $i<10; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $valor_campo = $res->valor_campo;
            $tipo=0;
            $campo_r= strtolower(rtrim($rq->valor_campo, '.'));
            if($valor_campo==$campo_r){
                $tipo=1;
            }
            $preguntas_subnivel = $res->id_subnivel;

            $nv2 = new Usuario_pregunta();
            $nv2->tipo = $tipo;
            $nv2->nivel = 2;
            $nv2->subnivel = 3;
            $nv2->id_users = $user;
            $nv2->id_pre_nivel = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 3");
    }
    
    function llamardatos(){
        $subnivel = Subnivel::select('*')->where("nivel", "=", 2)->get();

        $preguntas = Preguntas_subnivel::select('id', 'foto','valor_campo', 'nivel', 'id_subnivel')->where("nivel", "=", 2)->get();
        return [
            'subnivel' => $subnivel,
            'preguntas' => $preguntas,
        ];
    }
}
