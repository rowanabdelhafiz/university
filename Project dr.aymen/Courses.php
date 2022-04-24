<?php

include_once("functions.php");

class Course extends InID
{
    protected $Hour = 0;
    protected $HourPrice = 0;
    private $FileCourse;
    
    public function _construct()
    {
        $FileCourse = new filemanager();
        $FileCourse->Filenames = "courses.txt";
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

?>