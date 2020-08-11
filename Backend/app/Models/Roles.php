<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primarykey = 'id_roles';
    protected $fillable = ['tipo', 'drescipcion'];
}
