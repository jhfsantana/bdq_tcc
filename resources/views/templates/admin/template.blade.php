    <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  <title>BDQ - Avaliação Online / Página inicial Administrativa</title>
  

	@yield('scripts') 
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
            	

	<!-- FIM DA MENSAGEM DE SUCESSO -->
        		{!! Charts::assets() !!}
		<div class="conteudo">
        <div style="width: 100%; height: 85px; background-color: #bdc3c7;">
          <div class="row">
            <h3 style="margin-left: 25px; color: white; "><span class="glyphicon glyphicon-cog"></span>Professores</h3>
          </div>
        </div> 
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-10 col-md-offset-1">
      <div class="flash-message" style="width: 50%;">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
            @if($msg == 'danger')
            <p class="alert alert-{{ $msg }}"><img src="/images/warning.svg" style="width: 30px; height: 30px;"> {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
            @else
            <p class="alert alert-{{ $msg }}"><img src="/images/success.svg" style="width: 30px; height: 30px;"> {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
            @endif
          @endif
        @endforeach
      </div>

  			@yield('content')

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

<script src="/js/index.js"></script>

</body>
</html>
