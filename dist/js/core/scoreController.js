(function(){
	'use strict';

	angular.module('bowlingScoreApp')
	.controller("scoreController", ['$scope','scoreFactory','$timeout', function($scope, $SF, $timeout) {
		this.score = [];
		this.roll = 0;
		this.scores = [];
		var self = this;
		this.maxRoleAllowed = 1;
		this.total = 0;
		this.showResult = false;
        this.slotResults = [];
        
		/**
		* watch function to check the input values and make server calls to calculate the totale score.
		*/

		 $scope.$watch(function() { 
		 		return self.score;
		  	}, 
		  	function(newVal, oldVal) { 

			//console.log(oldVal);
			//console.log(newVal);

        	//TODO verify validation 
        	if(newVal[newVal.length - 1] > 10){
        		self.score.pop();
        	}
        	if(parseInt(newVal[newVal.length - 1]) == 10 && ((newVal.length -1) % 2 == 0)){
        		if(newVal.length < 19){
        			self.score[newVal.length] = 'X';
        		}
        	}
        	if(newVal.length >= 19) {
        		
        		if(parseInt(self.score[18]) != 10) {
        			if(parseInt(self.score[18]) + parseInt(self.score[19]) > 10) {    				
    					self.score.pop();
    				}
        		}
    			
    		}
    		else{

    			if( newVal.length > 0 && newVal.length % 2 == 0) {
    				if(parseInt(self.score[newVal.length - 2]) + parseInt(self.score[newVal.length - 1]) > 10) {
    					//console.log("poped qui 2");
    					self.score.pop();
    				}
    			}
    		}

        	var scores = $SF.getScore();
        	var frameIndex = 0;
        	if(newVal.length <= 21 ){
        		var scores = $SF.getScore();
        		for(var i = 0; i < 10; i++){
        			if(self.score.length >= frameIndex){
        				scores.frames[i].first = self.score[frameIndex];
        				frameIndex++;
        			}
        			
        			if(self.score.length >= frameIndex){
        				scores.frames[i].second = self.score[frameIndex];
        				frameIndex++;
        			}

        			if(i == 9){
        				//console.log("i==9" + self.score.length + "----" + frameIndex);
        				if(self.score.length >= frameIndex){
        					//console.log("------- + " +JSON.stringify(self.score));
        					scores.frames[i].third = self.score[frameIndex];
        					frameIndex++;
        				}
        			}
        		}

        		$SF.setScore(scores);
        		$SF.calculateScore().then(function(response){
        			//console.log(response.data)
                    if(response.data.score) {
                        //console.log(response.data.score);
                        self.total = response.data.score['totalScore'];
                        self.slotResults = response.data.score['frameScore'];
                    }        			
        			self.showResult = self.score.length >=21 || false;
        			
        		});

        	}
            
		  }, true);//<-- turn on this if needed for deep watch
        /**
        * Reset form and text box
        */

		this.reset = function(){
			self.showResult = false;
			$SF.resetdataStore();
			this.score =[];

		};
        /**
        * Reset last throw.
        */
		this.resetLast = function(){
			
			this.score.pop();

		};
		


	}]);


setTimeout(function(){ document.querySelector(".flash").style.display='block'}, 300);


}());