<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{

    public function aluno()
    {
        return $this->belongsTo('App\Models\Aluno');
    }

    public function avaliacao()
    {
    	return $this->belongsTo('App\Models\Avaliacao');
    }

    public function questao()
    {
    	return $this->belongsTo('App\Models\Questao');
    }
}
