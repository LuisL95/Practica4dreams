<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genres';
    protected $fillable =  ['nombre'];

    public function libro()
    {
        return $this->hasMany(Libro::class);
    }
}
