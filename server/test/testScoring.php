<?php
require_once('../vendor/simpletest/simpletest/autorun.php');

require_once('../api/scoreController.php');
require_once('../api/model/scoreManager.php');
require_once('../api/model/slot.php');
class canTest extends UnitTestCase {
    function testOneAndOneMakesTwo() {
        $this->assertEqual(1 + 1, 2);
    }

    // Arrange

    function testSpare(){
    	 $SM = new Controller\scoreController();
    	 // Act
    	 $frames = Array ( 
    	     Array ( "first" => 5, "second" => 5 ), 
    	     Array ( "first" => 3, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ),
    	     Array ( "first" => 0, "second" => 0 ),
    	     Array ( "first" => 0, "second" => 0, "third" => 0 ) ) ;

    	  $this->assertEqual($SM->getTotalScore($frames) ,16);
    }

    function testSPerfectStrike(){
    	 $SM = new Controller\scoreController();
    	 // Act
    	 $frames = Array ( 
    	     Array ( "first" => 10, "second" => 0 ), 
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ) ,
    	     Array ( "first" => 10, "second" => 0 ),
    	     Array ( "first" => 10, "second" => 0 ),
    	     Array ( "first" => 10, "second" => 10, "third" => 10 ) );

    	 $this->assertEqual($SM->getTotalScore($frames) ,300);
    }

     function testSPerfNoPins(){
    	 $SM = new Controller\scoreController();
    	 // Act
    	 $frames = Array ( 
    	     Array ( "first" => 0, "second" => 0 ), 
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ) ,
    	     Array ( "first" => 0, "second" => 0 ),
    	     Array ( "first" => 0, "second" => 0 ),
    	     Array ( "first" => 0, "second" => 0, "third" => 0 ) );

    	 $this->assertEqual($SM->getTotalScore($frames) ,0);
    }

     function testAlways2pin(){
    	 $SM = new Controller\scoreController();
    	 // Act
    	 $frames = Array ( 
    	     Array ( "first" => 2, "second" => 2 ), 
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ),
    	     Array ( "first" => 2, "second" => 2 ),
    	     Array ( "first" => 2, "second" => 2, "third" => 0 ) );

    	 $this->assertEqual($SM->getTotalScore($frames) ,40);
    }

    function testLastStrike(){
    	 $SM = new Controller\scoreController();
    	 // Act
    	 $frames = Array ( 
    	     Array ( "first" => 2, "second" => 2 ), 
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ) ,
    	     Array ( "first" => 2, "second" => 2 ),
    	     Array ( "first" => 2, "second" => 2 ),
    	     Array ( "first" => 10, "second" => 5, "third" => 5 ) );

    	 $this->assertEqual($SM->getTotalScore($frames) ,56);
    }
       
    //TODO ADD MORE TESTCASES

     
        

        
}