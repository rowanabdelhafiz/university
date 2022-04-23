<?php 
include_once("class_user.php");
class Admissions extends user
{
    protected $ScoreNeeded=-1;
    protected $faculity=null;
    protected $type_Majoring_in_high_school=-1;

    function __construct(){
        $this->filemanagerobj=new FileManager();
        $this->filemanager->setfilename="user.txt";
        $this->filemanager->setSeparator="~";
    }
    public function store_userData()
    {
        //id[0]~usertype_id[1]~name[2]~password[3]~phonenumber[4]~date[5]~faculity_id[6]~email[7]~
        $s=$this->filemanager->get_separator;
        $email=$this->getEmail()."@hel.stu.eg";
        $id=$this->filemanagerobj->get_id($s)+1;
        $record=$id.$s..$s.$this->getName().$s.$this->getPassword().$s.$this->getPhone_number().$s.$this->getDate_of_birthday().$email;
        $this->filemanagerobj->store_dataFile($record);
    }
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
    public function add_($id,$mail,$name,$password,$phone_number,$date_of_birthday,$faculity)
    {
        $file=fopen("user.txt","a");
        $email=$mail."@hel.stu.eg";
        fwrite($file,$id."~".$email."~".$name."~".$password."~".$phone_number."~".$date_of_birthday."~".$faculity."~"."3"."~");
        fwrite($file,"\n");
        fclose($file);
    }

    public function getFaculity()
    {
        return $this->faculity;
    }
    public function setFaculity($faculity)
    {
        $this->faculity = $faculity;

        return $this;
    }

    public function getType_Majoring_in_high_school()
    {
        return $this->type_Majoring_in_high_school;
    }
    public function setType_Majoring_in_high_school($type_Majoring_in_high_school)
    {
        $this->type_Majoring_in_high_school = $type_Majoring_in_high_school;

        return $this;
    }
}
?>