<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'puesto', 'descripcion'
    ];
    public function setdescripcionttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }
}
