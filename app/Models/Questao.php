<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Questao extends Model
{
    protected $fillable = array('disciplina', 'nivel', 'questao', 'a', 'b', 'c', 'd', 'e', 'correta');
    protected $table = 'questoes';
    

    public function disciplina()
    {
    	return $this->belongsTo('App\Models\Disciplina');
    }

    public function avaliacoes()
    {
    	return $this->belongsToMany('App\Models\Avaliacao');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function pontos()
    {
        return $this->belongsToMany('App\Models\Ponto');
    }

    public static function topQuestoes()
    {
        $resultado = DB::table('avaliacoes')
                ->join('avaliacao_questao', 'avaliacoes.id', '=', 'avaliacao_questao.avaliacao_id')
                ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
                ->join('questoes', 'avaliacao_questao.questao_id', '=', 'questoes.id')
                ->select(DB::raw(count('questoes.questao as qtd')), 'disciplinas.nome as disciplina_nome', 'questoes.id as questao_id', 'questoes.questao as questao_nome')
                ->orderBy(DB::raw(count('questoes.questao')), 'desc')
                ->get();
        return $resultado;
    }
}