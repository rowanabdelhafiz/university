<?php

include_once("InID.php");
include_once("functions.php");
include_once("Courses.php");

class RegisterDetails extends Course
{
    private $rgID;
    private $Reg; 

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("RegisterDetails.txt");
        $this->Reg = new Register();
    }

    public function getRgID()
    {
        if($this->rgID)
        {
            return $this->rgID;
        }
    }

    public function setRgID($rgID)
    {
        if($rgID)
        {
            $this->rgID = $rgID;
        }
    }
}

?>