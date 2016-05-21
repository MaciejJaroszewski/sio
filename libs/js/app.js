var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider',function($routeProvider) {
	
	$routeProvider
		.when('/info-list', {
			templateUrl: 'views/info-list.html',
			controller: 'InfoCtrl'
		})
		.when('/change-pass', {
			templateUrl: 'views/change-pass.html'
		})
		.when('/users', {
			templateUrl: 'views/users.html',
			controller: 'UserCtrl'
		})
		.otherwise({
			templateUrl: 'views/info-list.html',
			controller: 'InfoCtrl'
		});

}]);

app.controller('UserCtrl', ['$scope', '$http', '$log', function($scope, $http, $log){
	
	$scope.users = [];

	$scope.getData = function(){
		$http.get("config/getUsers.php")
			.success(function (data){
				$scope.users = data;
				$log.info("Success!");
			})
			.error(function(err){
				$log.error(err);
			});
	};

	$scope.getData();

	// sorting data

	$scope.orderByColumn = "id";
	$scope.orderDesc = false;

	$scope.changeOrderBy = function(column){

		if ($scope.orderByColumn == column){
			$scope.orderDesc = !$scope.orderDesc;
		} else {
			$scope.orderByColumn = column;
			$scope.orderDesc = false;
		}
	};

	$scope.isOrderedBy = function(column){
		return ($scope.orderByColumn == column);
	};

}]);

app.controller('InfoCtrl', ['$scope', '$log', '$http', function($scope, $log, $http){
	
	$scope.infoList = [];
	$scope.addBy = "admin";
	$scope.newInfo = {};
	$scope.orderByColumn = "DATA";
	$scope.orderDesc = true;
	$scope.editedInfo = {};

	

	$scope.getInfoList = function(){
		$http.get('config/getInfoList.php')
			.success(function(data){
				$log.info("Pobrano listę komunikatów");
				$scope.infoList = data;
			})
			.error(function(err){
				$log.info(err);
			});
	};

	$scope.getInfoList();

	$scope.insertInfo = function($params){
		$http.post('config/insertInfo.php', {'addBy': $scope.addBy, 'msgType': $params.msgType, 'entry': $params.entry})
			.success(function(data){
				$log.info(data);
				$scope.getInfoList();
			})
			.error(function(err){
				$log.error(err);
			});
			$scope.newInfo = {};
	};

	$scope.changeOrderBy = function(column){

		if ($scope.orderByColumn == column){
			$scope.orderDesc = !$scope.orderDesc;
		} else {
			$scope.orderByColumn = column;
			$scope.orderDesc = false;
		}
	};

	$scope.isOrderedBy = function(column){
		return ($scope.orderByColumn == column);
	};

	$scope.editInfo = function(info){
		$('#modal2').openModal();
		$scope.editedInfo.msgType = info.RODZAJ;
		$scope.editedInfo.entry = info.TRESC;
		$scope.editedInfo.id = info.ID;

	};
	$scope.updateInfo = function($params){
		$http.post('config/updateInfo.php', {'addBy': $scope.addBy, 'msgType':$params.msgType, 'entry':$params.entry, 'id':$params.id})
			.success(function(data){
				$log.info(data);
				$scope.getInfoList();
			})
			.error(function(err){
				$log.error(err);
			})
	};

}]);