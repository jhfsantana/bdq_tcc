var app = angular.module('app', ['ui.bootstrap', 'ngMaterial', 'ngMessages'])
				 .constant('API_URL', 'http://bq-tcc.dev/api/')
				 .filter('comecarEm', function()
				 	{
				 		return function(data, comeco)
				 		{
				 			if (!data || !data.length) { return; }
				 			comeco = +comeco; //convertendo pra int
				 			return data.slice(comeco);
				 		}
				 	}).config(['uibPaginationConfig', function(uibPaginationConfig)
				 	{
						uibPaginationConfig.previousText="Anterior";
						uibPaginationConfig.nextText="Próxima";
						uibPaginationConfig.firstText="Primeira";
						uibPaginationConfig.lastText="Última";
					}]);