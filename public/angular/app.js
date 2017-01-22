var app = angular.module('app', ['ui.bootstrap', 'ngMaterial', 'ngMessages'])
				 .constant('API_URL', 'http://bq-tcc.dev/api/')
				 .filter('comecarEm', function()
				 	{
				 		return function(data, comeco)
				 		{
				 			if (!data || !data.length) { return; }
				 			comeco = +comeco; //convertendo pra
				 			return data.slice(comeco);
				 		}
				 	})	.config(['uibPaginationConfig', function(uibPaginationConfig)
				 	{
						uibPaginationConfig.previousText="Anterior";
						uibPaginationConfig.nextText="Próxima";
						uibPaginationConfig.firstText="Primeira";
						uibPaginationConfig.lastText="Última";
					}]).directive('uniqueData', validarDados); 
					
					function validarDados($http, API_URL)
					{
						return {
							restrict: 'A',
							require: 'ngModel',
							link : function(scope, elem, attrs, ctrl, ngModel)
							{
								 elem.on('change', function(evt){
									scope.$apply(function(){
										var request = $http.get(API_URL + 'administradores/cpf/' + elem.val());
										request.then(function(response){
											if(response.data == 'true')
											{
												ctrl.$setValidity('unique', false);
											}else{
												ctrl.$setValidity('unique', !false);
											}
										}, function(error){
											alert(error.data);
										});
									});
								});
							}
						}
					};