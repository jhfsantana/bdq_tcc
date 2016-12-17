<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Professor;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;

class Disciplina extends Model
{
    public $timestamps = false;
    protected $fillable = array('classroom_id','name');

    public function professores()
    {
        return $this->belongsToMany('App\Models\Professor');
    }

    public function turmas()
    {
        return $this->belongsToMany('App\Models\Turma');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Models\Aluno');
    }

    public function questoes()
    {
        return $this->hasMany('App\Models\Questao');
    }

    public function avaliacao()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public static function checarTurmaDisponivel($disciplina, $turma)
    {
       $resultado = DB::table('turmas')
            ->join('disciplina_turma', 'turmas.id', '=', 'disciplina_turma.turma_id')
            ->join('disciplinas', 'disciplina_turma.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.nome', '=', $disciplina)
            ->where('turmas.id', '=', $turma)
            ->select('turmas.nome as turma_nome','disciplinas.nome as disciplina_nome')
            ->get();
        return $resultado;
    }
}
