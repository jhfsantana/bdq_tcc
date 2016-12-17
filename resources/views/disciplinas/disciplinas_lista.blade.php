@extends('templates.admin.template')
	@section('scripts')
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>	
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/> 
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
 	<title>Lista de disciplinas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	<div class="container">
		<h2 style="text-align: center;">Lista de disciplinas</h2>
		<br>
		<br>
		<br>
		<form action="/disciplina/novo">
			<button class="btn btn-primary" style="float: right;">
				<img src="/images/novo.png"><i>Nova Disciplina</i>
			</button>
		</form>
		<br>
		<br>
	<table id="disciplinas" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Turma</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Disciplina</th>
                <th>Turma</th>
            </tr>
        </tfoot>
        <tbody>
        	@foreach($disciplinas as $disciplina)
	            @foreach($disciplina->turmas as $turma)
		            <tr>
		                <td>{{$disciplina->nome}}</td>
		                <td>{{$turma->nome}}</td>
		            </tr>
	            @endforeach
        	@endforeach
        </tbody>
    </table>

	<script src="/js/jquery.datatables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript">
	$(document).ready(function() {
    $('#disciplinas').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Não encontramos nada :(",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Não encontramos nada :(",
            "infoFiltered": "(total de  _MAX_ registros)",
            "search": "Pesquisar"
        }
    } );	
} );	
	
	</script>
	@stop