<?php
namespace App\Models;

class Util
{

	public static function somenteNumeros($cpf)
	{
		return preg_replace("/[^0-9]/", '', $cpf);
	}

	public static function pegarDiaSemana()
	{
		$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
		$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
		$hoje = getdate();
		$dia = $hoje["mday"];
		$mes = $hoje["mon"];
		$nomemes = $meses[$mes];
		$ano = $hoje["year"];
		$diadasemana = $hoje["wday"];
		$nomediadasemana = $diasdasemana[$diadasemana];
		return "$nomediadasemana, $dia de $nomemes de $ano";
	}











}