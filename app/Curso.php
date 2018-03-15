<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    public  $primaryKey = 'id';

    public function usuario(){
        return $this->hasMany('App\Usuario');
    }
}
