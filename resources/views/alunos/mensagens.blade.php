@extends('templates.aluno.template')
@section('head')
	<link rel="stylesheet" href="/css/global.css">	
	<link rel="stylesheet" href="/css/formularios.css">  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<style>
	div#msg {
    white-space: nowrap; 
    width: 12em; 
    overflow: hidden;
    text-overflow: ellipsis; 
}
</style>
@stop
@section('content')

<div style="margin-top: 80px;">
	<h2 style="text-align: center;	">Mensagens</h2>

 <table id="tab" class="table table-striped" style="border-style: inset; border-width:1px; ">
       <thead>
        <tr>
           <td> <strong>ID</strong></td>
           <td> <strong>Enviado por</strong></td>
           <td><strong>Mensagem</strong></td>
           <td><strong>Data e Hora</strong></td>
           <td><strong>Visualizar</strong></td>
        </tr>
       </thead>
       <tbody>
          @foreach($notificacoes as $notificacao)
            <tr >
                <td>{{ $notificacao->id }}</td>
                <td>{{ $notificacao->professor->nome }}</td>
                <td><div id="msg"> {{ $notificacao->mensagem }}</div></td>
                <td>{{ $notificacao->created_at }}</td>
                <td><a href="#" data-toggle="modal" data-target="#myModal" data-nome="{{ $notificacao->professor->nome }}" data-msg="{{ $notificacao->mensagem }}"><i class="glyphicon glyphicon-search"></i></a></td>
            </tr>
          @endforeach
       </tbody>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">MENSAGEM</h4>
      </div>
      <div class="modal-body">
        <input type="text" readonly="true" name="nome" id="nome">
        </br>
        <input type="text" readonly="true" name="msg" id="msg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

<script>
  $(document).on("click", ".open-myModal", function () {
     var nome = $(this).data('nome');
     var msg = $(this).data('msg');
     $(".modal-body #nome").val( nome );
     $(".modal-body #msg").val( msg );

});
</script>
@stop