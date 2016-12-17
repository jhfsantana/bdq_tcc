@extends('templates.admin.template')
	
	@section('head')
	<link rel="stylesheet" href="/css/formularios.css">
	<link rel="stylesheet" href="/css/global.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<title>Lista de Questões</title>
	<script type="text/javascript">

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
	@section('content')
	<br>
	<br>
	<br>
	<h2 style="text-align: center;"> Lista de questões</h2>
	<div class="" id="questoes">
	<br>
	<br>
	<form action="/admin/questao/novo">
		<button value="Nova Questão" class="btn btn-info" style="float: right;">
			<img src="/images/novo.png"><i> Nova Questão</i>
		</button>
	</form>
		<table class="table table-striped">
			<tr>
				<td><strong>ID</strong></td>
				<td><strong>Questão</strong></td>
				<td><strong>Disciplina</strong></td>
				<td><strong>Ação</strong></td>
			</tr>
			@foreach($questoes as $questao)
				<tr>
					<td>{{$questao->id}}</td>
					<td>{{$questao->questao}}</td>
					<td>{{$questao->disciplina->nome}}</td>
					<td><form id="formalterar" method="post" action="/admin/questao/alterar/{{$questao->id}}">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input type="hidden"  value="{{$questao->id}}" name="questao_id"/>
							<input type="hidden"  value="{{Auth::user()->id}}" name="admin_id" id="admin_id-id"/>
							<button type="submit" name="alterar" id="alterar" class="btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</form>
					</td>


					<td><form id="formdeletar" method="post" action="/admin/questao/deletar">
                    		<input name="_token" type="hidden" value="{{ csrf_token() }}">
                    		<input name="questao_id" type="hidden" value="{{$questao->id}}">
							<button type="submit" onclick="confirmDelete(event);" name="deletar" id="deletar" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</td>				
				</tr>
			@endforeach
		</table>
	</div>

	<script type="text/javascript">
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
	</script>
	@stop