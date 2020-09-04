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
            $valor_campo = $res->valor_campo;
            $preguntas_subnivel = $res->id;
            $tipo=0;
            $campo_r = mb_strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
            $valor_r = mb_strtolower(rtrim($valor_campo, '.'));
            if($valor_r==$campo_r){
                $tipo=1;
            }

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
            $valor_campo = $res->valor_campo;
            $preguntas_subnivel = $res->id;
            $tipo=0;
            $campo_r = mb_strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
            $valor_r = mb_strtolower(rtrim($valor_campo, '.'));
            if($valor_r==$campo_r){
                $tipo=1;
            }

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
    function palabras_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 3");
        for($i=0; $i<10; $i++){
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

            $nv3 = new Usuario_pregunta();
            $nv3->tipo = $tipo;
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
    function llamarresultados(){
        $id = Auth::user()->id;
        $subnivel1 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 1 AND id_users = $id");
        $subnivel2 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 2 AND id_users = $id");
        $subnivel3 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 3 AND subnivel = 3 AND id_users = $id");
        return [ 'subnivel1' => $subnivel1, 'subnivel2' => $subnivel2, 'subnivel3' => $subnivel3 ];
    }
    function listar(){
        $letras = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 3 AND sb.subnivel = 1");
        $silabas = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 3 AND sb.subnivel = 2");
        $palabras = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 3 AND sb.subnivel = 3");
        return [ 'letras' => $letras, 'silabas' => $silabas, 'palabras' => $palabras ];
    }
    function guardar_l(Request $rq){
        $user = Auth::user()->id;

        $file_imagen = $rq->file('imagen');
        $destino = base_path().'/imagenes/nivel3_ima';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $datos = new Subnivel();
        $datos->audio = $rq->pregunta;
        $datos->nivel = 3;
        $datos->subnivel = 1;
        $datos->usuario_crea = $user;
        $datos->foto = $nombre_imagen;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 3;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('imagen')->move($destino, $nombre_imagen);

    }
    function guardar_s(Request $rq){
        $user = Auth::user()->id;

        $file_imagen = $rq->file('imagen');
        $destino = base_path().'/imagenes/nivel3_ima';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $datos = new Subnivel();
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 3;
        $datos->subnivel = 2;
        $datos->usuario_crea = $user;
        $datos->foto = $nombre_imagen;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 3;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('imagen')->move($destino, $nombre_imagen);

    }
    function guardar_p(Request $rq){
        $user = Auth::user()->id;

        $file_imagen = $rq->file('imagen');
        $destino = base_path().'/imagenes/nivel3_ima';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $datos = new Subnivel();
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 3;
        $datos->subnivel = 3;
        $datos->usuario_crea = $user;
        $datos->foto = $nombre_imagen;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 3;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('imagen')->move($destino, $nombre_imagen);

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
