<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Support\Facades\DB;

class Avaliacao extends Model
{
	protected $table = "avaliacoes";
	protected $fillable = array('disciplina', 'nivel', 'questao', 'a', 'b', 'c', 'd', 'e', 'turma');
    
    public function turmas()
    {
    	return $this->belongsToMany('App\Models\Turma');
    }


    public function disciplina()
    {
    	return $this->belongsTo('App\Models\Disciplina');
    }

    public function questoes()
    {
    	return $this->belongsToMany('App\Models\Questao');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function turma()
    {
        return $this->belongsTo('App\Models\Turma');
    }

    public function resultado()
    {
        return $this->hasOne('App\Models\Resultado');
    }

    public function pontos()
    {
        return $this->hasMany('App\Models\Ponto');
    }
    public function alternativas()
    {
        return $this->hasMany('App\Models\Alternativa');
    }
    public function notificacoes()
    {
        return $this->hasMany('App\Models\Notificacao');
    }


    public static function checarSeAvaliacaoExiste($professor_id, $turma_id, $disciplina_id, $statusDisponivel, $statusPendente)
    {
        $sql = "SELECT * 
                FROM avaliacoes 
                where professor_id = :professor_id 
                and turma_id = :turma_id 
                and disciplina_id = :disciplina_id";
        
        $results = DB::select('select * from avaliacoes where professor_id = ? and turma_id = ? and disciplina_id = ? and status in (?, ?)', array($professor_id, $turma_id, $disciplina_id, $statusDisponivel, $statusPendente));

        return $results;
    }

    public static function checarStatusAvaliacao($professor_id, $avaliacao_id)
    {
        $sql = DB::select("select * from avaliacoes where professor_id = ? and status = 'disponivel' and id <> ?", 
        array($professor_id, $avaliacao_id));

        if($sql)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function mediaAvaliacao()
    {
        $results = self::join('aluno_resultado', 'aluno_resultado.avaliacao_id', '=', 'avaliacoes.id')->get([DB::raw('AVG(aluno_resultado.nota) as media')]);
        
        foreach ($results as $r) 
        {
            $r->media;
        }
        
        return  $r->media;
    }

}
