<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\Usuario_pregunta;
use App\Models\Preguntas_subnivel;

class Nivel4Controller extends Controller
{
    function oraciones_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 1");
        for($i=0; $i<8; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $valor_campo = $res->valor_campo;
            $preguntas_subnivel = $res->id;

            $tipo=0;
            $campo_r = mb_strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
            $valor_r = mb_strtolower(rtrim($valor_campo, '.'));
            if($valor_r==$campo_r){
                $tipo=1;
            }

            $nv2 = new Usuario_pregunta();
            $nv2->tipo = $tipo;
            $nv2->nivel = 4;
            $nv2->subnivel = 1;
            $nv2->id_users = $user;
            $nv2->id_pre_nivel = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 1");
    }
    
    function frases_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 2");
        for($i=0; $i<5; $i++){
            $id = $rq[$i]["id"];
            $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
            $res = $bddres[0];
            $valor_campo = $res->valor_campo;
            $preguntas_subnivel = $res->id;

            $tipo=0;
            $campo_r = mb_strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
            $valor_r = mb_strtolower(rtrim($valor_campo, '.'));
            if($valor_r==$campo_r){
                $tipo=1;
            }

            $nv2 = new Usuario_pregunta();
            $nv2->tipo = $tipo;
            $nv2->nivel = 4;
            $nv2->subnivel = 2;
            $nv2->id_users = $user;
            $nv2->id_pre_nivel = $preguntas_subnivel;
            $nv2->usuario_crea = $user;
            $nv2->save();
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 2");
    }

    function llamardatos(){
        $subnivel = Subnivel::select('*')->where("nivel", "=", 4)->get();

        $preguntas = Preguntas_subnivel::select('id','valor_campo',  'nivel', 'id_subnivel')->where("nivel", "=", 4)->get();
        return [
            'subnivel' => $subnivel,
            'preguntas' => $preguntas,
        ];
    }
    function llamarresultados(){
        $id = Auth::user()->id;
        $subnivel1 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 1 AND id_users = $id");
        $subnivel2 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 2 AND id_users = $id");
        return [ 'subnivel1' => $subnivel1, 'subnivel2' => $subnivel2,];
    }
    function listar(){
        $oraciones = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 1");
        $frases = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 2");
        return [ 'oraciones' => $oraciones, 'frases' => $frases];
    }
    function guardar(Request $rq){
        return $rq;
        $oraciones = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 1");
        $frases = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 2");
        return [ 'oraciones' => $oraciones, 'frases' => $frases];
    }

    function agregar(Request $rq){
        $user = Auth::user()->id;
        $datos = new Subnivel();
        $datos->nombre=$rq->nombre;
        $datos->foto=$rq->foto;
        $datos->audio=$rq->audio;
        $datos->nivel=$rq->nivel;
        $datos->subnivel=$rq->subnivel;

        $datos = new Preguntas_subnivel();
        $datos->foto=$rq->foto;
        $datos->tipo=$rq->tipo;
        $datos->valor_campo=$rq->valor_campo;
        $datos->nivel=$rq->nivel;
        $datos->id_subnivel=$rq->id_subnivel;
        $datos->save();
    }
    function editar(Request $rq){
        $user = Auth::user()->id;
        $datos = Subnivel::findOrFail($rq->id);
        $datos->nombre=$rq->nombre;
        $datos->foto=$rq->foto;
        $datos->audio=$rq->audio;
        $datos->nivel=$rq->nivel;
        $datos->subnivel=$rq->subnivel;

        $datos = Preguntas_subnivel::findOrFail($rq->id);
        $datos->foto=$rq->foto;
        $datos->tipo=$rq->tipo;
        $datos->valor_campo=$rq->valor_campo;
        $datos->nivel=$rq->nivel;
        $datos->id_subnivel=$rq->id_subnivel;
        $datos->save();
    }
    public function eliminar($id){
        Subnivel::destroy($id);
        Preguntas_subnivel::destroy($id);
    }
}
