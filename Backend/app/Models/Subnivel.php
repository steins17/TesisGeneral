<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subnivel extends Model
{
    protected $table = 'subnivel';
    protected $primarykey = 'id_subnivel';
    protected $fillable = ['nombre', 'descripcion', 'foto', 'audio'];
}
