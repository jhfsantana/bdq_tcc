@extends('templates.professor.template')
    @section('head')
	<link rel="stylesheet" href="/css/loading.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/pontos.js"></script>
  <script src="/js/qtd_questao.js"></script>
  <script src="/js/buscar_questoes.js"></script>

    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/formularios.css">
	<title>Formulario para gerar avaliação</title>

<script>


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
@stop
@section('content')

<div class="container" style="margin-top: 50px;">
<h2 style="text-align: center;">Formulario para gerar avaliação</h2> 
<br>
<br>
<br>
    <div id="avaliacaobox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Selecione a disciplina para buscar as questões</div>
            </div>     

            <div style="padding-top:15px" class="panel-body" >

                <form id="avaliacaoform" class="form-group" role="form"  method="POST" action="gerar/salvar">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="professor_id" type="hidden" value="{{Auth::user()->id}}"> 
                    <!-- <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" name="disciplina" id="disciplina_id">
                                @foreach($professor->disciplinas as $disciplinas)
                                    <option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
                                @endforeach
                            </select>
                    </div> -->
                    
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
    </div>
</div>












	<div class="container" id="questao1">    
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
                                <input  class="form-control"  form="avaliacaoform" type="text" name="q1_pontos" id="q1_pontos" placeholder="Pontos" readonly="true" />
                                </div>
                            </div>

                            <br>
                            <br>
                        <textarea form="avaliacaoform" id="questao_id" type="textarea" value="" rows="1" class="form-control" name="questao_id[]" id="questao_id" " style="display: none;"></textarea>

                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                         				<form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         

											<input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input form="provaform" name="professor_id" id="prof" type="hidden" value="{{Auth::user()->id}}">  



							</div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                      </div>
                  </div>
             </div>
         </div>

    <div class="container">    
        <div id="questaobox2" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q2_pontos" id="q2_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>
                        <textarea form="avaliacaoform" id="questao2_id" type="textarea" value="" rows="1" class="form-control" name="questao2_id[]"  style="display: none;" ></textarea>
                        

                             <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area2" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar2" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
							 
 
                        </form>

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>

    <div class="container">    
        <div id="questaobox3" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q3_pontos" id="q3_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea form="avaliacaoform" id="questao3_id" type="textarea" value="" rows="1" class="form-control" name="questao3_id[]" style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area3" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar3" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         

                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  

    <div class="container">    
        <div id="questaobox4" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q4_pontos" id="q4_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea form="avaliacaoform" id="questao4_id" type="textarea" value="" rows="1" class="form-control" name="questao4_id[]"  style="display: none;" ></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area4" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar4" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>

    <div class="container">    
        <div id="questaobox5" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q5_pontos" id="q5_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea form="avaliacaoform" id="questao5_id" type="textarea" value="" rows="1" class="form-control" name="questao5_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area5" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar5" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
  


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  

    <div class="container">    
        <div id="questaobox6" style="margin-top:50px; display: block;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                <span class="input-group-addon"><i></i>

                                
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q6_pontos" id="q6_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>                           

                            <textarea form="avaliacaoform" id="questao6_id" type="textarea" value="" rows="1" class="form-control" name="questao6_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area6" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar6" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox7" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q7_pontos" id="q7_pontos" placeholder="Pontos"  readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>                        

                            <textarea form="avaliacaoform" id="questao7_id" type="textarea" value="" rows="1" class="form-control" name="questao7_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area7" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar7" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativa7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox8" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control"  form="avaliacaoform" type="text" name="q8_pontos" id="q8_pontos" placeholder="Pontos" readonly="true"/>
                                </div>
                            </div>

                            <br>
                            <br>                        

                            <textarea form="avaliacaoform" id="questao8_id" type="textarea" value="" rows="1" class="form-control" name="questao8_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area8" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar8" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox9" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control" form="avaliacaoform" type="text" name="q9_pontos" id="q9_pontos" placeholder="Pontos" readonly="true" />
                                </div>
                            </div>

                            <br>
                            <br>                    

                            <textarea form="avaliacaoform" id="questao9_id" type="textarea" value="" rows="1" class="form-control" name="questao9_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area9" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar9" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox10" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
                                    <input  class="form-control" form="avaliacaoform" type="text" name="q10_pontos" id="q10_pontos" placeholder="Pontos" readonly="true" />
                                </div>
                            </div>

                            <br>
                            <br>
                            <textarea form="avaliacaoform" id="questao10_id" type="textarea" value="" rows="1" class="form-control" name="questao10_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                          
                       </div>                     
                    </div>  
    
        </div>

    </div>
    
        <input  style="margin-right: auto;margin-left: 540px;display: block;" type="submit" form="avaliacaoform" value="Criar Avaliação"  class="btn btn-success">
                        
</form>
@stop