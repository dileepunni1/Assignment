(function(){
	'use strict';

	angular.module("bowlingScoreApp")
	.controller("scoreController", ['$scope','scoreFactory', function($scope, $SF) {

		this.score = [];
		this.roll = 0;
		this.scores = [];
		var self = this;
		this.maxRoleAllowed = 1;
		this.total = 0;
		this.showResult = false;
		this.updateScoreBoard = function($index){
			console.log("myIndec - "+ $index);
			if(this.score[$index] < 0 ||  this.score[$index] >10){
				this.score.pop();
				return 0;
				//this.score[$index] = null;
			}

			if($SF.currentTurn === 9) {
				this.maxRoleAllowed = 2;
			}
			if(this.roll == this.maxRoleAllowed) {
				$SF.currentTurn = $SF.currentTurn == 9? $SF.currentTurn : $SF.currentTurn + 1;				
				prepareAndCalculateScore($index);
				this.roll = 0;				
			}
			else{
				if(this.score[$index] == 10){
					var $nextIndex = ($SF.currentTurn < 9 || ($SF.currentTurn == 9 && this.roll < this.maxRoleAllowed)) ? $index + 1 : $index;
					this.score[$nextIndex] = 'X';	

					$SF.currentTurn = $SF.currentTurn == 9? $SF.currentTurn : $SF.currentTurn + 1;
					prepareAndCalculateScore($nextIndex);
					if ($SF.currentTurn < 9){
						this.roll = 0;
					}
					angular.element('#pin'+($nextIndex + 1) ).focus();
					
				} 
				else{
					this.roll++;
				}
				
			}			

			console.log(this.score[$index]);
			console.log("scoreFactory.currentTurn "+ $SF.currentTurn)
			console.log("this.roll "+this.roll);

			console.log("$SF.getStore " + JSON.stringify($SF.getScore()));

		}

		var prepareAndCalculateScore = function($index) {
			var scores = $SF.getScore();
			console.log("scores" + $index);
			scores.frames[$SF.currentTurn].first = self.score[$index - 1];
			scores.frames[$SF.currentTurn].second = self.score[$index];
			if($SF.currentTurn == 9) {
				scores.frames[$SF.currentTurn].third = self.score[$index + 1];
			}
			$SF.setScore(scores);

			$SF.calculateScore().then(function(response){
				console.log(response.data)
				self.total = response.data.score;
				if($SF.currentTurn == 9) {
					self.showResult = true;
				}
			});
		}

		console.log(this.score);

	}]);



}());