(function(){
	'use strict';
	angular.module("bowlingScoreApp")
		.directive("scoreSheet", [function(){

			return{
				restrict: 'E',
				templateUrl: 'directive/scoreSheet/scoreSheet.html',
				scope: {
			      	frames:"=",
			      	player:"="
			      	
			     }
			};

		}]);

}());