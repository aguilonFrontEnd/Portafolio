<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class rol extends Authenticatable
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre_rol',
        'descripcion',
    ];
}
