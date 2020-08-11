<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona_acces_tokens extends Model
{
    protected $table = 'personal_access_tokensOcultar';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'abilities'];
}
