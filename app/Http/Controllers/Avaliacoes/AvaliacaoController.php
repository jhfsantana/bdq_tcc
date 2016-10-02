<?php

namespace App\Http\Controllers\Avaliacoes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Professor;

class AvaliacaoController extends Controller
{
    public function formulario($id)
    {
    	$professor = Professor::find($id);

    	return view('avaliacao.formulario_avaliacao')->withProfessor($professor);
    }
}
