<?php

include_once("InID.php");
include_once("functions.php");
include_once("Courses.php");

class RegisterDetails extends InID
{
    private $rgID;
    private $Reg; 
    public $Crs;
    private $FileObj;

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("RegisterDetails.txt");
        $this->Crs = new Course();
        //$this->Reg = new Register();
    }

    public function storeRegisterDetails()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();

        $record = $this->ID.$s.$this->Crs->getID().$s.$this->Crs->getHour().$this->Crs->getHourPrice();
        $this->FileObj->store_dataFile($record);
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

$rD = new RegisterDetails();
$rD->Crs->getOneCourse(3);

$rD->storeRegisterDetails();

?>