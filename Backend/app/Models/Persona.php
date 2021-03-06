<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $primaryKey= "id_persona";
    protected $fillable = ["fecha_nacimiento", "edad", "telefono", "celular", "direccion"];
}