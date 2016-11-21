<html>
<head>
		<title>BDQ - Avaliação Online</title>
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
          @foreach($top as $t)
          ['{{$t->nome}}', {{$t->total_questoes}}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'Número de questões adicionadas por professores',
        			   'is3D':true,
                       'width':750,
                       'height':650,
                       'backgroundColor': 'transparent',
                       'pieHole': 0,
                       'chartArea.width': 150};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
        {!! Charts::assets() !!}

	<div id="header">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/home">Inicio</a></li>
			    <li><a href="/administrador/novo">Cadastro de administradores</a></li>
			    <li><a href="#">Lista de administradores</a></li>
			    <li><a href="/professor/novo">Cadastro de professores</a></li> 
			    <li><a href="/professores">Lista de Professores</a>
			      <ul> 
			        <li><a href="/aluno/novo">Cadastro de Alunos</a></li>
			        <li><a href="/alunos">Lista de Alunos</a></li> 
			        <li><a href="/disciplina/novo">Cadastro de disciplinas</a></li> 
			        <li><a href="/disciplinas">Lista de Disciplinas</a></li>  
			        <li><a href="/turma/novo">Cadastro de Turma</a></li> 
			      </ul> 
			    </li>
			    <li><a href="administrador/logout">Logout</a></li> 

			 </ul>
		</div>
		<div class="content">
		<br>
		<br>
		<br>
		<h1>Olá, {{Auth::guard('web_admins')->user()->name }}</h1>
		<br>
		<h2>Painel de Informações</h2>
			<p>resumo das informações</p>
			<div id="box">
				<div class="box-top">
					<img src="images/professor_64px.png">
					<h3 class="professores"> {{$professores}}</h3>
					<a href="#">Total de professores</a>
				</div>

				<div class="box2-top">
					<img src="images/estudantes_64.png">
					<h3 class="estudantes"> {{$alunos}} </h3>
					<a href="#">Total de estudantes</a>
				</div>

				<div class="box3-top">
					<img src="images/estatistica_64.png">
					<a href="/relatorio/">Relatórios</a>
				</div>
				
				<div id="chart_div" style="float: right; margin-right: 450px;"></div>

			</div>
		</div>
	</div>

	<script type="text/javascript">

	$(document).ready(function(){
     $("a.mobile").click(function(){
      $(".sidebar").slideToggle('slow');
     });

    window.onresize = function(event) {
      if($(window).width() > 480){
      	$(".sidebar").show();
      }
    };


	});

</script>