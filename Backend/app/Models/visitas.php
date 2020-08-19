<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visitas extends Model
{
    protected $table = 'visitas';
    protected $primarykey = 'id';
    protected $fillable = ['ip', 'conteo', 'fechas'];
}
