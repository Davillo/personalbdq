<?php


namespace App;


class Datas
{
    public static function getDataAtual(){
        date_default_timezone_set('America/Fortaleza');
        return date('Y-m-d');
    }
}