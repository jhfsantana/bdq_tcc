<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  <title>BDQ - Avaliação Online / Página inicial Administrativa</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css'>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/global.css">

  
</head>

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
        background-image: url("/images/bell.svg");
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
        background:#95a5a6;
        color:#95a5a6;
        text-decoration:underline;
    }
</style>
<body>
		<div id="header" style="width: 100%; height: 135px;background-color:#95a5a6;">
      <div class="row">
        <div class="col-md-8 col-md-offset-5" ">
          <div class="logo" style="margin-left: 65px; margin-top: 0; margin-bottom: 155px; position: fixed;">
            <img src="/images/header_logo_professor.svg/">
          </div>
        </div>
      </div>
          <div id="notify" style="float: right;">
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
                    <a href="/professor"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>

                <li>
                  <a href="/professor/questoes"><i class="fa fa-fw fa-cog"></i> Questões</a>
                </li>

                <li>
                  <a href="/professor/avaliacao"><i class="fa fa-fw fa-group"></i> Avaliações</a>
                </li>

                <li>
                  <a href="/professor/avaliacao/gerar"><i class="fa fa-fw fa-graduation-cap"></i> Gerar Avaliação</a>
                </li>

                <li>
                    <a href="/professor/questao/add"><i class="fa fa-fw fa-book"></i> Cadastrar Questão</a>
                </li>

                <li>
                   <a href="/professor/alunos"><i class="fa fa-fw fa-pencil"></i> Alunos</a>
                </li>

                <li>
                   <a href="/professor/turmas"><i class="fa fa-fw fa-users"></i> Turmas</a>
                </li>

                <li>
                    <a href="/professor/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
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

		<div class="conteudo">
			<div class="row">
				<div class="col-md-12" style="margin-top: 175px;">
          <div class="col-md-offset-1">
            <h4>Professor(a): {{Auth::guard('web_teachers')->user()->nome }} </h4>
            <i class="fa fa-fw fa-calendar"></i><em>{{$diames}}</em>  
          </div>
				
        <!-- MENSAGEM DE SUCESSO -->
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <h3><p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p></h3>
              @endif
            @endforeach
        </div>  
        <!-- FIM DA MENSAGEM DE SUCESSO -->

        <fieldset>
          <legend>
            <h4>Resumo das informações</h4>  
          </legend>

  				<div class="box-top" style="border-color: #2980b9; background-color: #ecf0f1;">
  					<img src="images/professor_64px.png">
  					<h3 class="professores"  style="color: #2980b9;">{{$turmas}}</h3>
            <a href="/professor/turmas"><p style="color: #2980b9;">MINHAS TURMAS <i class="glyphicon glyphicon-circle-arrow-right"></i></p></a>
  				</div>

  				<div class="box2-top" style="border-color: #e67e22;background-color: #ecf0f1; ">
  					<img src="images/estudantes_64.png">
  					<h3 class="estudantes" style="color: #e67e22;"> {{$alunos}} </h3>
  					<a href="/professor/alunos"><p style="color: #e67e22;">MEUS ALUNOS <i class="glyphicon glyphicon-circle-arrow-right"></i></p></a>
  				</div>

  				<div class="box3-top" style="border-color: #27ae60; background-color:#ecf0f1 ">
  					<img src="images/professor/notification.svg" style="width: 64px; height: 64px;">
            <a href="/professor/notificacoes"><p style="color: #27ae60;">NOTIFICAÇÕES <i class="glyphicon glyphicon-circle-arrow-right"></i></p></a>
  				</div>
        </fieldset>    
			</div>
		</div>
    <fieldset>
      <legend>
        MÉTRICA
      </legend>
        <div class="col-md-12">
          <div class="col-md-12">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </fieldset>
  </div>
</div>

<div class="modal fade" id="enviarMensagem" tabindex="-1" role="dialog" aria-labelledby="enviarMensagemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enviarMensagemLabel">Enviar Mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/enviar/mensagem">
        <div class="modal-body">
          <form>
            <div class="form-group">
              Para:<input type="text" class="form-control" id="nome" name="nome" readonly="true" style=" background:rgba(0,0,0,0);border:none;color: black;">
              <input type="hidden" class="form-control" id="aluno_id" name="aluno_id">
            </div>
            <div class="form-group">
              <label for="message-text" class="form-control-label">Mensagem:</label>
              <textarea class="form-control" id="mensagem" name="mensagem"></textarea>
              <input name="_token" type="hidden" value="{{ csrf_token() }}">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <input type="submit" class="btn btn-primary" name="Enviar" "></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>
  
<script src="js/index.js"></script>
<script type="text/javascript" src="/js/jquery.canvasjs.min.js"></script>
<script type="text/javascript" src="/js/canvasjs.min.js"></script>
<script>

$(document).on("click", ".open-enviarMensagem", function () {
     var aluno_id = $(this).data('id');
     var aluno_nome = $(this).data('nome');
     $(".modal-body #nome").val( aluno_nome );
     $(".modal-body #aluno_id").val( aluno_id );

});

$(document).ready(function() {
    $('#tab').DataTable(
       {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página ",
            "zeroRecords": "Nada encontrado - desculpe",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponivel",
            "infoFiltered": "(Filtrado em um total de _MAX_ )",
            "paginate": {
            "previous": "Anterior",
            "next": "Proxima"
            },
            "search" : "Buscar"
        },
        "responsive" : true
      });
} );
    $(document).ready(function () {

        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
        var count = ({{ $contador_notificacoes }});
 
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



// var objectFromJSON = some_json_decode_procedure(); // decoding JSON to native object
// var dateArray = objectFromJSON.start.split(','); // splitting string to elements for new Date()
// objectFromJSON.start = new Date(dateArray[0], dateArray[1], dateArray[2], dateArray[3], dateArray[4], dateArray[5]);

var jsonMedias = {!! json_encode($medias, JSON_NUMERIC_CHECK) !!}
var dateArray = jsonMedias.data;


$.each(jsonMedias.data, function (key, data) {
    $.each(data.dataPoints, function(key, data){
      data.x = new Date(data.x)
      //data.dataPoints = new Date(data.x);
    })
})

var jsonFormatado = jsonMedias.data;

console.log(JSON.stringify(jsonFormatado))
//   $.each(jsonMedias)
// jsonMedias.data.dataPoints = new Date(dateArray[0].dataPoints[0].x);
// console.log(jsonMedias)
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
        text: "DESEMPENHO DOS MEUS ALUNOS",
        fontSize: 30
      },
                        animationEnabled: true,
      axisX:{

        gridColor: "Silver",
        tickColor: "silver",
        valueFormatString: "MMM/YY"

      },                        
                        toolTip:{
                          shared:true
                        },
      theme: "theme1",
      axisY: {
        gridColor: "Silver",
        tickColor: "silver"
      },
      legend:{
        verticalAlign: "center",
        horizontalAlign: "right"
      },
      data: jsonFormatado,
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
    });

chart.render();
}
</script>
</body>
</html>
