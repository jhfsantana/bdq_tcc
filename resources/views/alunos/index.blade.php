<html>
<head>
		<title>BDQ - Avaliação Online</title>
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css'>
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="/css/formularios.css">
<style>
	<style>
    div#notify ul {
        display:block;
        background: transparent;
        list-style:none;
        margin:0;
        padding:12px 10px;
        height:21px;
    }
   div#notify ul li {
        float:left;
        font:13px helvetica;
        font-weight:bold;
        margin:3px 0;
    }
   div#notify ul li a {
        text-decoration:none;
        padding:6px 15px;
        cursor:pointer;
    }
   div#notify ul li a:hover {
        text-decoration:none;
        cursor:pointer;
    }
        
    #noti_Container {
        position:relative;
    }
       
    /* A CIRCLE LIKE BUTTON IN THE TOP MENU. */
    #noti_Button {
        width:42px;
        height:42px;
        line-height:42px;
/*        border-radius:50%;
        -moz-border-radius:50%; 
        -webkit-border-radius:50%;*/
        margin:-3px 10px 0 10px;
        cursor:pointer;
        background-image: url("/images/messagealuno.svg");
    }
        
    /* THE POPULAR RED NOTIFICATIONS COUNTER. */
    #noti_Counter {
        display:block;
        position:absolute;
        background:#E1141E;
        color:#FFF;
        font-size:18px;
        font-weight:normal;
        padding:1px 8px;
        margin:-8px 0 0 25px;
        border-radius:2px;
        -moz-border-radius:2px; 
        -webkit-border-radius:2px;
        z-index:1;
    }
        
    /* THE NOTIFICAIONS WINDOW. THIS REMAINS HIDDEN WHEN THE PAGE LOADS. */
    #notifications {
        display:none;
        width:330px;
        position:absolute;
        top:30px;
        right:0;
        background:#FFF;
        border:solid 1px rgba(100, 100, 100, .20);
        -webkit-box-shadow:0 3px 8px rgba(0, 0, 0, .20);
        z-index: 0;
    }
    /* AN ARROW LIKE STRUCTURE JUST OVER THE NOTIFICATIONS WINDOW */
    #notifications:before {         
        content: '';
        display:block;
        width:0;
        height:0;
        float: right;
        color:transparent;
        border:10px solid #CCC;
        border-color:transparent transparent #FFF;
        margin-top:-20px;
        margin-left:10px;
        margin-right: 20px;
    }
        
   div#notify h3 {
        display:block;
        color:#333; 
        background:#FFF;
        font-weight:bold;
        font-size:13px;    
        padding:8px;
        margin:0;
        border-bottom:solid 1px rgba(100, 100, 100, .30);
    }
        
    .seeAll {
        background:#F6F7F8;
        padding:8px;
        font-size:12px;
        font-weight:bold;
        border-top:solid 1px rgba(100, 100, 100, .30);
        text-align:center;
    }
  div#notify  .seeAll a {
        color:#95a5a6;
    }
  div#notify  .seeAll a:hover {
        color:#95a5a6;
        text-decoration:underline;
    }
</style>
</style>

</head>
<body>



	<div id="header" style="height: 80px;">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
		<div id="notify" style="float: right; margin-right: 50px; margin-top: 14px;">
              <ul>
                  <li id="noti_Container">
                      <div id="noti_Counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->
                      
                      <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
                      <div id="noti_Button"></div>    

                      <!--THE NOTIFICAIONS DROPDOWN BOX.-->
                      <div id="notifications">
                          <h3>Notificações</h3>
                          <div style="height:300px;">
                            @foreach($notificacoes as $notificacao)
                              <div class="list-group">
                                <a href="#" class="list-group-item">{{$notificacao->mensagem}}</a>
                              </div>
                            @endforeach
                          </div>
                          <div class="seeAll"><a href="#">Ver todas</a></div>
                      </div>
                  </li>
              </ul>
          </div>
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li data-toggle="tooltip" data-placement="right" title="Home"><a href="aluno" ><img src="images/home.svg" style="width: 32px;width: 32px;"></a></li> 
			    <li data-toggle="tooltip" data-placement="right" title="Avaliações"><a href="aluno/avaliacoes"><img src="images/exam.svg" style="width: 32px;width: 32px;"></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="Avaliações Realizadas"><a href="aluno/avaliacoes/realizadas"><img src="images/notas.png" style="width: 32px;width: 32px;"></a></li>
          <li data-toggle="tooltip" data-placement="right" title="Mensagens"><a href="aluno/mensagens"><img src="images/messagewhite.svg" style="width: 32px;width: 32px;" ></a></li> 
			    <li data-toggle="tooltip" data-placement="right" title="Sair"><a href="aluno/logout"><img src="images/logout.svg" style="width: 32px;width: 32px;" ></a></li> 

			 </ul>
		</div>
		<br>
		<br>
		<br>
		<div class="content">
		<h1>Olá, {{Auth::guard('web_students')->user()->nome }}</h1> <p>
<p>
		<br>
			
			<!-- MENSAGEM DE SUCESSO -->
				<div class="flash-message">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))

				      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
				      @endif
				    @endforeach
				 </div>	

			<!-- FIM DA MENSAGEM DE SUCESSO -->
		<h2>Painel de Informações</h2>
			<p>resumo das informações</p>
			<div id="box">
				<div class="box-top">
					<img src="images/notas.png">
					<a href="#" style="float: left;">Ultimo resultado</a>
					<h3 class="alunos" style="float: right; margin-top: 13px;">
						@if(count($aluno)>0)
							{{$aluno->nota}} - {{$aluno->nome}}</h3>
						@else
							S/N
						@endif
				</div>

				<div class="box2-top">
					<img src="images/estudantes_64.png">
					<h3 class="estudantes">4</h3>
					<a href="#">Turmas matriculadas</a>
				</div>

				<div class="box3-top">
					<img src="images/estatistica_64.png">
					<a href="#">Estatisticas</a>
				</div>
				
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


	$(document).ready(function () {

        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
		var count = {{$contador_notificacoes}}
        $('#noti_Counter')
          .css({ opacity: 0 })
          .text(count)              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
          .css({ top: '-10px' })
          .animate({ top: '-2px', opacity: 1 }, 500);

        

        $('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#2E467C');
                }
                else $('#noti_Button').css('background-color', '#7f898a');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
          $('#notifications').hide();
          
          @if(count(App\Models\Notificacao::all()->where('professor_id', Auth::user()->id)->where('visualizado', 0)->where('avaliacao_id', '<>', 0)) > 0)
              $.ajax({   
              type: "get",
              url: "/notificacao/visualizada",
              data:  {'visualizada' : 1},
              dataType: "JSON",   //enviando json para request                
              success: function(response){
                  console.log(response);
              }

              });
            @endif
            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {

                $('#noti_Button').css('background-color', 'transparent');
            }
        });

        $('#notifications').click(function () {
            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        });
    });

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

		<form action="aluno/avaliacoes/realizadas/{{Auth::user()->id}}" method="post" id="formRealizadas">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>

</body>
</html>

