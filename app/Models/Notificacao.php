<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
   	protected $table = "notificacoes";

    public function avaliacao()
    {
    	return $this->belongsTo('App\Models\Avaliacao');
    }


   	public static function dispararNotificacao($avaliacao_id, $mensagem)
   	{
   		$notificacao = new Notificacao;
   		$notificacao->avaliacao()->associate($avaliacao_id);
   		$notificacao->mensagem = $mensagem;
   		$notificacao->save();
   	}
}
