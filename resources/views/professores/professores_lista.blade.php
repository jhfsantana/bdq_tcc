@extends('templates.admin.template')

	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  	
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
	<div class="container">
	<h2 style="text-align: center;">Lista de professores</h2>
		<table class="table table-striped">
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
		@stop