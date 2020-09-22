<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplente extends Model
{
    //

    public function getfullnameAttribute($value)
    {
       return $this->nombre . ' ' . $this->apellido_pat. ' ' . $this->apellido_mat;
    }
    public function setnameAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
}
