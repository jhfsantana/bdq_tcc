@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  	<script type="text/javascript">

/*$(document).ready(function(){

	$("#salvar").click(function(e) {                
      e.preventDefault();
      e.stopPropagation();

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/turmas",
        dataType: "JSON",   //expect html to be returned                
        success: function(response){
            console.log(response);    
        	}
    	});    
	});
});*/
	</script>
	<title>Cadastro de Turmas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
		<!-- RESGATANDO MENSAGEM DE ERRO OU SUCESSO -->
		@if(!empty($errors->all()))
			<div class="alert alert-warning" role="alert-warning">
				@foreach($errors->all() as $error)
					<ul>
						<li> {{$error}}</li>
					</ul>
				@endforeach
			</div>
		@endif	
		<!-- FIM DA MENSAGEM DE ERRO OU SUCESSO -->
	<h2 style="text-align: center;">Cadastro de turmas</h2>
		    <div id="cadastroturmarbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		        <div class="panel panel-default" >
		            <div class="panel-heading">
		                <div class="panel-title">Formulário para cadastro de turmas</div>
		            </div>     

		            <div style="padding-top:30px" class="panel-body" >			

		            <form action="/classrooms" method="post">
						<input name="_token" type="hidden" value="{{ csrf_token() }}">
						
						<label>
							Código
						</label><i style="color: #FF0000">*</i>
							<input type="text" name="nome" class="form-control" placeholder="Digite o código da nova turma">

						<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" style="margin-top: 10px">
					</form>
				</div>
			</div>
		</div>
			<table class="table table-striped">
			  <tr>
			      <td><strong>CÓDIGO DA TURMA</strong></td>
			      <td><strong>CRIADO EM</strong></td>
			      <td><strong>MODIFICADO EM</strong></td>
			  </tr>
			  <tbody>
			    <tr>
			  @foreach($turmas as $turma)

			      <td>{{$turma->nome}}</td>
			      <td>{{$turma->created_at}}</td>
			      <td>{{$turma->updated_at}}</td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
	@stop