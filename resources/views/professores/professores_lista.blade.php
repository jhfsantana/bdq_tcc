<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Lista de Professores</title>
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
</head>
<body>
	<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/home">Inicio</a>
			<a class="navbar-brand" href="/turma/novo">Lista de Professores</a>
			<a class="navbar-brand" href="/professor/novo">Cadastro de professores</a>
			<a class="navbar-brand" href="/disciplina/novo">Cadastro de disciplinas</a>
			<a class="navbar-brand" href="/disciplinas">Lista de Disciplinas</a>
			<a class="navbar-brand" href="/alunos">Lista de Alunos</a>
			<a class="navbar-brand" href="/aluno/novo">Cadastro de Alunos</a>
			<a class="navbar-brand" href="/turma/novo">Cadastro de Turma</a>



	</nav>
	<div class="container">
		<table class="table">
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
		</table>	
	</div>
</body>
</html>