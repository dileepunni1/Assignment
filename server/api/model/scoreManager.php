<?php

namespace Model;
use Model\Slot;

class ScoreManager {
    
    private $frames = array();
    
    //slot init
    public function add($first, $second=0, $bonus=0)
    {
        $f = new \Model\Slot($first, $second, $bonus);
        $this->frames[] = $f;
    }
    
    public function score()
    {   
        // total score

        return $this->scoreForSlots($this->numberOfSlots());
    }
    
    public function scoreForSlots($theFrame)
    {
        $totalScore = 0;
        
        // sum of score
        for($i=0; $i<$theFrame; $i++)
        {
            // sum of score from slot
            $totalScore += $this->frames[$i]->score();
            
            if(!$this->isLastSlot($i) && $this->frames[$i]->is_strike())
            {
                // Add strike score
                $totalScore += $this->sumnextTwoLaunches($i);
            }
            else if(!$this->isLastSlot($i) && $this->frames[$i]->is_spare())
            {
                // Add spare score
                $totalScore += $this->sumNextLaunch($i);
            }
            else if($this->isLastSlot($i) && $this->frames[$i]->is_spare() || $this->frames[$i]->is_strike())
            {
                // Add final-slot bonus score
                $totalScore += $this->frames[$i]->score('third');
            }
        }
        
        return $totalScore;
    }
    
    public function numberOfSlots()
    {
        return count($this->frames);
    }
    
    function sumnextTwoLaunches($pos)
    {
        if(isset($this->frames[$pos+1]) && !$this->frames[$pos+1]->is_strike())
        {
            return $this->frames[$pos+1]->score();
        }
        else if(isset($this->frames[$pos+1]))
        {
            return $this->frames[$pos+1]->score() + $this->sumNextLaunch($pos+1);
        }
    }

    function sumNextLaunch($pos)
    {
        return isset($this->frames[$pos+1]) ? $this->frames[$pos+1]->score('first') : null;
    }
    
    function isLastSlot($pos)
    {
        // Last frame should have index of 9
        return ($pos==9) ? true : false;
    }
    
}