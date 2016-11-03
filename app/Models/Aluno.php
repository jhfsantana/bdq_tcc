<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Resultado;
use App\Models\Turma;
use App\Models\Disciplina;
use Auth;


class Aluno extends User
{
    protected $fillable = array('matricula', 'nome','email', 'password');
    protected $guarded = ['id','password'];


    public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
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

    public static function ultimaNota()
    {
        $aluno = Auth::user();
        $nota = Resultado::find($aluno->id)
                                ->orderBy('nota', 'desc')->first();

        return $nota;
    }
}
