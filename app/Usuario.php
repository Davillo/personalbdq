<?php


namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['nome','email','senha'];
    protected $hidden = ['senha','remember_token'];
    protected $primaryKey = 'id';
    protected $table = 'usuario';
    public $timestamps  = false;


    public function curso(){
        return $this->hasOne('App\Curso');
    }

    public function listaQuestao(){
        return $this->hasMany('App\ListaQuestao');
    }

    public function questao(){
        return $this->hasMany('App\Questao');
    }
}