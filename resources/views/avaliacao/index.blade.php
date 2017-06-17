@extends('templates.professor.template')
	@section('head')
    	<script src="/js/jquery-3.1.1.js"></script>
		<link rel="stylesheet" href="/css/global.css">
		<link rel="stylesheet" href="/css/formularios.css">
		<title>Avaliacao</title>

		<script type="text/javascript">
		$( document ).ready(function() {
			$("#statusform").click(function(e) { 
				e.preventDefault();
	       		e.stopPropagation();
	         	var myform = document.getElementById("statusform");
			    var fd = new FormData(myform );
			    var id = $('#id').val();
			    $.ajax({
			        url: "/avaliacao/status",
			        data: fd,
			        cache: false,
			        processData: false,
			        contentType: false,
			        type: 'post',
			        success: function (dataofconfirm) {
			        		console.log(id);
			        }
			    });
	   		});
		});
		</script>
	@stop
    @section('titulo')
            <i class="fa fa-book" title="Edit"></i>
         	AVALIAÇÕES
    @stop	
	@section('content')
	<br>
	<br>
	<br>
		<div class="container">
			<h2 style="text-align: center;">Avaliações criadas</h2>
		      <!-- MENSAGEM DE SUCESSO -->
		      <div class="flash-message">
		          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		            @if(Session::has('alert-' . $msg))
		            <h3><p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p></h3>
		            @endif
		          @endforeach
		      </div>  
		      <!-- FIM DA MENSAGEM DE SUCESSO -->
			<br>
			<br>
		<?php $count=0; ?>
			<table class="table table-striped">
				<tr>
					<td style="text-align: center;"> <strong>ID</strong></td>
					<td style="text-align: center;"> <strong>Disciplina</strong></td>
					<td style="text-align: center;"> <strong>Turma</strong></td>
					<td style="text-align: center;"> <strong>Visualizar</strong></td>
					<td style="text-align: center;"> <strong>Status</strong></td>
					<td style="text-align: center;"> <strong></strong></td>
				</tr>
				@foreach($avaliacoes as $avaliacoes)
					<tr>
						<td style="text-align: center;">
							{{$avaliacoes->id}}
						</td>
						
						<td style="text-align: center;">
							{{$avaliacoes->disciplina->nome}}
						</td>
						
						<td style="text-align: center;">
							{{$avaliacoes->turma->nome}}
						</td>

						<td style="text-align: center;"><a href="/professor/avaliacao/finalizada/{{$avaliacoes->id}}"><img style="display: block;margin-right: auto;margin-left: auto;" src="/images/search.png">	</a>
						</td>
						
						<td style="text-align: center;">
							<form method="post" id="statusform" action="/avaliacao/status">
								{{ Form::select('status', Config::get('enums.status'), $avaliacoes->status, array('id' => 'status')) }}
						</td>
						
						<td style="text-align: center;">
                    			<input name="_token" type="hidden" value="{{ csrf_token() }}">
                    			<input name="id" id="id" type="hidden" value="{{ $avaliacoes->id }}">
                    			<input type="submit" name="alterar" value="Alterar" id="alterar" class="btn btn-primary">
							</form>
						</td>
					</tr>

				@endforeach

			</table>
		</div>
	@stop