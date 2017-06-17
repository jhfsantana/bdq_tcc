@extends('templates.professor.template')
    @section('head')

<!-- Bootstrap -->
    <link href="/css/formularios.css" rel="stylesheet">
    <link href="/css/wizard.css" rel="stylesheet">
    <script src="/js/jquery-3.1.1.js"></script>

    <script src="/js/wizard.js"></script>
  <script src="/js/pontos.js"></script>
  <script src="/js/qtd_questao.js"></script>
  <script src="/js/buscar_questoes.js"></script>
    <script src="/js/bootstrap.js"></script>
	<title>Formulario para gerar avaliação</title>
@stop

<script>        

function validar()
{
    var questao1 = $('#q1_pontos').val();

    if(questao1 > 3)
    {
        window.alert("Passou do valor máximo da questão.")
        return false;
    }
}
function showQ(select){
    if(select.value==5)
    {
        $("#q6_pontos").prop("disabled", true);
        $("#q7_pontos").prop("disabled", true);
        $("#q8_pontos").prop("disabled", true);
        $("#q9_pontos").prop("disabled", true);
        $("#q10_pontos").prop("disabled", true);
    }
    if(select.value==6)
    {
        $("#q6_pontos").prop("disabled", false);

        $("#q7_pontos").prop("disabled", true);
        $("#q8_pontos").prop("disabled", true);
        $("#q9_pontos").prop("disabled", true);
        $("#q10_pontos").prop("disabled", true);
    }
    if(select.value==7)
    {   
        $("#q6_pontos").prop("disabled", false);
        $("#q7_pontos").prop("disabled", false);

        $("#q8_pontos").prop("disabled", true);
        $("#questao8_id").prop("disabled", true);
        $("#q9_pontos").prop("disabled", true);
        $("#questao9_id").prop("disabled", true);
        $("#q10_pontos").prop("disabled", true);
        $("#questao10_id").prop("disabled", true);

    }
    if(select.value==8)
    {
        $("#q6_pontos").prop("disabled", false);
        $("#q7_pontos").prop("disabled", false);
        $("#q8_pontos").prop("disabled", false);

        $("#q9_pontos").prop("disabled", true);
        $("#q10_pontos").prop("disabled", true);
    }
    if(select.value==9)
    {
        $("#q6_pontos").prop("disabled", false);
        $("#q7_pontos").prop("disabled", false);
        $("#q8_pontos").prop("disabled", false);
        $("#q9_pontos").prop("disabled", false);

        $("#q10_pontos").prop("disabled", true);
    }
    if(select.value==10)
    {
        $("#q6_pontos").prop("disabled", false);
        $("#q7_pontos").prop("disabled", false);
        $("#q8_pontos").prop("disabled", false);
        $("#q9_pontos").prop("disabled", false);
        $("#q10_pontos").prop("disabled", false);
    }
}

</script>
@section('titulo')
            <i class="fa fa-book" title="Edit"></i>
            GERANDO AVALIAÇAO
    @stop
@section('content')
    @if(!empty($errors->all()))
    <div class="alert alert-warning" role="alert-warning">
        @foreach($errors->all() as $error)
            <ul>
                <li> {{$error}}</li>
            </ul>
        @endforeach
    </div>
    @endif

