<?php
namespace Controller;

use Model\ScoreManager;

class scoreController {

	
	function __construct() {}
	/**
	* Calculate total score and return result.
	* @param $frames array
	* @param $test number	
	*/
	function getTotalScore($frames, $test = 1){

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
		$objScore = $SM->score();
		//$test is used to identify if the call is a unit test or other.
		
		return  $test == 0 ? $objScore : $objScore['totalScore'];

	}
		
		

}
