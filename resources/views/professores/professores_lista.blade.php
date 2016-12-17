@extends('templates.admin.template')

	@section('scripts')
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>	
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  	
	<script>
	function confirmDelete(e) {
	    if(confirm('Deseja confirmar a exclusão?')== true)
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
	<div class="container">
				<!-- MENSAGEM DE SUCESSO -->
				<div class="flash-message">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))

				      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
				      @endif
				    @endforeach
				 </div>	

			<!-- FIM DA MENSAGEM DE SUCESSO -->
	<h2 style="text-align: center;">Lista de professores</h2>
	<form action="/professor/novo">
		<button class="btn btn-primary" style="float: right;">
			<img src="/images/novo.png"><i>Novo Professor</i>
		</button>
	</form>
	<br>
	<br>
	<table id="professores" class="table table-striped" cellspacing="0" width="100%">
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
			@foreach($professores as $professor)
	            <tr>
					<td>{{$professor->matricula}}</td>
					<td>{{$professor->nome}}</td>
					<td>{{$professor->email}}</td>
					<td><form id="formalterar" method="post" action="/professor/questao/alterar/{{$professor->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden" form="formalterar" value="{{$professor->id}}" name="professor_id"/>
							
							<button type="submit" name="alterar" id="alterar" class="btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</form>
					</td>
					<td><form id="formdeletar" method="post" action="/professores/{{$professor->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden" form="formdeletar" value="{{$professor->id}}" name="professor_id" id="professor_id" />
							<button type="submit" onclick="confirmDelete(event)" name="deletar" id="deletar" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</td>
					<td><form id="formdetalhes" method="post" action="/professor/detalhes/{{$professor->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden" form="formalterar" value="{{$professor->id}}" name="professor_id"/>
							<input type="hidden" id="professor" value="{{$professor->nome}}">
							<button type="submit" name="detalhes" id="detalhes" class="btn btn-info">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</form>
					</td>
	            </tr>
        	@endforeach
        </tbody>
    </table>

    	<script src="/js/jquery.datatables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript">
	$(document).ready(function() {
    $('#professores').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nenhuma informação encontrada :(",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Não encontramos nada :(",
            "infoFiltered": "(total de  _MAX_ registros)",
            "search": "Pesquisar"
        }
    } );	
} );	
	
	</script>
		@stop