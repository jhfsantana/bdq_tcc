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
      <li><a href="/relatorio/notas/1">Notas</a></li> 
    </ul>
</nav>
<div class="container" style="text-align: center;">


<h3 style="text-align: center;">Questão usadas com mais frequencia</h3>

<table class="table table-striped">
	<tr>
		<td>DISCIPLINA</td>
		<td>ID DA QUESTÃO</td>
		<td>QUESTÃO</td>
		<td>QUANTIDADE UTILIZADA</td>
	</tr>
	
	@foreach($qtdQuestao as $qtd)
		<tr>
			<td>{{$qtd->disciplina_nome}}</td>
			<td>{{$qtd->questao_id}}</td>
			<td>{{$qtd->questao_nome}}</td>
		</tr>
	@endforeach
</table>
</div>
</body>
</html>