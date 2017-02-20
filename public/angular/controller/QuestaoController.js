app.controller('QuestaoController', function($scope, $http, API_URL, questaoAPI)
	{
		$scope.pageSize = 6;
		$scope.currentPage = 1;

		questaoAPI.getQuestoes()
		.success(function(response)
		{
			$scope.questoes = response;
		});

		questaoAPI.getQuestoesByProfessor()
		.success(function(response)
		{
			$scope.questoesProfessor = response;
		});

	$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar nova Questao";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Questao";
		      $scope.id = id;
		      $http.get(API_URL + 'questoes/' + id).success(function(response){
		      $scope.questao = response;
		      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'questoes/' + id).success(function(response){
		      $scope.questao = response;
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
			var url = API_URL + "questoes";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'post',
				  url: url,
				  data: $.param($scope.questao),
				  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(response){
				  	//se o retorno for sucesso ele monta uma div com m alert success com a mensagem do response
				  	if(response.success)
					{
						$('#main').html('<div class="alert alert-success col-ssm-12" >' + response.message + '</div>');
					}
		  			
		  			$('#myModal').modal('hide');
					questaoAPI.getQuestoes()
					.success(function(response)
					{
						$scope.questoes = response;
					});
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
			else
			{
				questaoAPI.saveQuestao($scope.questao)
				.success(function(response){
				  	//se o retorno for sucesso ele monta uma div com m alert success com a mensagem do response
				  	if(response.success)
					{
						$('#main').html('<div class="alert alert-success col-ssm-12" >' + response.message + '</div>');
					}
		  			
		  			$('#myModal').modal('hide');
					questaoAPI.getQuestoes()
					.success(function(response)
					{
						$scope.questoes = response;
					});

				}).error(function(response){
					if(response.disciplina_id)
					{
						$('#campo_vazio').html('<div class="alert alert-danger col-ssm-12" >' + response.disciplina_id[0] + '</div>');
						window.location.hash = '#campo_vazio';
					}
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			var isConfirmDelete = confirm('Tem certeza que deseja excluir essa questao?');
			if (isConfirmDelete) {
			 questaoAPI.deleteQuestao(id).success(function(data){
			   console.log(data);
			   location.reload();
			 }).error(function(data){
			   console.log(data);
			   alert('ocorreu um erro');
			 });
			} else {
			 return false;
			}
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.questao = {};
		});

});
