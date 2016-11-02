<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Relatórios</title>
</head>
<body>
<div class="container" style="text-align: center;">
	<h1>Relatórios</h1>

	<table class="table table-striped">
		
	<tr>
		<td><strong>Matricula</strong></td>
		<td><strong>Nome</strong></td>
		<td><strong>Email</strong></td>
		<td><strong>Disciplina</strong></td>
		<td><strong>Total de Questoes</strong></td>
	</tr>
		@foreach($professores_top_questao as $professores)
		<tr>
			<td>{{$professores->matricula}}</td>
			<td>{{$professores->nome}}</td>
			<td>{{$professores->email}}</td>
			<td>{{$professores->disciplina_nome}}</td>
			<td>{{$professores->total_questoes}}</td>
		</tr>
		@endforeach
	</table>



  <div class="dropdown" style="float: right;">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border-color: #0011FF">Disciplinas 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	@foreach($disciplinas as $disciplina)
    		<li><a href="/relatorio/{{$disciplina->id}}">{{$disciplina->nome}}</a></li>
    	@endforeach
    </ul>
  </div>

	<table class="table table-striped">	
	<tr>
		<td><strong>Nome</strong></td>
		<td><strong>Disciplina</strong></td>
		<td><strong>Turma</strong></td>
		<td><strong>Nota</strong></td>
	</tr>
		@foreach($notas as $nota)
		<tr>
			<td>{{$nota->aluno_nome}}</td>
			<td>{{$nota->disciplina_nome}}</td>
			<td>{{$nota->turma_nome}}</td>
			<td>{{$nota->nota}}</td>
		</tr>
		@endforeach
	</table>
</div>

</body>
</html>