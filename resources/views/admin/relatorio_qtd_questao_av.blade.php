<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<title>Relatórios</title>

	<script type="text/javascript">
		
		 // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Questão por ID');
        data.addRows([
		@foreach($qtdQuestao as $qtd)
          ['ID da questão: {{$qtd->questao_id}}', {{$qtd->qtd}}],
         @endforeach
        ]);

        // Set chart options
        var options = {'title':'Número de questões utilizadas em Avaliações',
        			   'is3D':false,
                       'width':750,
                       'height':650,
                       'backgroundColor': 'transparent',
                       'pieHole': 0,
  					   'chartArea' : { left: 80 },
                       'legend': {'position': 'top'}};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

	</script>
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
			<td>{{$qtd->qtd}}</td>
		</tr>
	@endforeach
</table>
</div>

<div class="chart_div" id="chart_div" style="margin: 0 auto; display: block; float: left; margin-left: 650px"></div>

</body>
</html>