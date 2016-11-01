<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
	protected $table = "aluno_resultado";


	public function aluno()
	{
		return $this->belongsTo('App\Models\Aluno');
	}

	public function avaliacao()
	{
		return $this->belongsTo('App\Models\Avaliacao');
	}
}
