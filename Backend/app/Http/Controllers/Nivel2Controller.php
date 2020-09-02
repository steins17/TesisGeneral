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
            $campo_r= strtolower(rtrim($rq[$i]["respuesta_campo"], '.'));
            
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
        $oraciones = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 3");
        return [ 'letras' => $letras, 'silabas' => $silabas, 'oraciones' => $oraciones ];
    }
    function guardar(Request $rq){
<<<<<<< HEAD
        /*$file_imagen = $rq->foto[0]->file('imagen');
        $nombre = $file_imagen->getClientOriginalName();*/
        $files = $rq->file('foto');
        $file_count = count($files);
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'required');
            //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount ++;
            }
        }
=======
        return $rq;
        $letras = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio AS audiosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 1");
        $silabas = DB::select("SELECT ps.*, sb.foto AS fotosb, sb.audio AS audiosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 2");
        $oraciones = DB::select("SELECT ps.*, sb.foto AS fotosb FROM subnivel sb INNER JOIN preguntas_subnivel ps ON sb.id=ps.id_subnivel WHERE sb.nivel = 2 AND sb.subnivel = 3");
        return [ 'letras' => $letras, 'silabas' => $silabas, 'oraciones' => $oraciones ];
>>>>>>> ebd5c7e94025cb824309f925ebb90e40803b57d0
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

