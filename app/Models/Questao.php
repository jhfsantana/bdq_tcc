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

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function alternativas()
    {
        return $this->hasMany('App\Models\Alternativa');
    }

    public static function topQuestoes($limite)
    {
        $resultado = DB::table('avaliacoes')
                ->join('avaliacao_questao', 'avaliacoes.id', '=', 'avaliacao_questao.avaliacao_id')
                ->join('questoes', 'avaliacao_questao.questao_id', '=', 'questoes.id')
                ->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
                ->select(DB::raw('COUNT(questoes.id) as qtd'), 'disciplinas.nome as disciplina_nome', 'questoes.id as questao_id', 'questoes.questao as questao_nome')
                ->groupby('questoes.id','disciplinas.nome','questoes.questao')
                ->orderBy('qtd', 'desc')
                ->limit($limite)
                ->get();
       
        return $resultado;
    }

    public static function pegarPontos($questao_id, $avaliacao_id)
    {
        $resultado = DB::table('pontos')
        ->join('ponto_questao', 'pontos.id', '=', 'ponto_questao.ponto_id')
        ->where('ponto_questao.questao_id', '=', $questao_id)
        ->where('pontos.avaliacao_id', '=', $avaliacao_id)
        ->get();

        return $resultado;
    }
}