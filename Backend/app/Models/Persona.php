<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primarykey = 'id';
    protected $fillable = ['fecha_nacimiento', 'edad', 'telefono', 'celular', 'direccion', 'foto'];
}
