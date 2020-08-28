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
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 1");
        for($i=0; $i<10; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $preguntas_subnivel = $res->id_subnivel;

            $nv3 = new Usuario_pregunta();
            $nv3->tipo = $tipo;
            $nv3->nivel = 3;
            $nv3->subnivel = 1;
            $nv3->id_users = $user;
            $nv3->id_pre_nivel = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 1");
    }
    function silabas_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 2");
        for($i=0; $i<10; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $tipo = $res->tipo;
            $preguntas_subnivel = $res->id_subnivel;

            $nv3 = new Usuario_pregunta();
            $nv3->tipo = $tipo;
            $nv3->nivel = 3;
            $nv3->subnivel = 2;
            $nv3->id_users = $user;
            $nv3->id_pre_nivel = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 2");
    }
    function palabras_respuesta(Request $rp){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 3");
        for($i=0; $i<10; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $valor_campo = $res->valor_campo;
            $preguntas_subnivel = $res->id_subnivel;

            $nv3 = new Usuario_pregunta();
            $nv3->tipo = $valor_campo;
            $nv3->nivel = 3;
            $nv3->subnivel = 3;
            $nv3->id_users = $user;
            $nv3->id_pre_nivel = $preguntas_subnivel;
            $nv3->usuario_crea = $user;
            $nv3->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 3");
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
