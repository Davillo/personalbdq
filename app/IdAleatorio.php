<?php
/**
 * Created by PhpStorm.
 * User: davil
 * Date: 20/10/2018
 * Time: 08:43
 */

namespace App;


class IdAleatorio
{

 static function gerar($qtd = 9) {
	$codigo = null;
	for($i = 0; $i<$qtd; $i++) {
		$codigo .= rand(0, 9);
	}
	return  $codigo;
}


}