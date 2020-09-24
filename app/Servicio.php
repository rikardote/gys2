<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'servicio', 'descripcion'
    ];
    public function setdescripcionttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }
}
