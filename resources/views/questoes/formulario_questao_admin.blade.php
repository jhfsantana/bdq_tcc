@extends('templates.admin.template')
    @section('head')
  
	<title>Formulario de Questões</title>
    @stop
    @section('content')
	<div class="container">
    <br>
    <br>
    <br>
    	@if(!empty($errors->all()))
				<div class="alert alert-warning" role="alert-warning">
					@foreach($errors->all() as $error)
						<ul>
							<li> {{$error}}</li>
						</ul>
					@endforeach
				</div>
				@endif
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title"><h3 style="text-align: center;">Cadastro de Questões</h3></div>
                    </div>     
				
			

                    <div style="padding-top:10px; border-color: #ccc;" class="panel-body" >

                            
                        <form id="questaoform" class="form-horizontal" role="form" method="post" action="/admin/questao/adicionada">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="admin_id" type="hidden" value="{{Auth::user()->id }}"> 

							
							<div style="margin-bottom: 15px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
	                            <select class="form-control" name="disciplina">
									@foreach($disciplinas as $disciplina)
	  									<option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
									@endforeach
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
                                        <textarea id="questao-area" type="textarea" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>
                                     
                            </div>
                                
                            <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-a" type="text" class="form-control" name="a" placeholder="Alternativa A">
                                        <label><input type="checkbox"  value="a" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-b" type="text" class="form-control" name="b" placeholder="Alternativa B">
                                        <label><input type="checkbox"  value="b" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-c" type="text" class="form-control" name="c" placeholder="Alternativa C">
                                        <label><input type="checkbox" value="c" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-d" type="text" class="form-control" name="d" placeholder="Alternativa D">
                                        <label><input type="checkbox" value="d" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-e" type="text" class="form-control" name="e" placeholder="Alternativa E">
                                        <label><input type="checkbox" value="e" name="correta"> Alternativa Correta</span></label>
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