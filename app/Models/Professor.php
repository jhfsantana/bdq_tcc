<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aluno;
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
}
