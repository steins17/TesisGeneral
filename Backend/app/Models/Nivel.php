<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "nivel";
    protected $primarykey = "id";
    protected $fillable = ["nivel", "nombre", "descripcion", "usuario_crea", "usuario_modifica"];
}
