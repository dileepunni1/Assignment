<?php
namespace Controller;

use Model\ScoreManager;

class scoreController {

	
	function __construct() {}

	function getTotalScore($frames){

		$SM = new \Model\ScoreManager();
			//print_r($frames);
			foreach ($frames as $key => $value) {
				
				if($key < 9 || !isset($value['third'])) {
		            // Add regular frame
		            $SM->add($value['first'], $value['second']);
		        } else if($key==9) {
		        	
		            // Add last frame
		            $SM->add($value['first'], $value['second'], $value['third']);
		        }
			}

		return  $SM->score();

	}
		
		

}
