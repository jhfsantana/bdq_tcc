<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Avaliacao extends Model
{
	protected $table = "avaliacoes";
	protected $fillable = array('disciplina', 'nivel', 'questao', 'a', 'b', 'c', 'd', 'e', 'turma');
    
    public function turmas()
    {
    	return $this->belongsToMany('App\Models\Turma');
    }


    public function disciplina()
    {
    	return $this->belongsTo('App\Models\Disciplina');
    }

    public function questoes()
    {
    	return $this->belongsToMany('App\Models\Questao');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function turma()
    {
        return $this->belongsTo('App\Models\Turma');
    }

    public function resultado()
    {
        return $this->hasOne('App\Models\Resultado');
    }

    public function pontos()
    {
        return $this->hasMany('App\Models\Ponto');
    }

}
