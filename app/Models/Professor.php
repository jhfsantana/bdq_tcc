<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use Auth;
class Professor extends User
{
    protected $table = 'professores';
	protected $fillable = array('enrollment', 'name','email', 'password');
    protected $guarded = ['id','password'];

    public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
    }

    public function turmas()
    {
    	return $this->belongsToMany('App\Models\Turma');
    }

    public function avaliacoes()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function questoes()
    {
        return $this->hasMany('App\Models\Questao');
    }

    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado');
    }

    public static function totalProfessores()
    {
        $total = Professor::all()->count();

        return $total;
    }

    public static function professorComMaiorNumeroDeQuestoes()
    {
        /*$query = "SELECT p.matricula
                        ,p.nome
                        ,p.email
                        ,d.nome as disciplina_nome
                        ,count(q.questao) as total_questoes
                    FROM professores p
                    JOIN questoes q on (q.professor_id = p.id)
                    JOIN disciplinas d on (d.id = q.disciplina_id)
                   GROUP BY p.matricula, p.nome, p.email, d.nome
                   ORDER BY p.nome";*/
/*
       $query = DB::table('professores')
            ->join('questoes', 'professores.id', '=', 'questoes.professor_id')
            ->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
            ->select(DB::raw('COUNT(questoes.id) as total_questoes'), 'professores.nome')            
            ->groupBy('professores.nome')
            ->orderBy('professores.nome')
            ->get();*/

        $query = self::join('questoes', 'questoes.professor_id', '=', 'professores.id')
            ->groupBy('professores.nome', 'questoes.created_at')
            ->get(['professores.nome', 'questoes.created_at', DB::raw('count(questoes.id) as total_questoes')]);

        return $query;
    }

    public static function professorTopQuestoes()
    {
         $query = "SELECT p.matricula
                        ,p.nome
                        ,p.email
                        ,d.nome as disciplina_nome
                        ,count(q.questao) as total_questoes
                    FROM professores p
                    JOIN questoes q on (q.professor_id = p.id)
                    JOIN disciplinas d on (d.id = q.disciplina_id)
                   GROUP BY p.matricula, p.nome, p.email, d.nome
                   ORDER BY p.nome";
                   
        $resultado = DB::select($query);
        return $resultado;
    }



    public static function notas($data, $disciplina)
    {  
        if($disciplina == 'todos')
        {
            $notas = DB::table('avaliacoes')
            ->join('turmas', 'avaliacoes.turma_id', '=', 'turmas.id')
            ->join('aluno_resultado', 'avaliacoes.id', '=', 'aluno_resultado.avaliacao_id')
            ->join('alunos as a', 'aluno_resultado.aluno_id', '=', 'a.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.id', '>=', 1)
            ->select('turmas.nome as turma_nome', 'aluno_resultado.nota', 'a.nome as aluno_nome', 'disciplinas.nome as disciplina_nome')
            ->orderBy('aluno_resultado.nota', 'desc')
            ->get();
        }
        else
        {
            $notas = DB::table('avaliacoes')
            ->join('turmas', 'avaliacoes.turma_id', '=', 'turmas.id')
            ->join('aluno_resultado', 'avaliacoes.id', '=', 'aluno_resultado.avaliacao_id')
            ->join('alunos as a', 'aluno_resultado.aluno_id', '=', 'a.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.id', '=', $disciplina)
            ->select('turmas.nome as turma_nome', 'aluno_resultado.nota', 'a.nome as aluno_nome', 'disciplinas.nome as disciplina_nome')
            ->orderBy('aluno_resultado.nota', 'desc')
            ->get();
        }

       
        
        return $notas;
    }

   public static function meusAlunos($professor_id)
    {
        $sql = DB::table('alunos')
                        ->join('aluno_disciplina', 'alunos.id', '=', 'aluno_disciplina.aluno_id')
                        ->join('disciplinas', 'aluno_disciplina.disciplina_id', '=', 'disciplinas.id')
                        ->join('disciplina_turma', 'disciplinas.id', '=', 'disciplina_turma.disciplina_id')
                        ->join('turmas', 'disciplina_turma.turma_id', '=', 'turmas.id')
                        ->join('disciplina_professor', 'disciplinas.id', '=', 'disciplina_professor.disciplina_id')
                        ->join('professores', 'disciplina_professor.professor_id', '=', 'professores.id')
                        ->where('professores.id', '=', $professor_id)
                        ->select(DB::raw(count('alunos.id as qtd_alunos')), 'turmas.nome as turma_nome as turma_nome', 'disciplinas.nome as disciplina_nome', 'professores.nome as professor_nome', 'alunos.nome as aluno_nome', 'alunos.id as qtd_alunos')->get();
        return $sql;
    }
    public static function listarAlunos($professor_id)
    {
        $sql = DB::table('alunos')
                ->join('aluno_disciplina', 'alunos.id', '=', 'aluno_disciplina.aluno_id')
                ->join('disciplinas', 'aluno_disciplina.disciplina_id', '=', 'disciplinas.id')
                ->join('disciplina_turma', 'disciplinas.id', '=', 'disciplina_turma.disciplina_id')
                ->join('turmas', 'disciplina_turma.turma_id', '=', 'turmas.id')
                ->join('disciplina_professor', 'disciplinas.id', '=', 'disciplina_professor.disciplina_id')
                ->join('professores', 'disciplina_professor.professor_id', '=', 'professores.id')
                ->where('professores.id', '=', $professor_id)
                ->select('alunos.id as qtd_alunos', 'alunos.id as aluno_id', 'alunos.matricula as matricula', 'turmas.nome as turma_nome as turma_nome', 'disciplinas.nome as disciplina_nome', 'professores.nome as professor_nome', 'alunos.nome as aluno_nome', 'alunos.id as qtd_alunos')->get();
        return $sql;
    }
}
