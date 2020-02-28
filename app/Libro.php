<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable =  ['nombre','autor_id', 'resumen', 'npagina','edicion','genero_id','precio'];

    public function autor()
    {
        return $this->belongsTo(Autor::Class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

 }