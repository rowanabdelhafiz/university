<?php 
include_once("class_user.php");
class Admissions extends user
{
    protected $ScoreNeeded=-1;
    protected $faculity_id=null;
    protected $userid_type=null;
    function __construct(){
        $this->filemanagerobj=new FileManager();
        $this->filemanager->setfilename="user.txt";
        $this->filemanager->setSeparator="~";
    }
    public function store_userData()
    {
        //id[0]~usertype_id[1]~name[2]~password[3]~phonenumber[4]~date[5]~faculity_id[6]~email[7]~
        $s=$this->filemanager->get_separator;
        $email=$this->getEmail()."@hel.eg";
        $id=$this->filemanagerobj->get_id($s)+1;
        $record=$id.$s.$this->getUserid_type().$s.$this->getName().$s.$this->getPassword().$s.$this->getPhone_number().$s.$this->getDate_of_birthday().$s.$this->faculity_id.$s.$email;
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
    public function getFaculity_id()
    {
        return $this->faculity_id;
    }

    public function setFaculity_id($faculity_id)
    {

        $this->faculity_id = $faculity_id;

        return $this;
    }


    public function getUserid_type()
    {
        if($this->userid_type!==null)
        {
            return $this->userid_type;
        }
    }

    public function setUserid_type($userid_type)
    {
        if($userid_type!=null)
        {
            $this->userid_type = $userid_type;

             return $this;
        }
        
    }
}
?>