<?php


namespace App;


class EncryptDecrypt
{


    public static function encrypt($string){
        return base64_encode($string);
    }

    public static function decrypt($string){
        return base64_decode($string);
    }
}