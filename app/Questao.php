<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questao';
    public $timestamps = false;
    public function alternativa(){
        return $this->hasMany('App\Alternativa');
    }


}
