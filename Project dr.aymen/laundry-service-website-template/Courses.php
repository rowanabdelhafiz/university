<?php

include_once("InID.php");
include_once("functions.php");

class Course extends InID
{
    protected $Hour = 0;
    protected $HourPrice = 0;
    public $FileCourse;
    
    public function __construct()
    {
        $this->FileCourse = new filemanager();
        $this->FileCourse->setFilenames("courses.txt");
    }

    public function storeCourse()
    {
        $this->ID = $this->FileCourse->getId() + 1;
        $s = $this->FileCourse->getSeparator();
        $record = $this->ID.$s.$this->name.$s.$this->Hour.$s.$this->HourPrice;
        $this->FileCourse->store_dataFile($record);
    }

    public function getAllCourses()
    {
        $allc=array();
        $records = $this->FileCourse->AllContents();

        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileCourse->getSeparator(),$records[$i]);
            $allc[$i]=$this->getOneCourse($ar[0]);
        }

        return $allc;

    }

    public function getOneCourse($ID)
    {
        $rec = $this->FileCourse->getLineByID($ID);
        $ar = explode($this->FileCourse->getSeparator(),$rec);

        $c=new Course();
        $c->ID = $ar[0];
        $c->name = $ar[1];
        $c->Hour = $ar[2];
        $c->HourPrice = $ar[3];
        

        return $c;
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
$c->name = "BUS102";
$c->setHour(1);
$c->setHourPrice("300");
$c->storeCourse();
$ac = $c->getAllCourses();
echo "<table border=1>";
for($i=0;$i<count($ac);$i++)
{
    echo "<tr><td>".$ac[$i]->GetHourPrice()."</td><td>".$ac[$i]->name."</td></tr>";
}
echo "</table>"

?>