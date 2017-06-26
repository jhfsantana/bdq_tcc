@extends('templates.professor.template')
    @section('head')
    	<link rel="stylesheet" href="/css/global.css">
    	<link rel="stylesheet" href="/css/formularios.css">
		<title>Lista de Notificações</title>
    @stop
    @section('titulo')
		<i class="fa fa-envelope" aria-hidden="true"></i>
	Notificações
    @stop
    @section('content')

    <div class="row">
    	<div class="col-md-12">
    	
    	<fieldset>
    		<legend>Notificações</legend>
    		<table class="table">
    			<thead>
    				<th>Mensagem</th>
    				<th>Aluno</th>
    				<th>Finalizada</th>
    			</thead>
    			@foreach($professor->notificacoes as $notificacao)
	    			<tbody>
	    				<tr>
	    					<td> {{ $notificacao->mensagem }}</td>
	    					<td> {{ $notificacao->aluno->nome }}</td>
	    					<td> {{ $notificacao->created_at->format('d-m-Y') }}</td>
	    				</tr>
	    			</tbody>
    			@endforeach
    		</table>
    	</fieldset>
    	</div>
    </div>
    @stop