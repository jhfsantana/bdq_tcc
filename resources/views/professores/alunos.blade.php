@extends('templates.professor.template')
    @section('head')
    	<link rel="stylesheet" href="/css/global.css">
    	<link rel="stylesheet" href="/css/formularios.css">
		<title>Lista de Alunos</title>
    @stop
    @section('content')
    <br>
    <br>
    <br>


    	<fieldset>
    		<legend>
    			MEUS ALUNOS
    		</legend>
    		<div class="col-md-3">
    			<input type="text" class="form-control" id="myInput" onkeyup="procurar()" placeholder="Buscar por ....." title="Digite sua busca aqui">
    		</div>
    		</br></br></br>
	    	<table id="alunos" class="table table-striped" cellspacing="0" width="100%">
		        <thead style="background-color: #ccc; margin-top: 40px;">
		            <tr>
		                <th>Matricula</th>
		                <th>Nome</th>
		                <th>E-mail</th>
		                <th>Turma</th>
		                <th>Detalhes</th>
			        </tr>
		        </thead>
		        <tbody>
		    		@foreach($professor->disciplinas as $disciplina)
		    			@foreach($disciplina->turmas as $turmas)
		    				@foreach($turmas->alunos as $aluno)
				            <tr>
								<td>{{$aluno->matricula}}</td>
								<td>{{$aluno->nome}}</td>
								<td>{{$aluno->email}}</td>
								<td>{{$turmas->nome}}</td>
								<td>
									<button class="glyphicon glyphicon-search btn btn-info"></button>
								</td>
							</tr>
							@endforeach
						@endforeach
					@endforeach
				</tbody>
			</table>
		</fieldset>
    @stop

 <script type="text/javascript">
 	function procurar() {
	  var input, filter, table, tr, td, td2, td3, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("alunos");
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
 </script>