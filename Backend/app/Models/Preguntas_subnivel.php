<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preguntas_subnivel extends Model
{
    protected $table = 'preguntas_subnivel';
    protected $primarykey = 'id_preguntas_subnivel';
    protected $fillable = ['nombre', 'descripcion', 'foto', 'audio', 'oraciones', 'tipo', 'estado', 'tipo_campo', 'valor_campo','respuesta_campo'];
}
