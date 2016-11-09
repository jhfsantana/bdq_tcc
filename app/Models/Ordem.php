<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
   	public $timestamps = false;
   	protected $table = 'ordem_questao';
    public function questao()
    {
    	return $this->belongsToMany('App\Models\Questao');
    }

    public function avaliacao()
    {
    	return $this->belongsToMany('App\Models\Avaliacao');
    }
}
