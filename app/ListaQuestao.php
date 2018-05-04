<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaQuestao extends Model
{
    protected $table = 'lista_questao';

    public  $primaryKey = 'id';

    public function questao(){
        return $this->hasMany('App\Questao');
    }

}
