(function(){
	'use strict';
	angular.module("bowlingScoreApp")
		.directive("scoreSheet", [function(){

			return{
				restrict: 'E',
				templateUrl: 'scoreSheet.html',
				transclude:true
			};

		}])
		.directive("scoreHeader", [function(){

			return{
				restrict: 'E',
				templateUrl: 'scoreHeader.html',
				transclude:true
			};

		}])
		.directive("scoreFooter", [function(){

			return{
				restrict: 'E',
				templateUrl: 'scoreFooter.html',
				transclude:true
			};

		}])
		.directive("scoreBoard", [function(){

			return{
				restrict: 'E',
				templateUrl: 'scoreBoard.html',
				transclude:true
			};

		}])
		;

}());

