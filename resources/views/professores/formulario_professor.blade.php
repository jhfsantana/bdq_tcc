@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<<<<<<< HEAD
	<meta name="_token" content="{{ csrf_token() }}"/>


=======
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function($){
   $("#cpf").mask("999.999.999-99",{placeholder:" "});
	});
</script>
>>>>>>> 82d3831f9f7c471bf3756e70a3788ab6394a790c

	<script>
	function GetRandom()
	{
		var data = new Date().getFullYear()
		var myElement = document.getElementById("matricula")
	    myElement.value = "" + data + Math.floor((Math.random() * 100000) + 100)
	}

 $(document).ready(function(){
    
    $("#matriculabuscar").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        var mat = 62256;

	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

      $.ajax({
        type: "post",
        url: "/verificando/matricula/professor",
        data:  { "matricula" : $('#matricula').val()},
        dataType: "JSON",
        success: function(response){
        	var length = Object.keys(response).length; 
            
        	if(length >= 1)
        	{
        		window.alert("Matricula ja existe");
        		$("#salvar").prop("disabled", true);
        		return false;
        	}else
        	{
        		$("#salvar").prop("disabled", false);
        	}
            console.log(response);   
        }
    });
  });
});
	</script>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	<H2 style="text-align: center;">Cadastro de professores</H2>
	@if(!empty($errors->all()))
	<div class="alert alert-warning" role="alert-warning">
		@foreach($errors->all() as $error)
			<ul>
				<li> {{$error}}</li>
			</ul>
		@endforeach
	</div>
	@endif
		<div class="container">    
		        <div class="panel panel-default" >
		            <div class="panel-heading">
		                <div class="panel-title" style="height: 56px;">
		               		<b style="line-height: 56px">Formulário para cadastro de professores</b>
		               		<img style="float: right;" src="/images/classroom.png">
		                </div>
		            </div>     
		            <div style="padding-top:30px" class="panel-body" >			

		            <form action="/teachers" method="post">
						<input name="_token" type="hidden" value="{{ csrf_token() }}">
						<label>
							Matricula 
<<<<<<< HEAD
							<button data-toggle="tooltip" title="Gerar Matricula" type="button" id="matriculabuscar" class="btn btn-primary" onclick="GetRandom();"  style="margin-bottom: 8px;">
								<i class="glyphicon glyphicon-refresh" aria-hidden="true" "></i>		
							</button>
							<input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula" readonly="true" >
						</label>
=======
						</label><i style="color: #FF0000">*</i>
							<button data-toggle="tooltip" title="Gerar Matricula" type="button" id="matriculabuscar" class="btn btn-primary" onclick="GetRandom()" style="margin-bottom: 8px;">
								<i class="glyphicon glyphicon-refresh" aria-hidden="true" "></i>		
							</button>
							<input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula" readonly="true">
>>>>>>> 82d3831f9f7c471bf3756e70a3788ab6394a790c
						
						<label>
							Nome
						</label><i style="color: #FF0000">*</i>
							<input type="text" name="nome" class="form-control" placeholder="Digite o nome">
						
						<label>
							Sobrenome
						</label><i style="color: #FF0000">*</i>
							<input type="text" name="sobrenome" class="form-control" placeholder="Digite o sobrenome">

                        <label>
                            CPF
                        </label><i style="color: #FF0000">*</i>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF">

                        <label>
						<label>
							Disciplinas
						</label><i style="color: #FF0000">*</i>
							<select multiple class="form-control"  name ="disciplinas[]">
						  		@foreach($disciplinas as $disciplina)
						  			@foreach($disciplina->turmas as $turma)
						  			<option value="{{$disciplina->id}}">{{$disciplina->nome}} - {{$turma->nome}}</option>
						  			@endforeach
						  		@endforeach
							</select>

						<label>
							E-mail
						</label><i style="color: #FF0000">*</i>
							<input type="text" name="email" class="form-control" placeholder="Digite o email" required="true">
						</label>

						<label>
							Password
						</label><i style="color: #FF0000">*</i>
							<input type="password" name="password" class="form-control" placeholder="Digite a senha">
						<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" style="margin-top: 10px">
					</form>
				</div>
			</div>
		</div>
		</div>
	@stop