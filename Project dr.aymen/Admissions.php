<?php 
class Admissions
{
    protected $ScoreNeeded=-1;
    protected $moneyNeeded=-1;
    protected $date_of_add=-1;


    public function getScoreNeeded()
    {
        if($this->setScoreNeeded!=-1)
        {
            return $this->ScoreNeeded;
        }
    }
    public function setScoreNeeded($ScoreNeeded)
    {
        if($ScoreNeeded==-1)
        {
            $this->ScoreNeeded = $ScoreNeeded;
            return $this;
        }
        
    }


    public function getMoneyNeeded()
    {
        if($this->moneyNeeded!=-1)
        {
            return $this->moneyNeeded;
        }
    }

    public function setMoneyNeeded($moneyNeeded)
    {
        if($moneyNeeded!=-1)
        {
            $this->moneyNeeded = $moneyNeeded;
            return $this;
        }
    }

    public function getDate_of_add()
    {
        return $this->date_of_add;
    }

    public function setDate_of_add($date_of_add)
    {
        $this->date_of_add = $date_of_add;

        return $this;
    }
}


?>