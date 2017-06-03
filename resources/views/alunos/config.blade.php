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
<i class="fa fa-graduation-cap" aria-hidden="true"></i>
Alunos
@stop
	<fieldset>
		<legend>
			Dados
		</legend>
		<ul>
			<li>
				Aluno
				<table class="tg">
				  <tr>
				  	<ul>
				  		<li>Matricula: {{ $aluno->matricula }}</li>
				  		<li>Nome: {{ $aluno->nome }}</li>
				  	</ul>
				  </tr>
				</table>
			</li>
		</ul>
		<table class="table table-stripped">
			<thead style="background-color: #ccc; text-align: center;">
				<tr>
					<th>Disciplina</th>
					<th>Nome</th>
					<th>Turma</th>
					<th>Remover</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($aluno->disciplinas as $disciplina)
					    @foreach($disciplina->turmas as $turma)
					    <tr>				

					    	<td class="tg-yw4l"><a href="/disciplina/config/{{ $disciplina->id  }}"> {{ $disciplina->id   }}</a></td>
					    	<td class="tg-yw4l"><a href="/disciplina/config/{{ $disciplina->id  }}"> {{ $disciplina->nome }}</a></td>
					    	
					    		<td class="tg-yw4l">{{ $turma->nome }} </td>
					    <td class="tg-yw41" style="padding: 20px;"> 
					    	<a href="#" id="prof_id"  onclick="confimar({{ $aluno->id}}, {{$turma->id}}, {{$disciplina->id}});">
					    		<span class="btn btn-danger btn-sm btn-config">
									<span class="glyphicon glyphicon-trash">
									</span>
								</span>
					    	</a>
					    </td>
					    @endforeach
					    </tr>
					@endforeach
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset>
		<legend>
			Configuração
		</legend>
		<!-- INICIO ! Adicionando disciplina -->
		<form method="POST" id="professorConfig" action="/aluno/config/save">
			<input name="_token" id="csrf_token" type="hidden" value="{{ csrf_token() }}">
			<input name="aluno_id" type="hidden" value="{{ $aluno->id }}">
			<div class="panel panel-warning " >
			    <div class="panel-heading">
			        <div class="panel-title"><strong style="word-spacing: 5px;">Qual disciplina deseja associar a este Aluno?</strong></div>
			    </div> 
			</div>
			<div style="margin-bottom: 15px" class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>

			    <select class="form-control"  name ="disciplina">
			    	<option disabled selected > -- Selecione uma disciplina  -- </option>
			        @foreach($disciplinas as $disciplina)
			            <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
			        @endforeach
			    </select>
			</div>
			<!-- FIM ! Adicionando disciplina -->
			<!-- INICIO ! Adicionando turma -->
			<div class="panel panel-primary " >
			    <div class="panel-heading">
			        <div class="panel-title"><strong style="word-spacing: 5px;">Qual turma deseja associar a este Aluno?</strong></div>
			    </div> 
			</div>
			<div style="margin-bottom: 15px" class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			    <select class="form-control"  name ="turma">
					<option disabled value="" selected > -- Selecione uma turma -- </option>
			        @foreach($turmas as $turma)
			            <option value="{{$turma->id}}">{{$turma->nome}}</option>
			        @endforeach
			    </select>
			</div>
			<span class="btn btn-default" id="salvar">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Salvar
			</span>
			<!-- FIM ! Adicionando turma -->
		</fieldset>
	</form>


<script type="text/javascript">
	$(document).ready(function(){
	   $('#salvar').click(function(){
	     $("#professorConfig").submit();
	   });
	});

	function remover(aluno_id, turma_id, disciplina_id)
    {   
        var url = location.href.substring(0,location.href.indexOf('disciplina'));
	 	var csrf_token = document.getElementById('csrf_token');
        var form = document.createElement("form");
        
        form.setAttribute("method", 'POST');
        
        form.setAttribute("action", url+'/aluno/config/remover');
        
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "aluno_id");
        hiddenField.setAttribute("value", aluno_id);

        var hiddenField2 = document.createElement("input");
        hiddenField2.setAttribute("type", "hidden");
        hiddenField2.setAttribute("name", "disciplina_id");
        hiddenField2.setAttribute("value", disciplina_id);

        var hiddenField3 = document.createElement("input");
        hiddenField3.setAttribute("type", "hidden");
        hiddenField3.setAttribute("name", "_token");
        hiddenField3.setAttribute("value", csrf_token.value);

        var hiddenField4 = document.createElement("input");
        hiddenField4.setAttribute("type", "hidden");
        hiddenField4.setAttribute("name", "turma_id");
        hiddenField4.setAttribute("value", turma_id);

        form.appendChild(hiddenField);
        form.appendChild(hiddenField2);
        form.appendChild(hiddenField3);
        form.appendChild(hiddenField4);

        document.body.appendChild(form);
        form.submit();
    }

    function confimar(aluno_id, turma_id, disciplina_id)
    {
    	swal({
			  title: "Você tem certeza que deseja remover a configuração deste professor??",
			  text: "você irá tirar a associação deste professor, cuidado!",
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
				swal("Removido!", "Operação concluida com sucesso!", "success");
			    remover(aluno_id, turma_id, disciplina_id);
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
