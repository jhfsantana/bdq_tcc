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

}
