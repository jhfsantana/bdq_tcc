<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Disciplina;


class Aluno extends User
{
    protected $fillable = array('matricula', 'nome','email', 'password');
    protected $guarded = ['id','password'];


    public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
    }
}
