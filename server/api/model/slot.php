<?php
namespace Model;
 
class Slot {
    
    private $scoreFirstThrow;
    private $scoreSecondThrow;
    private $scoreBonusThrow;
    
	// Instantiate class
	function __construct($scoreFirstThrow, $scoreSecondThrow=0, $scoreBonusThrow=0) {
        $this->scoreFirstThrow = $scoreFirstThrow;
        $this->scoreSecondThrow = $scoreSecondThrow;
        $this->scoreBonusThrow = $scoreBonusThrow;
	}
    
    // Are we a strike frame?
    public function is_strike()
    {
        return ($this->scoreFirstThrow == 10) ? true : false;
    }
    
    // Are we a spare frame?
    public function is_spare()
    {
        return ($this->scoreFirstThrow+$this->scoreSecondThrow == 10) ? true : false;
    }
    
    // Return our score
    public function score($throw='firstsecond')
    {
        $score = null;
        
        switch($throw)
        {
            case 'firstsecond':
                $score = $this->scoreFirstThrow + $this->scoreSecondThrow;
                break;
            case 'first':
                $score = $this->scoreFirstThrow;
                break;
            case 'second':
                $score = $this->scoreSecondThrow;
                break;
            case 'third':
                $score = $this->scoreBonusThrow;
                break;
        }
                
        return $score;
    }
    
}