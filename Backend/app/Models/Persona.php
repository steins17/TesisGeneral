<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
<<<<<<< HEAD
    protected $table = "persona";
    protected $primaryKey= "id_persona";
    protected $fillable = ["fecha_nacimiento", "edad", "telefono", "celular", "direccion"];
=======
    protected $table = 'persona';
    protected $primarykey = 'id';
    protected $fillable = ['fecha_nacimiento', 'edad', 'telefono', 'celular', 'direccion', 'foto'];
>>>>>>> 0abffb3b53db82e159a3289d046ee8dd2475a824
}
