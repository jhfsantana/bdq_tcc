<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<link rel="stylesheet" href="/css/tabs.css">
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
                       'width':450,
                       'height':450,
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
<!-- 
<div class="container" style="text-align: center;">
<button class="btn btn-primary">
	Questões mais utilizadas
</button>
<button class="btn btn-primary">
	Questões mais utilizadas
</button>
<button class="btn btn-primary">
	Questões mais utilizadas
</button>
<button class="btn btn-primary">
	Questões mais utilizadas
</button>
<button class="btn btn-primary">
	Questões mais utilizadas
</button> -->
<div class="row">
    <div class="col-md-4 col-md-offset-5">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
            	<ul class="nav nav-tabs">
					<li  role="presentation"><a href="/home">Página inicial</a></li>
					<li  role="presentation" class="active"><a href="/relatorio/questao/50">Questões</a></li>
					<li  role="presentation"><a href="/relatorio/">Professores</a></li> 
					<li  role="presentation"><a href="/relatorio/notas/1">Notas</a></li> 
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container" style="text-align: center;">
<h3 style="text-align: center;">Questões mais utilizadas</h3>

<table id="questoes" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
				<td>DISCIPLINA</td>
				<td>ID DA QUESTÃO</td>
				<td>QUESTÃO</td>
				<td>QUANTIDADE UTILIZADA</td>
	        </tr>
        </thead>
        <tfoot>
            <tr>
				<td>DISCIPLINA</td>
				<td>ID DA QUESTÃO</td>
				<td>QUESTÃO</td>
				<td>QUANTIDADE UTILIZADA</td>
            </tr>
        </tfoot>
        <tbody>
			@foreach($qtdQuestao as $qtd)
	            <tr>
					<td>{{$qtd->disciplina_nome}}</td>
					<td>{{$qtd->questao_id}}</td>
					<td>{{$qtd->questao_nome}}</td>
					<td>{{$qtd->qtd}}</td>
	            </tr>
        	@endforeach
        </tbody>
    </table>



</div>

<div class="row">
    <div class="col-md-2 col-md-offset-6">
		<div class="chart_div" id="chart_div"></div>
	</div>
</div>
	<script src="/js/jquery.datatables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript">
	$(document).ready(function() {
    $('#questoes').DataTable( {
			"bFilter": false,
        	"bInfo": false,
        
	        "language": {
					"paginate": {
						"previous": "Página anterior",
						"next": "Próxima página"
						},
					"lengthMenu": "Mostrar _MENU_ registros por página",
					"zeroRecords": "Nenhuma informação encontrada :(",
            		"info": "Mostrando página _PAGE_ de _PAGES_",
					}
        });
    } );

	</script>
	<style type="text/css">
		.dataTables_paging { display: none; }
	</style>
</body>
</html>