<?php
abstract class baseRequest {
	use JSON_FILTER;
	function __construct(){

	}

	public function request_type() {
		if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		   header( "HTTP/1.1 200 OK" );
		   exit();
		}

		return strtolower($_SERVER['REQUEST_METHOD']);
	}
	
}