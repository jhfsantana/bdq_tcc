@extends('templates.admin.template')
	@section('scripts')
		<link type="text/css" rel="stylesheet" href="/css/global.css" />
		<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
		<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">
function confirmDelete(e) {
    if(confirm('Deseja excluir este aluno?')== true)
    {
    	return true;
    }else{
    	  e.preventDefault();
    	return false;
    }
}
</script>
	@stop
	
	@section('content')
	<br>
	<br>
	<br>
		<div style="text-align:center">
			<h1>Lista de Alunos</h1>
					<div class="flash-message">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))

				      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
				      @endif
				    @endforeach
			</div>	

		<div class="container">

	<form action="/aluno/novo">
		<button class="btn btn-primary" style="float: right;">
			<img src="/images/novo.png"><i>Novo Aluno</i>
		</button>
	</form>
	<br>
	<br>
	<br>
	<table id="alunos" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Editar</th>
                <th>Remover</th>
                <th>Detalhes</th>
	            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Editar</th>
                <th>Remover</th>
                <th>Detalhes</th>
            </tr>
        </tfoot>
        <tbody>
			@foreach($alunos as $aluno)
	            <tr>
					<td>{{$aluno->matricula}}</td>
					<td>{{$aluno->nome}}</td>
					<td>{{$aluno->email}}</td>
					<td><form id="formalterar" method="get" action="/aluno/alterar/{{$aluno->id}}">
							<input type="hidden" form="formalterar" value="{{$aluno->id}}" name="professor_id"/>
							
							<button type="submit" name="alterar" id="alterar" class="btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</form>
					</td>
					<td><form id="formdeletar" method="post" action="/alunos/{{$aluno->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<button type="submit" onclick="confirmDelete(event)" name="deletar" id="deletar" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</td>
					<td><form id="formdetalhes" method="get" action="/aluno/detalhes/{{$aluno->id}}">
							<button type="submit" name="detalhes" id="detalhes" class="btn btn-info">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</form>
					</td>
	            </tr>
        	@endforeach
        </tbody>
    </table>
    </div>

    	<script src="/js/jquery.datatables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript">
	$(document).ready(function() {
    $('#alunos').DataTable( {
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