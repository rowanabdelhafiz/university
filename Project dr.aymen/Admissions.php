<?php 
include_once("class_user.php");
class Admissions extends user
{
    protected $ScoreNeeded=-1;
    protected $faculity=null;
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
    public function add_student($id,$mail,$name,$phone_number,$date_of_birthday)
    {
        $file=fopen("user.txt","a");
        $email=$mail."@hel.stu.eg";
        fwrite($file,$id."~".$email."~".$name."~".$phone_number."~".$date_of_birthday."~"."3"."~");
        fwrite($file,"\n");
        fclose($file); 
    }

}
?>