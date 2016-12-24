
    @extends('templates.professor.template')
	@section('head')
    <link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<title>Alterar questão</title>
    @stop
    @section('content')
    <br>
    <br>
    <br>
	<div class="container " style="display: block;">    
        <div id="questaobox" style="margin-top:0px; border-color: #ccc" class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title" style="text-align: center;"><strong>Formulário para alterar questão</strong></div>
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >

                            
                        <form id="questaoform" class="form-horizontal" role="form" method="post" action="/professor/questao/alterada">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="professor_id" type="hidden" value="{{Auth::user()->id }}"> 
                            <input name="questao_id" type="hidden" value="{{$questao->id }}"> 

							
							<div style="margin-bottom: 15px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
	                            <select class="form-control" name="disciplina">
                                        <option value="{{$questao->disciplina->id}}">{{$questao->disciplina->nome}}</option>
								</select>
							</div>

							<div style="margin-bottom: 15px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
	                            <select class="form-control" name="nivel">
	  								<option value="1">Facil</option>
								 	<option value="2">Moderada</option>
								  	<option value="3">Dificil</option>
								  	<option value="4">Muito dificil</option>
								</select>
							</div>

                            <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area" type="textarea" rows="10" class="form-control" name="questao" placeholder="Questão">{{$questao->questao}}</textarea>
                                     
                            </div>
                                
                            <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-a" value="{{$questao->alternativaA}}" type="text" class="form-control" name="a" placeholder="Alternativa A">
                                        <label><input type="checkbox"  value="a" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-b" value="{{$questao->alternativaB}}" type="text" class="form-control" name="b" placeholder="Alternativa B">
                                        <label><input type="checkbox"  value="b" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-c" value="{{$questao->alternativaC}}" type="text" class="form-control" name="c" placeholder="Alternativa C">
                                        <label><input type="checkbox" value="c" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-d" value="{{$questao->alternativaD}}" type="text" class="form-control" name="d" placeholder="Alternativa D">
                                        <label><input type="checkbox" value="d" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-e" value="{{$questao->alternativaE}}" type="text" class="form-control" name="e" placeholder="Alternativa E">
                                        <label><input type="checkbox" value="e" name="correta"> Alternativa Correta</span></label>
                           	</div>
                                <div style="margin-top:10px" class="form-group">
                                                                    
                                    <div class="col-sm-12 controls">
                                    	<input type="submit" value="Alterar"  class="btn btn-primary">
                                    </div>
                                </div>
                            </form> 
                        </div>                     
                    </div>  
        </div>
    </div>	
    @stop