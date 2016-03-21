<?php
require_once('./scoreController.php');
class ScoreControllerTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function testScore()
    {
        // Arrange
        $SM = new scoreController();

        // Act
        $frames = Array ( 
            [0] => Array ( [first] => 5 [second] => 5 ) 
            [1] => Array ( [first] => 3 [second] => 0 ) 
            [2] => Array ( [first] => 0 [second] => 0 ) 
            [3] => Array ( [first] => 0 [second] => 0 ) 
            [4] => Array ( [first] => 0 [second] => 0 ) 
            [5] => Array ( [first] => 0 [second] => 0 ) 
            [6] => Array ( [first] => 0 [second] => 0 ) 
            [7] => Array ( [first] => 0 [second] => 0 )
            [8] => Array ( [first] => 0 [second] => 0 )
            [9] => Array ( [first] => 0 [second] => 0 [third] => 0 ) ) ;
        

        // Assert
        $this->assertEquals(16, $a->getTotalScore($frames));

        // Act
        $frames = Array ( 
            [0] => Array ( [first] => 10 [second] => 0 ) 
            [1] => Array ( [first] => 10 [second] => 0 ) 
            [2] => Array ( [first] => 10 [second] => 0 ) 
            [3] => Array ( [first] => 10 [second] => 0 ) 
            [4] => Array ( [first] => 10 [second] => 0 ) 
            [5] => Array ( [first] => 10 [second] => 0 ) 
            [6] => Array ( [first] => 10 [second] => 0 ) 
            [7] => Array ( [first] => 10 [second] => 0 )
            [8] => Array ( [first] => 10 [second] => 0 )
            [9] => Array ( [first] => 10 [second] => 10 [third] => 10 ) ) ;
        

        // Assert
        $this->assertEquals(300, $a->getTotalScore($frames));

         // Act
        $frames = Array ( 
            [0] => Array ( [first] => 0 [second] => 0 ) 
            [1] => Array ( [first] => 0 [second] => 0 ) 
            [2] => Array ( [first] => 0 [second] => 0 ) 
            [3] => Array ( [first] => 0 [second] => 0 ) 
            [4] => Array ( [first] => 0 [second] => 0 ) 
            [5] => Array ( [first] => 0 [second] => 0 ) 
            [6] => Array ( [first] => 0 [second] => 0 ) 
            [7] => Array ( [first] => 0 [second] => 0 )
            [8] => Array ( [first] => 0 [second] => 0 )
            [9] => Array ( [first] => 0 [second] => 0 [third] => 0 ) ) ;
        

        // Assert
        $this->assertEquals(0, $a->getTotalScore($frames));
    }

    // ...
}
