<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require './model/scoreManager.php';
require './model/slot.php';

require './baseRequest.php';
require 'scoreController.php';
// The router code
class R{
	function a($r,callable $c){$this->r[$r]=$c;}
	function e(){$s=$_SERVER;$i='PATH_INFO';$p=isset($s[$i])?$s[$i]:'/';$this->r[$p]();}
}
//

trait JSON_FILTER{

	public static function verify_json($string = '') {

		 return ((is_string($string) && 
		 	(is_object(json_decode($string)) || 
		 		is_array(json_decode($string))))) ? true : false;
	}
}
use Controller\score;
class index extends baseRequest{
	function __construct(){

	}

	function getTotalScore(){

		

		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
		if($this->request_type() === 'post') {

			$frames = $_POST['frames'];
			//print_r($frames);
			if (filter_var($frames, FILTER_CALLBACK, array("options"=>"baseRequest::verify_json"))) {

				if(is_array($frames['frames'])) {
					$objScore = new \Controller\scoreController();
					//print_r($frames['frames']);
					echo json_encode(['score' => $objScore->getTotalScore($frames['frames'])]);
				}
			}
		}
	}


	function ffTest() {
	$objScore = new \Controller\scoreController();
	
	echo json_encode($objScore->getTotalScore(
		Array ( 
    	     Array ( "first" => 10, "second" => 0 ), 
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ),
    	     Array ( "first" => 10, "second" => 0 ),
    	     Array ( "first" => 10, "second" => 10, "third" => 10 ) )
		));
}
}





// Create 
$router = new R();

// Add a route with a callback function
$router->a('/score/calculate', [new index, 'getTotalScore']);



$router->a('/score/tt', [new index, 'ffTest']);




$router->e();


