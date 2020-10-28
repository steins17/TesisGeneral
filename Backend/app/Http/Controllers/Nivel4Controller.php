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
            if(isset($rq[$i]["id"])){
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
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 1");
    }
    
    function frases_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 2");
        for($i=0; $i<5; $i++){
            if(isset($rq[$i]["id"])){
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
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 4 AND subnivel = 2");
    }

    function llamardatos(){
        $subnivel = DB::select("SELECT *, (SELECT estado FROM preguntas_subnivel WHERE id_subnivel = subnivel.id LIMIT 1) AS estado FROM subnivel WHERE nivel=4 ");

        $preguntas = Preguntas_subnivel::select('id','valor_campo',  'nivel', 'id_subnivel')->where("nivel", "=", 4)->where("estado", "=", 1)->get();
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
        $oraciones = DB::select("SELECT ps.*, sb.nombre AS nombresbs, sb.nombre FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 1");
        $frases = DB::select("SELECT ps.*, sb.nombre AS nombresbs, sb.nombre FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 4 AND sb.subnivel = 2");
        return [ 'oraciones' => $oraciones, 'frases' => $frases];
    }
    function guardar_oraciones(Request $rq){
        $user = Auth::user()->id;

        

        $datos = new Subnivel();
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 4;
        $datos->subnivel = 1;
        $datos->usuario_crea = $user;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 4;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();
    }
    function guardar_frases(Request $rq){
        $user = Auth::user()->id;

        

        $datos = new Subnivel();
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 4;
        $datos->subnivel = 2;
        $datos->usuario_crea = $user;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 4;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();
    }
    function editar_oraciones(Request $rq){
        $user = Auth::user()->id;

        $datos = Subnivel::findOrFail($rq->id);
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 4;
        $datos->subnivel = 1;
        $datos->usuario_modifica = $user;
        $datos->save();

        
        $ps = Preguntas_subnivel::findOrFail($rq->id_pregunta);
        $ps->valor_campo = $rq->respuesta;
        $ps->estado = 1;
        $datos->usuario_modifica = $user;
        $ps->save();
    }
    function editar_frases(Request $rq){
        $user = Auth::user()->id;

        $datos = Subnivel::findOrFail($rq->id);
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 4;
        $datos->subnivel = 2;
        $datos->usuario_modifica = $user;
        $datos->save();
        
        $ps = Preguntas_subnivel::findOrFail($rq->id_pregunta);
        $ps->valor_campo = $rq->respuesta;
        $ps->estado = 1;
        $ps->usuario_modifica = $user;
        $ps->save();
    }
    public function eliminar_oraciones($id){
        Subnivel::where('id',$id)->delete();
        Preguntas_subnivel::where('id_subnivel',$id)->delete();
    }
    public function eliminar_frases($id){
        Subnivel::where('id',$id)->delete();
        Preguntas_subnivel::where('id_subnivel',$id)->delete();
    }
    public function cambiar_estado(Request $rq){
        $estado = $rq->estado;
        $id = $rq->id;
        $ps = Preguntas_subnivel::findOrFail($id);
        $ps->estado = $estado;
        $ps->save();
    }
}
