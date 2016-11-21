<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Relatórios</title>
</head>
<body>
<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="/home">Inicio</a>
	<ul class="nav navbar-nav">
      <li><a href="/relatorio/questao">Questões</a></li>
      <li><a href="/relatorio/">Professores</a></li> 
      <li><a href="/relatorio/notas">Notas</a></li> 
    </ul>
</nav>

<div class="container" style="text-align: center;">
	<h1>Relatórios</h1>

  <div class="dropdown" style="float: right;">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border-color: #0011FF">Disciplinas 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	@foreach($disciplinas as $disciplina)
    		<li><a href="/relatorio/notas/{{$disciplina->id}}">{{$disciplina->nome}}</a></li>
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