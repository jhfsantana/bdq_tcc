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
<style>
* {
  box-sizing: border-box;
}

#myInput {
  border-radius: 14px;
  border-style: solid 1px #ccc;
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 40%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
@stop

@section('content')
@section('titulo')
<i class="fa fa-users" aria-hidden="true"></i>
Turmas
@stop
	<fieldset>
		<legend>
			Dados
		</legend>
			<input type="text" id="myInput" onkeyup="procurar()" placeholder="Buscar por ....." title="Digite sua busca aqui">

		<ul>
			<li>
				Turma
				<table class="tg">
				  <tr>
				  	<ul>
				  		<li>id: {{ $turma->id }}</li>
				  		<li>Nome/Numeração: {{ $turma->nome }}</li>
				  	</ul>
				  </tr>
				</table>
			</li>
		</ul>
		<table class="table table-stripped" id="turmas">
			<thead style="background-color: #ccc; text-align: center;">
				<tr>
					<th>Professor</th>
					<th>Disciplina</th>
					<th>Aluno</th>
					<th>Remover</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($turma->professores as $professor)
					    @foreach($professor->disciplinas as $disciplina)
						    @foreach($disciplina->alunos as $aluno)
						    <tr>				

						    	<td class="tg-yw4l"><a href="/professor/config/{{ $professor->id  }}"> {{ $professor->nome  }}</a></td>
						    	<td class="tg-yw4l"><a href="/disciplina/config/{{ $disciplina->id  }}">{{ $disciplina->nome }}</a></td>
						    	
						    <td class="tg-yw4l">{{ $aluno->nome }} </td>
						    <td class="tg-yw41" style="padding: 20px;"> 
						    	<a href="#" id="prof_id"  onclick="confimar({{ $professor->id}}, {{$turma->id}}, {{$disciplina->id}});">
						    		<span class="btn btn-danger btn-sm btn-config">
										<span class="glyphicon glyphicon-trash">
										</span>
									</span>
						    	</a>
						    </td>
						    @endforeach
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
		


<script type="text/javascript">
	$(document).ready(function(){
	   $('#salvar').click(function(){
	     $("#professorConfig").submit();
	   });
	});



	function procurar() {
	  var input, filter, table, tr, td, td2, td3, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("turmas");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    td2 = tr[i].getElementsByTagName("td")[1];
	    td3 = tr[i].getElementsByTagName("td")[2];

	    if (td || td2 || td3) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }       
	  }
	}

	function remover(professor_id, turma_id, disciplina_id)
    {   
        var url = location.href.substring(0,location.href.indexOf('disciplina'));
	 	var csrf_token = document.getElementById('csrf_token');
        var form = document.createElement("form");
        
        form.setAttribute("method", 'POST');
        
        form.setAttribute("action", url+'/professor/config/remover');
        
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

    function confimar(professor_id, turma_id, disciplina_id)
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
			    remover(professor_id, turma_id, disciplina_id);
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
