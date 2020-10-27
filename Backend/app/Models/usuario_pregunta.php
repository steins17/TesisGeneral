<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_pregunta extends Model
{
    protected $table = "usuario_pregunta";
    protected $primaryKey = "id";
    protected $fillable = ["tipo", "nivel", "subnivel", "created_at", "updated_at", "usuario_crea", "usuario_modifica", "id_users", "id_pre_nivel"];
}