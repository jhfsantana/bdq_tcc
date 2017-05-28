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
	
	<input type="hidden" name="disciplina_id" id="disciplina_id" data-disciplina="{{ $disciplina->id}}">
	<input name="_token" type="hidden" id="csrf_token" value="{{ csrf_token() }}">


	<fieldset>
		<legend>
			Configuração
		</legend>
		<ul>
			<li>
				Disciplina
				<table class="tg">
				  <tr>
				    <th class="tg-yw4l">{{ $disciplina->nome }}</th>
				  </tr>
				</table>
			</li>
		</ul>
		<table class="table table-stripped">
			<thead style="background-color: #ccc; text-align: center;">
				<tr>
					<th>Matricula</th>
					<th>Nome</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($disciplina->professores as $professor)
					    <tr>
					    	<td class="tg-yw4l">{{ $professor->matricula }} </td>
					    	<td class="tg-yw4l">{{ $professor->nome }} </td>

					    <td class="tg-yw41" style="padding: 20px;"> 
					    	<a href="#" id="prof_id"  onclick="confimar({{ $professor->id }});">
					    		<span class="btn btn-danger btn-sm btn-config">
									<span class="glyphicon glyphicon-trash">
									</span>
								</span>
					    	</a>
					    </td>
					    </tr>
					@endforeach
				</tr>
			</tbody>
		</table>
	</fieldset>
</form>


<script type="text/javascript">
	function remover(professor_id)
    {
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

    function confimar(professor_id)
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
			    remover(professor_id);
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