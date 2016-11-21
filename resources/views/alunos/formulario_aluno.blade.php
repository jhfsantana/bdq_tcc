@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	function GetRandom()
	{
		var myElement = document.getElementById("matricula")
	    myElement.value = Math.floor((Math.random() * 100000) + 100)
	}

	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	@stop
	@section('content')
	<br>
	<br>
	<br>
		<H2 style="text-align: center;">Cadastro de alunos</H2>
		@if(!empty($errors->all()))
			<div class="alert alert-warning" role="alert-warning">
				@foreach($errors->all() as $error)
					<ul>
						<li> {{$error}}</li>
					</ul>
				@endforeach
			</div>
		@endif
		<div class="container">    
			    <div id="cadastroalunobox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
			        <div class="panel panel-default" >
			            <div class="panel-heading">
			                <div class="panel-title">Formulário para cadastro de alunos</div>
			            </div>     

			            <div style="padding-top:30px" class="panel-body" >			

			            <form action="/students" method="post">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<label>
								Matricula 
							</label><i style="color: #FF0000">*</i>
								<button data-toggle="tooltip" title="Gerar Matricula" type="button" id="matriculabuscar" class="btn btn-primary" onclick="GetRandom()" style="margin-bottom: 8px;">
									<i class="glyphicon glyphicon-refresh" aria-hidden="true" "></i>		
								</button>
								<input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula" readonly="true">
							
							<label>
								Nome
							</label><i style="color: #FF0000">*</i>
								<input type="text" name="nome" class="form-control" placeholder="Digite o nome">

							<label>
								Sobrenome
							</label><i style="color: #FF0000">*</i>
								<input type="text" name="sobrenome" class="form-control" placeholder="Digite o sobrenome">
							<label>
								CPF
							</label><i style="color: #FF0000">*</i>
								<input type="text" name="cpf" class="form-control" placeholder="Digite o CPF">
							<label>
								Disciplinas
							</label><i style="color: #FF0000">*</i>
								<select multiple class="form-control"  name ="disciplinas[]">
							  		@foreach($disciplinas as $disciplina)
							  			@foreach($disciplina->turmas as $turma)
							  			<option value="{{$disciplina->id}}">{{$disciplina->nome}} - {{$turma->nome}}</option>
							  			@endforeach 
							  		@endforeach
								</select>
							<label>
								E-mail
							</label><i style="color: #FF0000">*</i>
								<input type="text" name="email" class="form-control" placeholder="Digite o email">

							<label>
								Password
							</label><i style="color: #FF0000">*</i>
								<input type="password" name="password" class="form-control" placeholder="Digite a senha">
							<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" style="margin-top: 10px">
						</form>
					</div>
				</div>
			</div>
			</div>
	@stop