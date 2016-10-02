<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Disciplina;


class Aluno extends Model
{
    protected $fillable = array('enrollment', 'name','email', 'password');
    protected $guarded = ['id','password'];


    public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
    }
}
