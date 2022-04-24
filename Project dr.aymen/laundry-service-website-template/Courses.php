<?php

include_once("InID.php");
include_once("functions.php");

class Course extends InID
{
    protected $Hour = 0;
    protected $HourPrice = 0;
    public $FileCourse;
    
    public function _construct()
    {
        echo("Construct?");
        $this->FileCourse = new filemanager();
        $this->FileCourse->Filenames = "courses.txt";
    }

    public function getOneCourse($ID)
    {
        $rec = $this->FileCourse->getLineByID($ID);
        $ar = explode($this->FileCourse->getSeprator(),$rec);
        $this->ID = $ar[0];
        $this->name = $ar[1];
        $this->Hour = $ar[2];
        $this->HourPrice = $ar[3];

        return $this;
    }

    public function getHour()
    {
        if($this->Hour >0)
        {
            return $this->Hour;
        }        
    }

    public function setHour($H)
    {
        if($H>0)
        {
            $this->Hour = $H;
        }
    }

    public function getHourPrice()
    {
        if($this->HourPrice > 0)
        {
            return $this->HourPrice;
        }
    }

    public function setHourPrice($HP)
    {
        if($HP > 0)
        {
            $this->HourPrice = $HP;
        }
    }
}

$c = new Course();
$c->FileCourse = new filemanager();
$c->FileCourse->setFilenames("courses.txt");
$c->getOneCourse(2);
echo $c->name;
?>