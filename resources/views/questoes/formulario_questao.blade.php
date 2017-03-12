@extends('templates.professor.template')
    @section('head')
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/formularios.css">
	<title>Formulario de Questões</title>
    @stop
    @section('content')
	<div class="container">
    <br>
    <br>
    <br>               
        <div id="questaobox" style="margin-top:0px; border-color: #ccc" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">           
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title"><h3 style="text-align: center;">Cadastro de Questões</h3></div>
                    </div>     

                    <div style="padding-top:10px; border-color: #ccc;" class="panel-body" >
                    @if(!empty($errors->all()))
                    <div class="alert alert-danger" role="alert-warning">
                        @foreach($errors->all() as $error)
                            <ul>
                                <li> {{$error}}</li>
                            </ul>
                        @endforeach
                    </div>
                    @endif                
                        <form id="questaoform" class="form-horizontal" role="form" method="post" action="adicionada">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="trace" type="hidden" value="web"> 

							
							<div style="margin-bottom: 15px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
	                            <select class="form-control" name="disciplina_id">
									@foreach($professor->disciplinas as $disciplinas)
	  									<option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
									@endforeach
								</select>

							</div>

                            <!-- <div style="margin-bottom: 15px" class="input-group"> 
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" name="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div> -->

                            <div style="margin-bottom: 15px; border-style: ridge; border-radius: 8px; border-color: #ecf0f1; opacity: 4px; text-align: center; vertical-align: middle;" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <input type="radio" name="nivel" value="1"> Facil
                                <input type="radio" name="nivel" value="2"> Moderada
                                <input type="radio" name="nivel" value="3"> Dificil
                                <input type="radio" name="nivel" value="4"> Muito dificil
                            </div>

                            <div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                <textarea id="questao-area" type="textarea" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>   
                            </div>
                                
                            <div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon">	  
                                    <input id="questao-alternativa-a" type="text" class="form-control" name="alternativaA" placeholder="Alternativa A">
                               </span>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon">  
                                    <input id="questao-alternativa-b" type="text" class="form-control" name="alternativaB" placeholder="Alternativa B">
                                </span>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon">
                                    <input id="questao-alternativa-c" type="text" class="form-control" name="alternativaC" placeholder="Alternativa C">
                                </span>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon">									      	  
                                    <input id="questao-alternativa-d" type="text" class="form-control" name="alternativaD" placeholder="Alternativa D">
                                </span>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                <span class="input-group-addon">									      	  
                                    <input id="questao-alternativa-e" type="text" class="form-control" name="alternativaE" placeholder="Alternativa E">
                                </span>
                           	</div>
                            <div class="panel panel-warning" >
                                <div class="panel-heading">
                                    <div class="panel-title" style="text-align: center;">Selecione a alternativa correta</div>
                                </div>
                                <div class="panel-body">
                                     <div style="margin-bottom: 15px; border-style: ridge; border-radius: 8px; border-color: #ecf0f1; opacity: 4px; text-align: center; vertical-align: middle;" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
                                        <input type="radio" name="correta" value="a"> A
                                        <input type="radio" name="correta" value="b"> B
                                        <input type="radio" name="correta" value="c"> C
                                        <input type="radio" name="correta" value="d"> D
                                        <input type="radio" name="correta" value="e"> E
                                    </div>                                   
                                </div>
                            </div>
                            <div style="margin-top:10px" class="form-group">                             
                                <div class="col-sm-12 controls">
                                	<input type="submit" value="Salvar"  class="btn btn-primary">
                                </div>
                            </div>
                            </form> 
                        </div>                     
                    </div>  
        </div>
    </div>	
    @stop