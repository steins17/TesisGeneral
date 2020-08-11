<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visitas extends Model
{
    protected $table = 'visitas';
    protected $primarykey = 'id_visitas';
    protected $fillable = ['ip', 'conteo', 'fechas'];
}
