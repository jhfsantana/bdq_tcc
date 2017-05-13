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

    public function professor()
    {
      return $this->belongsTo('App\Models\Professor');
    }

    public function aluno()
    {
      return $this->belongsTo('App\Models\Aluno');
    }


   	public static function dispararNotificacao($avaliacao_id, $professor_id, $aluno_id, $mensagem)
   	{
   		$notificacao = new Notificacao;

      if(isset($avaliacao_id))
      {
          $notificacao->avaliacao()->associate($avaliacao_id);  
      }
      else
      {
          $notificacao->avaliacao()->associate(0);
      }   		
      $notificacao->professor()->associate($professor_id);
      $notificacao->aluno()->associate($aluno_id);
   		$notificacao->mensagem = $mensagem;
   		
      if($notificacao->save())
      {
        return 1;
      }
      else
      {
        return 0;
      }

   	}
}
