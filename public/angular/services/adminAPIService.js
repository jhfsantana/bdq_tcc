angular.module('app').factory('adminAPI', function($http, API_URL){
	var _getAdministradores = function(){
		return $http.get(API_URL + 'administradores');
	};
	var _saveAdministrador = function(administrador){
		return $http.post(API_URL + 'administradores', administrador);
	};
	var _updateAdministrador = function(administrador){
		return $http.post(API_URL + 'administradores', administrador);
	};
	var _deleteAdministrador = function(id){
		return $http.delete(API_URL + 'administradores/' + id);
	};

	return {
		getAdministradores : _getAdministradores,
		saveAdministrador : _saveAdministrador,
		deleteAdministrador : _deleteAdministrador,
		updateAdministrador : _updateAdministrador
	}
});