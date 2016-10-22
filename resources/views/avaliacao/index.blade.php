<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	

	<title>Avaliacao</title>
</head>
<body>					


<div class="container">
	<h2>Professor: {{Auth::user()->nome}}</h2>
</div>


<?php $count=0; ?>
	<div class="container">
		@foreach($avaliacoes as $avaliacoes)
			<table class="table">
				<tr>
				<td><a href="finalizada/{{$avaliacoes->id}}">{{$avaliacoes->id}} - {{$avaliacoes->disciplina->nome}}</a></td>

				</tr>
			</table>
		@endforeach
	</div>
</body>
</html>