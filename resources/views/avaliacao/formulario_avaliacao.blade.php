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

<div style="width: 100%;" id="top">
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
<div class="container">    
        <div id="questaobox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 1</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
							
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
							
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
                                <label class="radio-inline">
                                    <input type="radio" name="nivel" value="1" id="nivel_id" checked="true"> Facil<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivel" value="2" id="nivel2_id"> Moderada<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivel" value="3" id="nivel3_id"> Dificil<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivel" value="4" id="nivel4_id"> Muito dificil<br>
                                </label>
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>

                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="op" value="1"> Sim
                                            <input type="radio" name="op" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q1_pontos" id="q1_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                        <textarea id="questao_id" type="textarea" value="{{old('questao_id[]')}}" rows="1" class="form-control" name="questao_id[]" id="questao_id" " style="display: none;"></textarea>

                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required 
                                        ></textarea>
                                        <div class="help-block with-errors"></div>

                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                         

											<input name="_token" type="hidden" value="{{ csrf_token() }}">



							</div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"></i>                                               
                                <textarea  name = "c" id="alternativaC" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"></i>                                               
                                <textarea  name = "d" id="alternativaD" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
	                            <span class="input-group-addon"></i>                                               
	                            <textarea  name = "e" id="alternativaE" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                      </div>
                  </div>
             </div>
         </div>             
                    
                    </div>

<div class="tab-pane" role="tabpanel" id="step3">
   <div class="container">    
        <div id="questaobox2"class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 2</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                                </div>
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq2" value="1"> Sim
                                            <input type="radio" name="opq2" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q2_pontos" id="q2_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                        <textarea  id="questao2_id" type="textarea" value="" rows="1" class="form-control" name="questao2_id[]"  style="display: none;" ></textarea>
                        

                             <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area2" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required  ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar2" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>                             
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>                 
                    </div>
                    
                    <div class="tab-pane" role="tabpanel" id="step4">
 <div class="container">    
        <div id="questaobox3"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 3</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>
                           
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq3" value="1"> Sim
                                            <input type="radio" name="opq3" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q3_pontos" id="q3_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea  id="questao3_id" type="textarea" value="" rows="1" class="form-control" name="questao3_id[]" style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area3" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar3" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         

                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>              
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step5">
   <div class="container">    
        <div id="questaobox4"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 4</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>

                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq4" value="1"> Sim
                                            <input type="radio" name="opq4" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q4_pontos" id="q4_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea  id="questao4_id" type="textarea" value="" rows="1" class="form-control" name="questao4_id[]"  style="display: none;" ></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area4" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar4" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>
                      
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step6">
    <div class="container">    
        <div id="questaobox5"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 5</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                           
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq5" value="1"> Sim
                                            <input type="radio" name="opq5" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q5_pontos" id="q5_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea  id="questao5_id" type="textarea" value="" rows="1" class="form-control" name="questao5_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area5" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar5" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
  


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>               
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step7">
    <div class="container">   
        <div id="questaobox6"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 6</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>

                             <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq6" value="1"> Sim
                                            <input type="radio" name="opq6" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q6_pontos" id="q6_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>                           

                            <textarea  id="questao6_id" type="textarea" value="" rows="1" class="form-control" name="questao6_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area6" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar6" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>                
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step8">
    <div class="container">    
        <div id="questaobox7"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 7</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                           
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>

                               <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq7" value="1"> Sim
                                            <input type="radio" name="opq7" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q7_pontos" id="q7_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>                        

                            <textarea id="questao7_id" type="textarea" value="" rows="1" class="form-control" name="questao7_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area7" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar7" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativa7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>               
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step9">
    <div class="container">    
        <div id="questaobox8"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 8</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>

                                <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq8" value="1"> Sim
                                            <input type="radio" name="opq8" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q8_pontos" id="q8_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>                        

                            <textarea  id="questao8_id" type="textarea" value="" rows="1" class="form-control" name="questao8_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area8" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar8" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>              
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step10">
 <div class="container">    
        <div id="questaobox9"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 9</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                        
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>
                                    <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq9" value="1"> Sim
                                            <input type="radio" name="opq9" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q9_pontos" id="q9_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>                    

                            <textarea  id="questao9_id" type="textarea" value="" rows="1" class="form-control" name="questao9_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area9" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar9" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>                
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step11">
 <div class="container">    
        <div id="questaobox10"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 10</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
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
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>
                           
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq10" value="1"> Sim
                                            <input type="radio" name="opq10" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q10_pontos" id="q10_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea  id="questao10_id" type="textarea" value="" rows="1" class="form-control" name="questao10_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required  ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                          
                       </div>                     
                    </div>  
    
        </div>

    </div>                 
                    </div>

                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Última etapa</h3>
                        <p>Tem certeza que deseja gerar a Avaliação com as questões escolhidas?</p>>
        <input  style="margin-right: auto;margin-left: auto;display: block; height: 100px;" type="submit"  value="GERAR AVALIAÇÃO" form="avaliacaoform" class="btn btn-primary btn-lg btn-block" onclick="return validar();" src="/images/gerar.svg" title="GERAR AVALIAÇÃO">
</form>
                    </div>
                    <div class="clearfix"></div>
                </div>
        </div>
    </section>
   </div>
</div>






    <div id="avaliacaobox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        
    </div>
</div>
    


@stop