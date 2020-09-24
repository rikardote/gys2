<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'num_empleado', 'nombre'
    ];
    public function setnombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
}
