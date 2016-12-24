@extends('templates.professor.template')
    @section('head')
    	<link rel="stylesheet" href="/css/global.css">
    	<link rel="stylesheet" href="/css/formularios.css">
		<title>Lista de Alunos</title>
    @stop
    @section('content')
    <br>
    <br>
    <br>
    <h3 style="text-align: center;">Meus Alunos</h3>



    	<table id="alunos" class="table table-striped" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Matricula</th>
	                <th>Nome</th>
	                <th>E-mail</th>
	                <th>Turma</th>
		        </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Matricula</th>
	                <th>Nome</th>
	                <th>E-mail</th>
	                <th>Turma</th>
	            </tr>
	        </tfoot>
	        <tbody>
	    		@foreach($disciplina->alunos as $alunos)
	    			@foreach($disciplina->turmas as $turmas)
			            <tr>
							<td>{{$alunos->matricula}}</td>
							<td>{{$alunos->nome}}</td>
							<td>{{$alunos->email}}</td>
							<td>{{$turmas->nome}}</td>
						</tr>
					@endforeach
				@endforeach
			</tbody>
		</table>
    @stop