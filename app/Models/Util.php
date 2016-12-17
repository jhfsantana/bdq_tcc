<?php
namespace App\Models;

class Util
{

public static function somenteNumeros($cpf)
	{
		return preg_replace("/[^0-9]/", '', $cpf);
	}

}