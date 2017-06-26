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

    public static function topQuestoes()
    {
        /*$resultado = DB::table('avaliacoes')
                ->join('avaliacao_questao', 'avaliacoes.id', '=', 'avaliacao_questao.avaliacao_id')
                ->join('questoes', 'avaliacao_questao.questao_id', '=', 'questoes.id')
                ->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
                ->select(DB::raw('COUNT(questoes.id) as qtd'), 'disciplinas.nome as disciplina_nome', 'questoes.id as questao_id', 'questoes.questao as questao_nome', 'questoes.created_at')
                ->groupby('questoes.id','disciplinas.nome','questoes.questao', 'questoes.created_at')
                ->orderBy('qtd', 'desc')
                ->get();*/
       

        $questoes = DB::table('avaliacoes')
                ->join('avaliacao_questao', 'avaliacoes.id', '=', 'avaliacao_questao.avaliacao_id')
                ->join('questoes', 'avaliacao_questao.questao_id', '=', 'questoes.id')
                ->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
                ->groupBy('questoes.id', 'questoes.created_at')
                ->limit(15)
                ->orderBy('qtd', 'desc')
                ->get(['questoes.id as questao_id', 'questoes.created_at', 'disciplinas.nome as disciplina_nome', 'questoes.questao as questao_nome' , DB::raw('COUNT(questoes.id) as qtd')]);
        
        if(count($questoes) > 0)
        {

            foreach ($questoes as $questao)
            {
                $enunciado_formatado = strlen($questao->questao_nome) > 30 ? substr($questao->questao_nome,0,30)."..." : $questao->questao_nome;

                $dataPoints[] = [ 'y' => $questao->qtd, 'legendText' => $questao->disciplina_nome, 'label' => 'ID: '.$questao->questao_id.' - ' .  $enunciado_formatado];
            }

                $data[] = [      
                            'type' => 'pie',
                            'indexLabelFontFamily' => 'Garamond',
                            'indexLabelFontSize' => 20,
                            'indexLabel' => '{label} | Foi adicionada {y} Vez(es)', 
                            'startAngle' => -20,
                            'showInLegend' => true,
                            'toolTipContent' => 'Disciplina - {legendText}, Quantidade: {y}',
                            'dataPoints' => $dataPoints
                        ];

            $root['data'] = $data;

            return $root;
        }
        else
        {
            return 0;
        }

    }

    public static function tabelaQuestoes()
    {
        $questoes = DB::table('avaliacoes')
                ->join('avaliacao_questao', 'avaliacoes.id', '=', 'avaliacao_questao.avaliacao_id')
                ->join('questoes', 'avaliacao_questao.questao_id', '=', 'questoes.id')
                ->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
                ->groupBy('questoes.id', 'questoes.created_at')
                ->limit(15)
                ->orderBy('qtd', 'desc')
                ->get(['questoes.id as questao_id', 'questoes.created_at', 'disciplinas.nome as disciplina_nome', 'questoes.questao as questao_nome' , DB::raw('COUNT(questoes.id) as qtd')]);

        return $questoes;
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

    public static function buscarQuestao($disciplina_id, $nivel_id)
    {
        $disciplina = self::join('disciplinas', 'disciplinas.id', '=','questoes.disciplina_id')
                                ->where('disciplinas.id', '=', $disciplina_id)
                                ->get(['disciplinas.nome']);

        return self::where('disciplina_id', '=', $disciplina_id)
                    ->where('nivel', '=', $nivel_id)
                    ->InRandomOrder()
                    ->first();
    }
}