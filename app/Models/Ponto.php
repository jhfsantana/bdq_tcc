<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ponto extends Model
{
    public $timestamps = false;

    public function questoes()
    {
    	return $this->belongsToMany('App\Models\Questao');
    }

    public function avaliacao()
    {
    	return $this->belongsTo('App\Models\Avaliacao');
    }
}
