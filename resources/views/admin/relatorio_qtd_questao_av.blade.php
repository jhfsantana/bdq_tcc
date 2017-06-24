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
		var jsonQuestoes = {!! json_encode($chartQuestao, JSON_NUMERIC_CHECK) !!}
		var jsonFormatado = jsonQuestoes.data;

		window.onload = function () {
			var chartPizza = new CanvasJS.Chart("chartPizza",
			  {
			    title:{
			      text: "Questões mais utilizadas em Avaliações"
			    },
			                animationEnabled: true,
			    legend:{
			      verticalAlign: "center",
			      horizontalAlign: "left",
			      fontSize: 20,
			      fontFamily: "Helvetica"        
			    },
			    theme: "theme2",
			    data: jsonFormatado
			  });
			  chartPizza.render();
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
    <div class="col-md-12">
	    <div class="col-md-4 col-md-offset-4">
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

<hr>
<div class="row">
    <div class="col-md-12">
	    <div class="col-md-10 col-md-offset-1">
			<div class="chartPizza" id="chartPizza"></div>
		</div>
	</div>
</div>
	<script src="/js/jquery.datatables.min.js"></script>
	<script type="text/javascript" src="/js/jquery.canvasjs.min.js"></script>
	<script type="text/javascript" src="/js/canvasjs.min.js"></script>
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