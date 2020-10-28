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
            if(isset($rq[$i]["id"])){
                $id = $rq[$i]["id"];
                $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
                $res = $bddres[0];
                $tipo = $res->tipo;
                $preguntas_subnivel = $res->id;

                $nv2 = new Usuario_pregunta();
                $nv2->tipo = $tipo;
                $nv2->nivel = 2;
                $nv2->subnivel = 1;
                $nv2->id_users = $user;
                $nv2->id_pre_nivel = $preguntas_subnivel;
                $nv2->usuario_crea = $user;
                $nv2->save();
            }    
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 1");
    }
    function silabas_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 2");
        for($i=0; $i<10; $i++){
            if(isset($rq[$i]["id"])){
                $id = $rq[$i]["id"];
                $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
                $res = $bddres[0];
                $tipo = $res->tipo;
                $preguntas_subnivel = $res->id;

                $nv2 = new Usuario_pregunta();
                $nv2->tipo = $tipo;
                $nv2->nivel = 2;
                $nv2->subnivel = 2;
                $nv2->id_users = $user;
                $nv2->id_pre_nivel = $preguntas_subnivel;
                $nv2->usuario_crea = $user;
                $nv2->save();
            }
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 2");
    }
    function oraciones_respuesta(Request $rq){
        $user = Auth::user()->id;
        DB::delete("DELETE FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 3");
        for($i=0; $i<10; $i++){
            if(isset($rq[$i]["id"])){
                $id = $rq[$i]["id"];
                $bddres = DB::select("SELECT ps.* FROM preguntas_subnivel ps INNER JOIN subnivel sb ON sb.id=ps.id_subnivel WHERE ps.id = $id");
                $res = $bddres[0];
                $valor_campo = $res->valor_campo;
                $tipo=0;
                $campo_r= mb_strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
                
                if($valor_campo==$campo_r){
                    $tipo=1;
                }
                $preguntas_subnivel = $res->id;

                $nv2 = new Usuario_pregunta();
                $nv2->tipo = $tipo;
                $nv2->nivel = 2;
                $nv2->subnivel = 3;
                $nv2->id_users = $user;
                $nv2->id_pre_nivel = $preguntas_subnivel;
                $nv2->usuario_crea = $user;
                $nv2->save();
            }
        }
        return DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 3");
    }
    function llamardatos(){
        $subnivel = DB::select("SELECT *, (SELECT estado FROM preguntas_subnivel WHERE id_subnivel = subnivel.id LIMIT 1) AS estado FROM subnivel WHERE nivel=2 ");

        $preguntas = Preguntas_subnivel::select('id', 'foto','valor_campo', 'nivel', 'id_subnivel')->where("nivel", "=", 2)->where("estado", "=", 1)->get();
        return [
            'subnivel' => $subnivel,
            'preguntas' => $preguntas,
        ];
    }
    function llamarresultados(){
        $id = Auth::user()->id;
        $subnivel1 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 1 AND id_users = $id");
        $subnivel2 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 2 AND id_users = $id");
        $subnivel3 = DB::select("SELECT sum(tipo) AS suma, count(*) AS total FROM usuario_pregunta WHERE nivel = 2 AND subnivel = 3 AND id_users = $id");
        return [ 'subnivel1' => $subnivel1, 'subnivel2' => $subnivel2, 'subnivel3' => $subnivel3 ];
    }
    function listar(){
        $letras = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio AS audiosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 1");
        $silabas = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio AS audiosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 2");
        $oraciones = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.nombre FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 3");
        return [ 'letras' => $letras, 'silabas' => $silabas, 'oraciones' => $oraciones ];
    }
    function guardar(Request $rq){
        $user = Auth::user()->id;
        $datos = new Subnivel();
        $datos->audio = $rq->audio;
        $datos->nivel = 2;
        $datos->subnivel = 1;
        $datos->usuario_crea = $user;
        $datos->save();

        $id = $datos->id;

        $file_imagen = $rq->file('foto1');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/letras';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = new Preguntas_subnivel();
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo1;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('foto1')->move($destino, $nombre_imagen);

        // foto2
        $file_imagen = $rq->file('foto2');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/letras';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = new Preguntas_subnivel();
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo2;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('foto2')->move($destino, $nombre_imagen);
    }
    function guardar_s(Request $rq){
        $user = Auth::user()->id;

        $datos = new Subnivel();
        $datos->audio = $rq->audio;
        $datos->nivel = 2;
        $datos->subnivel = 2;
        $datos->usuario_crea = $user;
        $datos->save();

        $id = $datos->id;

        $file_imagen = $rq->file('foto1');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/silabas';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = new Preguntas_subnivel();
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo1;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('foto1')->move($destino, $nombre_imagen);


        $file_imagen = $rq->file('foto2');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/silabas';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = new Preguntas_subnivel();
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo2;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->save();

        $rq->file('foto2')->move($destino, $nombre_imagen);
    }
    function guardar_oraciones(Request $rq){
        $user = Auth::user()->id;

        $file_imagen = $rq->file('imagen');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/oraciones';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $datos = new Subnivel();
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 2;
        $datos->subnivel = 3;
        $datos->usuario_crea = $user;
        $datos->foto = $nombre_imagen;
        $datos->save();

        $id = $datos->id;
        
        $ps = new Preguntas_subnivel();
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->id_subnivel = $id;
        $ps->usuario_crea = $user;
        $ps->foto = $nombre_imagen;
        $ps->save();

        $rq->file('imagen')->move($destino, $nombre_imagen);
    }
    function editar_l(Request $rq){
        $user = Auth::user()->id;

        $datos = Subnivel::findOrFail($rq->id);
        $datos->audio = $rq->audio;
        $datos->nivel = 2;
        $datos->subnivel = 1;
        $datos->usuario_modifica = $user;
        $datos->save();

        // $id = $datos->id_pregunta;

        // Preguntas_subnivel::where('id_subnivel',$id)->delete();

        $file_imagen = $rq->file('foto1');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/letras';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = Preguntas_subnivel::findOrFail($rq->id_pregunta);
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo1;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->usuario_modifica = $user;
        $ps->save();

        $rq->file('foto1')->move($destino, $nombre_imagen);
        return $user;
    }
    function editar_s(Request $rq){
        $user = Auth::user()->id;

        $datos = Subnivel::findOrFail($rq->id);
        $datos->audio = $rq->audio;
        $datos->nivel = 2;
        $datos->subnivel = 2;
        $datos->usuario_modifica = $user;
        $datos->save();

        // $id = $datos->id;

        // Preguntas_subnivel::where('id_subnivel',$id)->delete();

        $file_imagen = $rq->file('foto1');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/silabas';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $ps = Preguntas_subnivel::findOrFail($rq->id_pregunta);
        $ps->foto = $nombre_imagen;
        $ps->tipo = $rq->tipo1;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->usuario_modifica = $user;
        $ps->save();

        $rq->file('foto1')->move($destino, $nombre_imagen);

        
    }
    function editar_o(Request $rq){
        $user = Auth::user()->id;

        $file_imagen = $rq->file('imagen');
        $destino = base_path().'/../FrontEnd/public/archivos/imagenes/nivel2/oraciones/';
        $nombre_imagen = $file_imagen->getClientOriginalName();

        $datos = Subnivel::findOrFail($rq->id);
        $datos->nombre = $rq->pregunta;
        $datos->nivel = 2;
        $datos->subnivel = 3;
        $datos->usuario_modifica = $user;
        $datos->foto = $nombre_imagen;
        $datos->save();

        
        $ps = Preguntas_subnivel::findOrFail($rq->id_pregunta);
        $ps->valor_campo = $rq->respuesta;
        $ps->nivel = 2;
        $ps->estado = 1;
        $ps->usuario_modifica = $user;
        $ps->foto = $nombre_imagen;
        $ps->save();

        $rq->file('imagen')->move($destino, $nombre_imagen);
    }
    public function eliminar_letras($id){
        Subnivel::where('id',$id)->delete();
        Preguntas_subnivel::where('id_subnivel',$id)->delete();
    }
    public function eliminar_silabas($id){
        Subnivel::where('id',$id)->delete();
        Preguntas_subnivel::where('id_subnivel',$id)->delete();
    }
    public function eliminar_oraciones($id){
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

