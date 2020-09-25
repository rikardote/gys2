<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'puesto', 'descripcion'
    ];
    public function setdescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }
}
