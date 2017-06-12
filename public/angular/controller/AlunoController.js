app.controller('AlunoController', function($scope, $http, API_URL, alunoAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		alunoAPI.getAlunos()
		.success(function(response)
		{
			$scope.alunos = response;
		});

		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar novo Aluno";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Aluno";
		      $scope.id = id;
		      $http.get(API_URL + 'alunos/' + id).success(function(response){
		      $scope.aluno = response;
		      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'alunos/' + id).success(function(response){
		      $scope.aluno = response;
		      console.log(response);
		      });
		      break;
		    default:
		      break;
		  }
		  
		  if(modalstate === 'add' || modalstate === 'edit')
		  {
		  	$('#myModal').modal('show');
		  }
		  else
		  {
		  	$('#detailsModal').modal('show');
		  }
		}

		$scope.save = function(modalstate, id) {
			var url = API_URL + "alunos";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'post',
				  url: url,
				  data: $.param($scope.aluno),
				  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
			else
			{
				alunoAPI.saveAluno($scope.aluno).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			swal({
			  title: "Você tem certeza que deseja remover este aluno?",
			  text: "Não será possivel recuperar esse registro, caso seja deletado, cuidado!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Sim, quero deletar!",
			  cancelButtonText: "Não, quero cancelar solicitação!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    swal("Deletado!", "Registro foi deletado com sucesso.", "success");
			    alunoAPI.deleteAluno(id).success(function(data){

			   	if (data.message)
			   	{
			   		$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.message + '</div>');
			   	}
			   	else
			   	{
					swal("Cancelado", "Ocorreu um erro!	", "error");
					$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.error + '</div>');
			   	}

			   	$('#myModal').modal('hide');

				alunoAPI.getAlunos()
				.success(function(response)
				{
					$scope.alunos = response;
				});

			 }).error(function(data){
			    swal("Cancelado", "Ocorreu um erro!	", "error");
			 });

			  } else {
			    swal("Cancelado", "Solicitação cancelada!", "error");
			  }
			});
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.aluno = {};
		});
		$(document).on("focusout", ".zipcode", function() {
			  if ( $( this ).val() != '' )
		      {
		          $.getJSON("https://viacep.com.br/ws/"+$( this ).val()+"/json/", function(result){
		          	console.log(result);
		              $.each(result, function(i, field){
		                  if ( i == 'logradouro' )
		                  {
							$scope.aluno.logradouro = field;   
		                  }else if ( i == 'bairro' ){
		                    $scope.aluno.bairro = field;   
		                  }else if ( i == 'complemento' ){
		                     $('.additional').val(field); 
		                  }
		                  else if ( i == 'uf' )
		                  {
							 $scope.aluno.uf = field;   
		                  }
		                  else if ( i == 'localidade' )
		                  {
							 $scope.aluno.cidade = field;     
						  }
		              });
		          });
		      }
			});
});