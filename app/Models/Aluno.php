<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Resultado;
use App\Models\Turma;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use Auth;


class Aluno extends User
{
    protected $fillable = array('matricula', 'nome','email', 'password');
    protected $guarded = ['id','password'];


    public function disciplinas()
    {
        return $this->belongsToMany('App\Models\Disciplina');
    }

    public function turmas()
    {
        return $this->belongsToMany('App\Models\Turma');
    }

    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado');
    }

    public static function totalAlunos()
    {
        $alunos = Aluno::all()->count();
        return $alunos;
    }
    
    public  function alternativas()
    {
        return $this->belongsToMany('App\Models\Alternativa', 'aluno_alternativa','aluno_id','alternativa_id');
    }



    public static function ultimaNota()
    {
        /*$notas = DB::table('aluno_resultado')
            ->join('avaliacoes', 'aluno_resultado.avaliacao_id', '=', 'avaliacoes.id')
            ->join('aluno_resultado', 'avaliacoes.id', '=', 'aluno_resultado.avaliacao_id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('aluno_resultado.aluno_id', '=', $aluno->id)
            ->select('aluno_resultado.nota', 'disciplinas.nome')
            ->orderBy('aluno_resultado.nota', 'desc')
            ->get();*/
/*        $sql = "select ar.nota
                        ,d.nome
                        from aluno_resultado ar
                        join avaliacoes a on (a.id = ar.avaliacao_id)
                        join disciplinas d on (d.id = a.disciplina_id)
                       order by ar.created_at desc";
        $nota = DB::select($sql)->first();*/

        $nota = DB::table('aluno_resultado')
        ->join('avaliacoes', 'aluno_resultado.avaliacao_id', '=', 'avaliacoes.id')
        ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
        ->orderBy('aluno_resultado.created_at', 'desc')
        ->select(DB::raw('avaliacoes.id, aluno_resultado.nota, disciplinas.nome as disciplina'))
        ->first();

        if(empty($nota))
        {
            return 0;    
        }
        else
        {
            return $nota;
        }

    }

    public static function  mediaAluno($aluno_id)
    {

        $media = DB::table('aluno_resultado')
                     ->select(DB::raw('year(created_at) as ano, month(created_at) as mes, avg(nota) as y'))
                     ->where('aluno_id', '=', $aluno_id)
                     ->groupBy(DB::raw('year(created_at), month(created_at)'))
                     ->get();       

        if(empty($media))
        {
            return 0;    
        }
        else
        {
            return $media;
        }
        
    }
}

