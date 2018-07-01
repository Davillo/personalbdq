<?php
/**
 * Created by PhpStorm.
 * User: davil
 * Date: 10/06/2018
 * Time: 08:37
 */

namespace App;


class Datas
{
    public static function getDataAtual(){
        date_default_timezone_set('America/Fortaleza');
        return date('Y-m-d');
    }
}