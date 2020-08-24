<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subnivel extends Model
{
    protected $table = "subnivel";
    protected $primarykey = "id";
    protected $fillable = ["nombre", "descripcion", "foto", "audio"];
}
