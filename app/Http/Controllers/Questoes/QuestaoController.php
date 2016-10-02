<?php

namespace App\Http\Controllers\Questoes;

use Illuminate\Http\Request;

use App\Http\Requests\QuestaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\Questao;
use Validator;
use Auth;

class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $professor = Professor::find($id);
        return view('questoes.formulario_questao')->withProfessor($professor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = array(
                    'questao' => 'required');


        $validador = Validator::make($request->all(), $regras);

        if($validador->fails())
        {
            return back()->withInput();
        }
        
        $questao = new Questao();

        $questao->questao = $request->questao;
        $questao->alternativaA = $request->a;
        $questao->alternativaB = $request->b;
        $questao->alternativaC = $request->c;
        $questao->alternativaD = $request->d;
        $questao->alternativaE = $request->e;
        $questao->correta = $request->correta;

        $questao->nivel = $request->nivel;


        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            $request->session()->flash('alert-success', 'Questão salva com sucesso!');
            return redirect ('professor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
