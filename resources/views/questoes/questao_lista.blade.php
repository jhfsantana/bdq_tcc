@extends('templates.professor.template')
	
	@section('head')
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/global.css">

	<script>
    // validation code here ...
function confirmDelete(e) {
    if(confirm('Deseja excluir a questão?')== true)
    {
    	return true;
    }else{
    	  e.preventDefault();
    	return false;
    }
}
	// $(document).ready(function() {
	//     $("#as").click(function(e) {                
	        
	//         e.preventDefault();
	//         e.stopPropagation();
	        
	//         var formData = $(this).serialize();
	//       $.ajax({    //create an ajax request to load_page.php
	//         type: "get",
	//         url: "/professor/questao/{id}",
	//         data:  formData,
	//         beforeSend: function(){
 // 				$('.ajax-loading',e).addClass('active');            
 // 			},
 //            complete: function(){
 //                $('#loading').hide();
 //            },
	//         success: function(response){
 //            	$('#questoes').html(response);
	// 			console.log(response);
	//         }

	//         });
	//     });
	// });

	</script>
	@stop
	@section('titulo')
			<i class="fa fa-book" title="Edit"></i>
			QUESTÕES
	@stop
	@section('content')
	<br>
	<br>
	<fieldset>
		<legend>
			MINHAS QUESTÕES
		</legend>
		<div class="col-md-3" style="margin-bottom: 35px;">
			<input type="text" class="form-control" id="myInput" onkeyup="procurar()" placeholder="Buscar por ....." title="Digite sua busca aqui">
		</div>
		<div  style="float: right;">
			<a href="/professor/questao/add"><span class="btn btn-success">NOVA QUESTÃO</span></a>
		</div>
		<table class="table table-striped" id="questoes">
			<tr>
				<td><strong>ID</strong></td>
				<td><strong>Questão</strong></td>
				<td><strong>Disciplina</strong></td>
				<td><strong>Editar</strong></td>
				<td><strong>Remover</strong></td>
			</tr>
			@foreach($questoes as $questao)
				<tr>
					<td>{{$questao->id}}</td>
					<td>{{$questao->questao}}</td>
					<td>{{$questao->disciplina->nome}}</td>
					<td><form id="formalterar" method="post" action="/professor/questao/alterar">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden"  value="{{$questao->id}}" name="questao_id"/>
							<button type="submit" name="alterar" id="alterar" class="btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</form>
					</td>
					<td>
						<form id="formdeletar" method="post" action="/professor/questao/deletar">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden"  value="{{$questao->id}}" name="questao_id"/>
							<button type="submit" onclick="confirmDelete(event)" name="deletar" id="deletar" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</td>				
				</tr>
			@endforeach
		</table>
	</div>
	</fieldset>
	@stop
	 <script type="text/javascript">
 	function procurar() {
	  var input, filter, table, tr, td, td2, td3, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("questoes");
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