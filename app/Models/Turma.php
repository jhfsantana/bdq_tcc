<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Disciplina;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Turma extends Model
{

	protected $fillable = array('id', 'name');

	public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
    }

    public function professores()
    {
    	return $this->belongsToMany('App\Models\Professor');
    }
}
