<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usurario_pregunta extends Model
{
    protected $table = 'usuario_pregunta';
    protected $primarykey = 'id_usuario_pregunta';
    protected $fillable = ['tipo', 'descripcion', 'foto', 'audio'];
}
