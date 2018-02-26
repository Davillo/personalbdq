<?php
/**
 * Created by PhpStorm.
 * User: davil
 * Date: 26/02/2018
 * Time: 12:29
 */

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


}