@extends('templates.admin.template')

@section('scripts')
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BDQ - Lista de Administradores</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

@stop

@section('content')
    <div class="modal fade" id="pleaseWaitDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h1>Processando</h1>
          </div>
          <div class="modal-body">
            <div class="progress">
              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 style="text-align: center;">Cadastrar questões em lote</h3>

    <div class="alert alert-warning" style="width: 50%;">
        Instruções para processar um arquivo XML
        <ul>
            <li> Faça o download do arquivo modelo e abra no Excel </li>
            <li> 
                <a href="/download/arquivo/modelo" download>
                    Clique aqui para o download
                </a>
            </li>
            <li> Preencha de acordo com as colunas </li>
            <li> Vá em Arquivos > Salvar como > Salve como <strong><span style="font-size: 1.1em;"><u>Dados XML</u></span></strong> </li>
            <li> Faça o upload do arquivo e o envie para o processamento </li>
        </ul>
    </div>

    <div style="text-align: center;">
        <form method="POST" action="/admin/carregar/lote" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input name="admin_id" type="hidden" value="{{ Auth::user()->id}}">
            <label class="btn btn-danger" for="file" style="width: 20%;padding: 13px;" title="Selecione um arquivo xml para ser processado">
                <input id="file" name="file" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                <img src="/images/upload-folder.svg" style="width: 70px; height: 70px;">
            </label>
            <span class='label label-info' id="upload-file-info"></span>
            
            </br>
            </br>
            <label class="btn btn-primary" for="carregar" style="width: 20%;">
                <input type="submit" id="carregar" name="carregar" value="Carregar" style="display:none;" onclick="animateText()">
                    Processar
            </label>
        </form>   
    </div>






    <script type="text/javascript">

        window.animateText=function(){
            waitingDialog.show('Processando');
            var animation=waitingDialog.animate();
            setTimeout(function () {
                waitingDialog.hide();
                waitingDialog.stopAnimate(animation);
            }, 5000);
        }
        // $(function () {
        //     var pleaseWait = $('#pleaseWaitDialog'); 

        //     showPleaseWait = function() {
        //     pleaseWait.modal('show');
        // };

        //     hidePleaseWait = function () {
        //     pleaseWait.modal('hide');
        // };

        //     showPleaseWait();
        // });
    </script>

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/waitingfor.js"></script>
@stop