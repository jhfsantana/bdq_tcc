    <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  <title>BDQ - Avaliação Online / Página inicial Administrativa</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/global.css">

  
</head>

<body>
		<div id="header" style="width: 100%; height: 135px;background-color: #34495e;">
      <div class="row">
        <div class="col-md-8 col-md-offset-5" ">
          <div class="logo" style="margin-left: 65px; margin-top: 0; margin-bottom: 155px;position: fixed;">
            <img src="/images/Untitled-4.svg/">
          </div>
        </div>
      </div>
		</div>

      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       MENU
                    </a>
                </li>
                
                <li>
                    <a href="/home"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                
                <li>
                  <a href="/administradores"><i class="fa fa-fw fa-cog"></i> Administradores</a>
                </li>

                <li>
                  <a href="/professores"><i class="fa fa-fw fa-group"></i> Professores</a>
                </li>

                <li>
                  <a href="/alunos"><i class="fa fa-fw fa-graduation-cap"></i> Alunos</a>
                </li>

                <li>
                    <a href="/disciplinas"><i class="fa fa-fw fa-book"></i> Disciplinas</a>
                </li>

                <li>
                    <a href="/turmas"><i class="fa fa-fw fa-pencil"></i> Turmas</a>
                </li>

                <li>
                    <a href="/admin/questoes"><i class="fa fa-fw fa-list-ol"></i> Questões</a>
                </li>

                <li>
                    <a href="/admin/lote"><i class="fa fa-fw fa-archive"></i> Questões em lote</a>
                </li>


                <li>
                    <a href="/relatorio"><i class="fa fa-fw fa-pie-chart"></i> Relatórios</a>
                </li>

                <li>
                    <a href="/administrador/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
            	<div class="flash-message">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))
				      	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
				      @endif
				    @endforeach
				</div>	

	<!-- FIM DA MENSAGEM DE SUCESSO -->
        		{!! Charts::assets() !!}
				<div class="conteudo">
          <div class="row">
  					<div class="col-md-10 col-md-offset-1" style="margin-top: 45px;">
  						
              <h3>Olá, {{Auth::guard('web_admins')->user()->name }} </h3>
                <i class="fa fa-fw fa-calendar"></i><em>{{$diames}}</em>

  						<h4>Resumo das informações</h4>

  						<div class="box-top">
  							<img src="images/professor_64px.png">
  							<h3 class="professores"> {{$professores}}</h3>
  							<a href="#">Nº Professores</a>
  						</div>

  						<div class="box2-top">
  							<img src="images/estudantes_64.png">
  							<h3 class="estudantes"> {{$alunos}} </h3>
  							<a href="#">Nº Estudantes</a>
  						</div>

  						<div class="box3-top">
  							<img src="images/estatistica_64.png">
  							<a href="/relatorio/"><u>Relatórios <i class="fa fa-fw fa-arrow-right"></i></u></a>
  						</div>
  						@foreach($chart as $c)
                  <div class="chart_div" id="chart_div" style="width: 100%; margin-top:25px; ">
                    {!! $c->render() !!}
                    <div style="float: left;">
                      {!! $realtime->render() !!}
                    </div>
                    <div style="float: right; margin-top: 15px; margin-left: 15px;">
                      {!! $chartPizza->render() !!}
                    </div>
                  </div>
              @endforeach
  				  </div>
          </div>



        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
  
    <!-- /#footer -->

<!--   <div class="navbar navbar-default navbar-fixed-bottom" style="text-align: center; background-color: #ccc; position: fixed;">
    <div class="container">
      <p>© 2016 Banco de Questões e Avaliação Online 
           <p>BDQ - Avaliação Online</p>
      </p>
    </div>
  </div> -->

      <!-- /#final footer -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
