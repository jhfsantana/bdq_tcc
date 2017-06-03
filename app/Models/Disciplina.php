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

    public static function pegarDisciplinasDisponiveis($professor_id)
    {
        $resultado = DB::table('professores')
            ->join('disciplina_professor', 'professores.id', '!=', 'disciplina_professor.professor_id')
            ->join('disciplinas', 'disciplina_professor.disciplina_id', '!=', 'disciplinas.id')
            ->where('disciplina_professor.professor_id', '!=', $professor_id)
            ///->select('professores.nome as turma_nome','disciplinas.nome as disciplina_nome')
            ->get();

        return $resultado;
    }

    public static function validarRemocao($professor_id, $disciplina_id)
    {
        $resultado = DB::table('professores')
            ->join('disciplina_professor', 'professores.id', '=', 'disciplina_professor.professor_id')
            ->join('disciplinas', 'disciplina_professor.disciplina_id', '=', 'disciplinas.id')
            ->join('disciplina_turma', 'disciplinas.id', '=', 'disciplina_turma.disciplina_id')
            ->join('turmas', 'disciplina_turma.turma_id', '=', 'turmas.id')
            ->where('professores.id', '=', $professor_id)
            ->where('disciplinas.id', '=', $disciplina_id)
            ///->select('professores.nome as turma_nome','disciplinas.nome as disciplina_nome')
            ->get();

        return $resultado;
    }
}
