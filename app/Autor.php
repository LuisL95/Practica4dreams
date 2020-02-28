<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable =  ['nombre', 'apellido', 'fechaNacimiento', 'nacionalidad'];


    public function libro()
    {
        return $this->hasMany(Libro::class);
    }
}

