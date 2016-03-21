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
    /**
    * calculate total and total for slot.
    */
    public function score()
    {   
        // total score

        return $this->scoreForSlots($this->numberOfSlots());
    }
    
    public function scoreForSlots($theFrame)
    {
        $totalScore = 0;
        
        // sum of score
        $objTotalScore = array("totalScore" =>0,'frameScore' =>array());
        for($i=0; $i<$theFrame; $i++)
        {
            // sum of score from slot

            $totalScore_ = $this->frames[$i]->score();
            
            
            if(!$this->isLastSlot($i) && $this->frames[$i]->is_strike())
            {
                // Add strike score
                $totalScore_ += $this->sumnextTwoLaunches($i);
            }
            else if(!$this->isLastSlot($i) && $this->frames[$i]->is_spare())
            {
                // Add spare score
                $totalScore_ += $this->sumNextLaunch($i);
            }
            else if($this->isLastSlot($i) && $this->frames[$i]->is_spare() || $this->frames[$i]->is_strike())
            {
                // Add final-slot bonus score
                $totalScore_ += $this->frames[$i]->score('third');
            }
            $objTotalScore['totalScore'] += $totalScore_;
            array_push($objTotalScore['frameScore'], $totalScore_);
        }
        
        return $objTotalScore;
    }
    
    /**
    * get the total number of slots.
    */
    public function numberOfSlots()
    {
        return count($this->frames);
    }

    /**
    * Sum of the next two launches( used when a strike)
    */
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
    /**
    * value of thr next launch(used in spare)
    */
    function sumNextLaunch($pos)
    {
        return isset($this->frames[$pos+1]) ? $this->frames[$pos+1]->score('first') : null;
    }
    
    /**
    * check if the playing last turn
    */
    function isLastSlot($pos)
    {
        // Last frame should have index of 9
        return ($pos==9) ? true : false;
    }
    
}