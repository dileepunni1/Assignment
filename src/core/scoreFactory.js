(function(){
	'use strict';
	angular.module('bowlingScoreApp')
		.factory('scoreFactory', ['$http', 'PATHS', function($http, path){
			var dataStore =  { 
							 	'frames': 
								 [
								 	{'first': 0, 'second': 0},{'first': 0, 'second': 0},
								 	{'first': 0, 'second': 0},{'first': 0, 'second': 0},
								 	{'first': 0, 'second': 0},{'first': 0, 'second': 0},
								   	{'first': 0, 'second': 0},{'first': 0, 'second': 0},
								   	{'first': 0, 'second': 0}, {'first': 0, 'second': 0,'third':0}
								 ] 
						 };
			var cpDataStore = angular.copy(dataStore);
			var getScore = function(){
				return dataStore;

			};
			var setScore = function($score){
				this.dataStore = $score;

			}; 
			
			var turn = -1;
			var calculateScore = function () {
				console.log(this.dataStore);

				return $http.post(path.basepath + 'score/calculate', $.param({ 'frames': this.dataStore })).then(
					function successCallBack(data){
						return data;
					},
					function errorCallBack(error) {
						return error;
					}
				);
			};
			var reset = function(){
				dataStore = angular.copy(cpDataStore);
			};

			return{
				'getScore':getScore,
				'resetdataStore':reset,
				'setScore':setScore,
				'calculateScore':calculateScore,
				'currentTurn':turn
			};

		}]);

}());