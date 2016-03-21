(function(){
	'use strict';
	angular.module("bowlingScoreApp")
		.factory("scoreFactory", ["$http", "PATHS", function($http, path){
			var dataStore =  { 
							 	"frames": 
								 [
								 	{"first": 0, "second": 0},{"first": 0, "second": 0},
								 	{"first": 0, "second": 0},{"first": 0, "second": 0},
								 	{"first": 0, "second": 0},{"first": 0, "second": 0},
								   	{"first": 0, "second": 0},{"first": 0, "second": 0},
								   	{"first": 0, "second": 0}, {"first": 0, "second": 0,"third":0}
								 ] 
						 };
			var getScore = function(){
				return dataStore

			} 
			var setScore = function($score){
				this.dataStore = $score;

			} 
			
			var turn = -1;
			var calculateScore = function () {
				console.log(this.dataStore);

				return $http.post(path.basepath + "score/calculate", $.param({ "frames": this.dataStore })).then(
					function successCallBack(data){
						return data;
					},
					function errorCallBack(error) {
						return error;
					}
				)
			}

			return{
				"getScore":getScore,
				"setScore":setScore,
				"calculateScore":calculateScore,
				"currentTurn":turn
			};

		}]);

}());