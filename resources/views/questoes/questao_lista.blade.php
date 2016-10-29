<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<title>Lista de Questões</title>
	<script type="text/javascript"></script>

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
</head>
<body>
	<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/professor">Inicio</a>
	</nav>
	<div class="container" id="questoes">
		<table class="table">
			@foreach($questoes as $questao)
				<tr>
					<td>{{$questao->id}}</td>
					<td>{{$questao->questao}}</td>
					<td>{{$questao->disciplina->nome}}</td>
					<td><form id="formalterar" method="post" action="/professor/questao/alterar/{{$questao->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden" form="formalterar" value="{{$questao->id}}" name="questao_id"/>
							<input type="hidden" form="formalterar" value="{{Auth::user()->id}}" name="professor_id" id="professor-id"/>
							<button type="submit" name="alterar" id="alterar" class="btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</form>
					</td>


					<td><form id="formdeletar" method="post" action="/professor/questao/deletar/{{$questao->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<button type="submit" onclick="confirmDelete(event)" name="deletar" id="deletar" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</td>				
				</tr>
			@endforeach
		</table>
	</div>
</body>
</html>