<div style="width: 100%; margin-top: 105px;" id="top">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div id="line" class="connecting-line2"></div>
                <div id="line" class="connecting-line3"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Menu de opções">
                            <span class="round-tab">
                                <img src="/images/settings.svg">
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Questão 1">
                            <span class="round-tab">
                                <img src="/images/one.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Questão 2">
                            <span class="round-tab">
                                <img src="/images/two.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Questão 3">
                            <span class="round-tab">
                                <img src="/images/three.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Questão 4">
                            <span class="round-tab">
                                <img src="/images/four.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="Questão 5">
                            <span class="round-tab">
                                <img src="/images/five.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="estep7">
                        <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab" title="Questão 6">
                            <span class="round-tab">
                                <img src="/images/six.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="estep8">
                        <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab" title="Questão 7">
                            <span class="round-tab">
                                <img src="/images/seven.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="estep9">
                        <a href="#step9" data-toggle="tab" aria-controls="step9" role="tab" title="Questão 8">
                            <span class="round-tab">
                                <img src="/images/eight.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="estep10">
                        <a href="#step10" data-toggle="tab" aria-controls="step10" role="tab" title="Questão 9">
                            <span class="round-tab">
                                <img src="/images/nine.svg">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="estep11">
                        <a href="#step11" data-toggle="tab" aria-controls="step11" role="tab" title="Questão 9">
                            <span class="round-tab">
                                <img src="/images/ten.svg">
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled" id="fim">
                        <a href="#complete" data-toggle="tab" aria-controls="tab" role="tab" title="Finalizar">
                            <span class="round-tab">
                                <img src="/images/success.svg">
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form  id="avaliacaoform" data-toggle="validator"  role="form" method="POST" action="gerar/salvar">                

            <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
		              <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Selecione a disciplina para buscar as questões</div>
            </div>     

            <div style="padding-top:15px" class="panel-body" >

                <form  id="avaliacaoform" data-toggle="validator"  role="form" method="POST" action="gerar/salvar">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="professor_id" type="hidden" value="{{Auth::user()->id}}"> 
      
                    
                    <div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                <select class="form-control" name="disciplina" id="disciplina_id">
                                    @foreach($professor->disciplinas as $disciplinas)
                                        <option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
                                    @endforeach
                                </select>
                                 <input name="professor_id" id="prof" type="hidden" value="{{Auth::user()->id}}"> 
                    </div>
                    <div class="panel panel-warning " >
                        <div class="panel-heading">
                            <div class="panel-title">Para qual turma deseja criar a Avaliação?</div>
                        </div> 
                    </div>
                    <div style="margin-bottom: 15px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <select class="form-control"  name ="turma">
                            @foreach($professor->disciplinas as $disciplina)    
                                @foreach($disciplina->turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}} - {{$disciplina->nome}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 15px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                        <select class="form-control" name="qtd" onchange="showDiv(this); showQ(this)">
                            <option value="" selected disabled>Selecione a quantidade de questões desejada</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
            </div>
        </div>                        

    				<ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-primary next-step">Avançar</button></li>
                    </ul>
                    </div>

<div class="tab-pane" role="tabpanel" id="step2">
    <div class="tab-pane" role="tabpanel" id="step2">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivel" value="1" id="nivel_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivel" value="2" id="nivel_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivel" value="3" id="nivel_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivel" value="4" id="nivel_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>

                    <md-switch ng-model="isActive" aria-label="Finished?">
                      Discursiva?
                    </md-switch>

                    <textarea id="questao_id" type="text" name="questao_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="op" value="1"> Sim
                            <input type="radio" name="op" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q1_pontos" id="q1_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a1">
                    <textarea  name = "a" id="alternativaA" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b1">
                    <textarea  name = "b" id="alternativaB" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c1">
                    <textarea  name = "c" id="alternativaC" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d1">
                    <textarea  name = "d" id="alternativaD" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e1">
                    <textarea  name = "e" id="alternativaE" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step3">
    <div class="tab-pane" role="tabpanel" id="step3">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq2_id" value="1" id="nivelq2_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq2_id" value="2" id="nivelq2_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq2_id" value="3" id="nivelq2_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq2_id" value="4" id="nivelq2_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao2_id" type="text" name="questao2_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area2" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq2" value="1"> Sim
                            <input type="radio" name="opq2" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q2_pontos" id="q2_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a2">
                    <textarea  name = "a" id="alternativaA2" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b2">
                    <textarea  name = "b" id="alternativaB2" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c2">
                    <textarea  name = "c" id="alternativaC2" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d2">
                    <textarea  name = "d" id="alternativaD2" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e2">
                    <textarea  name = "e" id="alternativaE2" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar2" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>
                    
<div class="tab-pane" role="tabpanel" id="step4">
    <div class="tab-pane" role="tabpanel" id="step4">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq3_id" value="1" id="nivelq3_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq3_id" value="2" id="nivelq3_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq3_id" value="3" id="nivelq3_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq3_id" value="4" id="nivelq3_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao3_id" type="text" name="questao3_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area3" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq3" value="1"> Sim
                            <input type="radio" name="opq3" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q3_pontos" id="q3_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a3">
                    <textarea  name = "a" id="alternativaA3" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b3">
                    <textarea  name = "b" id="alternativaB3" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c3">
                    <textarea  name = "c" id="alternativaC3" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d3">
                    <textarea  name = "d" id="alternativaD3" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e3">
                    <textarea  name = "e" id="alternativaE3" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar3" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>
<div class="tab-pane" role="tabpanel" id="step5">
    <div class="tab-pane" role="tabpanel" id="step5">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq4_id" value="1" id="nivelq4_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq4_id" value="2" id="nivelq4_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq4_id" value="3" id="nivelq4_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq4_id" value="4" id="nivelq4_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao4_id" type="text" name="questao4_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area4" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq4" value="1"> Sim
                            <input type="radio" name="opq4" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q4_pontos" id="q4_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a4">
                    <textarea  name = "a" id="alternativaA4" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b4">
                    <textarea  name = "b" id="alternativaB4" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c4">
                    <textarea  name = "c" id="alternativaC4" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d4">
                    <textarea  name = "d" id="alternativaD4" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e4">
                    <textarea  name = "e" id="alternativaE4" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar4" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step6">
    <div class="tab-pane" role="tabpanel" id="step6">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox5">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq5_id" value="1" id="nivelq5_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq5_id" value="2" id="nivelq5_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq5_id" value="3" id="nivelq5_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq5_id" value="4" id="nivelq5_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao5_id" type="text" name="questao5_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area5" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq5" value="1"> Sim
                            <input type="radio" name="opq5" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q5_pontos" id="q5_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a5">
                    <textarea  name = "a" id="alternativaA5" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b5">
                    <textarea  name = "b" id="alternativaB5" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c5">
                    <textarea  name = "c" id="alternativaC5" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d5">
                    <textarea  name = "d" id="alternativaD5" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e5">
                    <textarea  name = "e" id="alternativaE5" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar5" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step7">
    <div class="tab-pane" role="tabpanel" id="step7">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq6_id" value="1" id="nivelq6_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq6_id" value="2" id="nivelq6_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq6_id" value="3" id="nivelq6_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq6_id" value="4" id="nivelq6_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao6_id" type="text" name="questao6_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area6" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq6" value="1"> Sim
                            <input type="radio" name="opq6" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q6_pontos" id="q6_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a6">
                    <textarea  name = "a" id="alternativaA6" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b6">
                    <textarea  name = "b" id="alternativaB6" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c6">
                    <textarea  name = "c" id="alternativaC6" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d6">
                    <textarea  name = "d" id="alternativaD6" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e6">
                    <textarea  name = "e" id="alternativaE6" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar6" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step8">
    <div class="tab-pane" role="tabpanel" id="step8">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox7">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq7_id" value="1" id="nivelq7_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq7_id" value="2" id="nivelq7_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq7_id" value="3" id="nivelq7_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq7_id" value="4" id="nivelq7_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao7_id" type="text" name="questao7_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area7" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq7" value="1"> Sim
                            <input type="radio" name="opq7" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q7_pontos" id="q7_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a7">
                    <textarea  name = "a" id="alternativaA7" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b7">
                    <textarea  name = "b" id="alternativaB7" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c7">
                    <textarea  name = "c" id="alternativaC7" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d7">
                    <textarea  name = "d" id="alternativaD7" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e7">
                    <textarea  name = "e" id="alternativaE7" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar7" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step9">
    <div class="tab-pane" role="tabpanel" id="step9">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq8_id" value="1" id="nivelq8_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq8_id" value="2" id="nivelq8_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq8_id" value="3" id="nivelq8_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq8_id" value="4" id="nivelq8_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao8_id" type="text" name="questao8_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area8" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq8" value="1"> Sim
                            <input type="radio" name="opq8" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q8_pontos" id="q8_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a8">
                    <textarea  name = "a" id="alternativaA8" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b8">
                    <textarea  name = "b" id="alternativaB8" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c8">
                    <textarea  name = "c" id="alternativaC8" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d8">
                    <textarea  name = "d" id="alternativaD8" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e8">
                    <textarea  name = "e" id="alternativaE8" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar8" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step10">
    <div class="tab-pane" role="tabpanel" id="step10">
         <div layout="row" class="mainbox col-md-12 col-md-offset-1">
             <div layout="column">
                 <div id="questaobox9">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                    <div style="padding-left: 16px;">
                            <label class="radio-inline">
                                <input type="radio" name="nivelq9_id" value="1" id="nivelq9_id" checked="true"> Facil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq9_id" value="2" id="nivelq9_id"> Moderada<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq9_id" value="3" id="nivelq9_id"> Dificil<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nivelq9_id" value="4" id="nivelq9_id"> Muito dificil<br>
                            </label>
                        <input id = "disciplina_id" name="disciplina_id" type="hidden">
                    </div>
                    <textarea id="questao9_id" type="text" name="questao9_id[]" style="display: none;"></textarea>
                    <textarea id="questao-area9" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                    <div class="input-group">
                        <i>Deseja alterar a quantidade de pontos?
                            <input type="radio" name="opq9" value="1"> Sim
                            <input type="radio" name="opq9" value="2" checked="true"> Não
                        </i>
                        <div>
                            <input  class="form-control" type="text" name="q9_pontos" id="q9_pontos" style="text-align: right;" readonly="true" />
                        </div>
                    </div>
                </div>
            </div>

            <div layout="column" layout-margin flex="50">
                <div id="a9">
                    <textarea  name = "a" id="alternativaA9" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b9">
                    <textarea  name = "b" id="alternativaB9" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c9">
                    <textarea  name = "c" id="alternativaC9" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d9">
                    <textarea  name = "d" id="alternativaD9" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e9">
                    <textarea  name = "e" id="alternativaE9" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar9" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div> 
</div>

<div class="tab-pane" role="tabpanel" id="step11">
    <div class="tab-pane" role="tabpanel" id="step11">
        <div layout="row" class="mainbox col-md-12 col-md-offset-1">
            <div layout="column">
                 <div id="questaobox10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Selecione a dificuldade da questão</div>
                        </div> 
                    </div>
                <div style="padding-left: 16px;">
                        <label class="radio-inline">
                            <input type="radio" name="nivelq10_id" value="1" id="nivelq10_id" checked="true"> Facil<br>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nivelq10_id" value="2" id="nivelq10_id"> Moderada<br>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nivelq10_id" value="3" id="nivelq10_id"> Dificil<br>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nivelq10_id" value="4" id="nivelq10_id"> Muito dificil<br>
                        </label>
                    <input id = "disciplina_id" name="disciplina_id" type="hidden">
                </div>
                <textarea id="questao10_id" type="text" name="questao10_id[]" style="display: none;"></textarea>
                <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required></textarea>
                <div class="input-group">
                    <i>Deseja alterar a quantidade de pontos?
                        <input type="radio" name="opq10" value="1"> Sim
                        <input type="radio" name="opq10" value="2" checked="true"> Não
                    </i>
                    <div>
                        <input  class="form-control" type="text" name="q10_pontos" id="q10_pontos" style="text-align: right;" readonly="true" />
                    </div>
                </div>
            </div>
        </div>

            <div layout="column" layout-margin flex="50">
                <div id="a10">
                    <textarea  name = "a" id="alternativaA10" type="textarea" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
                </div>
                <div id="b10">
                    <textarea  name = "b" id="alternativaB10" type="textarea" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                </div>
                <div id="c10">
                    <textarea  name = "c" id="alternativaC10" type="textarea" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                </div>
                <div id="d10">
                    <textarea  name = "d" id="alternativaD10" type="textarea" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                </div>
                <div id="e10">
                    <textarea  name = "e" id="alternativaE10" type="textarea" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                </div>
                <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            </div>
        </div>
    </div>  
</div>
        <div class="tab-pane" role="tabpanel" id="complete">
            <h3>Última etapa</h3>
            <p>Tem certeza que deseja gerar a Avaliação com as questões escolhidas?</p>
            <input  style="margin-right: auto;margin-left: auto;display: block; height: 100px;" type="submit"  value="GERAR AVALIAÇÃO" form="avaliacaoform" class="btn btn-primary btn-lg btn-block" onclick="return validar();" src="/images/gerar.svg" title="GERAR AVALIAÇÃO">
        </div>
        <div class="clearfix"></div>
        </div>
        </form>
        </div>
        </section>
        </div>
    </div>
</div>


@stop