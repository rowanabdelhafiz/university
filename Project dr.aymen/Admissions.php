<?php 
include_once("class_user.php");
class Admissions extends user
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
    public function add_student($id,$mail,$name,$phone_number,$date_of_birthday)
    {
        $file=fopen("user.txt","a");
        fwrite($file,$id."~".$mail."~".$name."~"$phone_number."~".$date_of_birthday."~"."3"."~");
        fwrite($file,"\n");
        fclose($file); 
    }
}
?>