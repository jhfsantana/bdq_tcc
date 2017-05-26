@extends('templates.admin.template')

@section('scripts')
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BDQ - Configuração da Disciplina</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

@stop

@section('content')
@section('titulo')
<i class="fa fa-book" aria-hidden="true"></i>
Disciplinas
@stop
  <style type="text/css">
  	fieldset 
	{
		border: 1px solid #ddd !important;
		margin: 0;
		xmin-width: 0;
		padding: 10px;       
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}	
	
	legend
	{
		font-size:14px;
		font-weight:bold;
		margin-bottom: 0px; 
		width: 35%; 
		border: 1px solid #ddd;
		border-radius: 4px; 
		padding: 5px 5px 5px 10px; 
		background-color: #ffffff;
	}
  </style>
	
	<input type="text" name="disciplina_id" id="disciplina_id" data-disciplina="{{ $disciplina->id}}">
	<input name="_token" type="hidden" id="csrf_token" value="{{ csrf_token() }}">


	<fieldset>
		<legend>
			Configuração
		</legend>
		<ul>
			<li>
				{{ $disciplina->nome }}
				<ul>
					<li>
						Professores	
					</li>
					@foreach($disciplina->professores as $professor)
						{{ $professor->nome }}
						<input type="button" data-id="{{ $professor->id }}" id="remover_prof" name="__SUBMIT__" value="x" onclick="confimar();">
					@endforeach
				</ul>
			</li>
		</ul>
	</fieldset>
</form>
<script type="text/javascript">
	function remover()
    {
    	var professor_id = $("#remover_prof").data('id');
    	var disciplina_id = $("#disciplina_id").data('disciplina');
	 	var csrf_token = document.getElementById('csrf_token');

        var url = location.href.substring(0,location.href.indexOf('disciplina'));

        var form = document.createElement("form");
        form.setAttribute("method", 'POST');
        
        form.setAttribute("action", url+'/disciplina/config/remover');
        
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "professor_id");
        hiddenField.setAttribute("value", professor_id);

        var hiddenField2 = document.createElement("input");
        hiddenField2.setAttribute("type", "hidden");
        hiddenField2.setAttribute("name", "disciplina_id");
        hiddenField2.setAttribute("value", disciplina_id);

        var hiddenField3 = document.createElement("input");
        hiddenField3.setAttribute("type", "hidden");
        hiddenField3.setAttribute("name", "_token");
        hiddenField3.setAttribute("value", csrf_token.value);
		console.log(hiddenField);
	 	console.log(hiddenField2);
        form.appendChild(hiddenField);
        form.appendChild(hiddenField2);
        form.appendChild(hiddenField3);
        document.body.appendChild(form);
        form.submit();
    }

    function confimar()
    {
    	swal({
			  title: "Você tem certeza que deseja remover este professor?",
			  text: "vicê irá tirar a associação deste professor, cuidado!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Sim, quero desassociar",
			  cancelButtonText: "Não, quero cancelar solicitação!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    remover();
			  } else {
			    swal("Cancelado", "Solicitação cancelada!", "error");
			  }
			});
    }
</script>
    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/waitingfor.js"></script>
	<script src="/js/sweetalert.min.js"></script>
@stop