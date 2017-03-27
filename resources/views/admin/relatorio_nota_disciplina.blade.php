<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/css/tabs.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
        data.addColumn('number', 'Slices');
        data.addRows([
			   @foreach($notas as $nota)
          		['{{$nota->aluno_nome}}', {{$nota->nota}}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'Notas dos alunos',
        			   'is3D':false,
                       'width':450,
                       'height':450,
                       'backgroundColor': 'transparent',
                       'pieHole': 0,
                       'chartArea.width': 150,
                       'legend': {'position': 'top'}};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

	<title>Relatórios</title>
</head>
<body>
<div id="header">
	<div class="logo">
		<a href="#">BDQ - Avaliação<span>Online</span></a>
	</div>
	<div class="headeruser">
		<h3 style="float: right; color: #E7E7E7; margin: 0px; margin-top: 8px;">Você está logado como administrador(a): {{Auth::guard('web_admins')->user()->name }}</h3>
		<img src="/images/admin-header.png" style="float: right; margin-right: 10px; margin-top: 5px">
	</div>
</div>
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-md-4 col-md-offset-5">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
            	<ul class="nav nav-tabs">
					<li  role="presentation"><a href="/home">Página inicial</a></li>
					<li  role="presentation"><a href="/relatorio/questao/50">Questões</a></li>
					<li  role="presentation"><a href="/relatorio/">Professores</a></li> 
					<li  role="presentation"  class="active"><a href="/relatorio/notas/1">Notas</a></li> 
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<h3 style="text-align: center;">Relatório de notas por disciplina e turma</h3>
  <div class="dropdown" style="float: right;">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border-color: #0011FF">Disciplinas 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	@foreach($disciplinas as $disciplina)
			@foreach($disciplina->turmas as $turma)
    			<li><a href="/relatorio/notas/{{$disciplina->id}}">{{$disciplina->nome}} da turma {{$turma->nome}}</a></li>
    		@endforeach
    	@endforeach
    </ul>
  </div>
	<table id="notas" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
				<td>NOME</td>
				<td>DISCIPLINA</td>
				<td>TURMA</td>
				<td>NOTA</td>
	        </tr>
        </thead>
        <tfoot>
            <tr>
				<td>NOME</td>
				<td>DISCIPLINA</td>
				<td>TURMA</td>
				<td>NOTA</td>
            </tr>
        </tfoot>
        <tbody>
		@foreach($notas as $nota)
			<tr>
				<td>{{$nota->aluno_nome}}</td>
				<td>{{$nota->disciplina_nome}}</td>
				<td>{{$nota->turma_nome}}</td>
				<td>{{$nota->nota}}</td>
			</tr>
		@endforeach
        </tbody>
    </table>
</div>
</div>

<div class="row">
    <div class="col-md-2 col-md-offset-5">
		<div class="chart_div" id="chart_div"></div>
	</div>
</div>

<script src="/js/jquery.datatables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript">
	$(document).ready(function() {
    $('#notas').DataTable( {
			"bFilter": false,
        	"bInfo": false,
        
	        "language": {
					"paginate": {
						"previous": "Página anterior",
						"next": "Próxima página"
						},
					"lengthMenu": "Mostrar _MENU_ registros por página",
            		"info": "Mostrando página _PAGE_ de _PAGES_",
					"zeroRecords": "Nenhuma informação encontrada :(",
					}
        });
    } );

	</script>
</body>
</html>