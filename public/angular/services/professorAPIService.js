angular.module('app').factory('professorAPI', function($http, API_URL){
			
			var _getProfessores = function(){
				return $http.get(API_URL + 'professores');
			};
			var _saveProfessor = function(professor){
				return $http.post(API_URL + 'professores', professor);
			};
			var _deleteProfessor = function(id){
				return $http.delete(API_URL + 'professores/' + id);
			};
			return {
				getProfessores : _getProfessores,
				saveProfessor : _saveProfessor,
				deleteProfessor : _deleteProfessor
			}
		});