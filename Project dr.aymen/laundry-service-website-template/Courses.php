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

    public function updateCourse($ID, $pos, $value)
    {
        $records = $this->FileCourse->allContents();

        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileCourse->getSeparator(),$records[$i]);
            
            if($ID == $ar[0])
            {
                $ar[$pos] = $value;

                $nL="";
                for($j=0;$j<count($ar);$j++)
                {
                    $nL .= $ar[$j];
                    if($j < count($ar) - 1)
                    {
                        $nL.=$this->FileCourse->getSeparator();
                    }

                }

                $this->FileCourse->update_dataFile($records[$i],$nL);
                break;
            }
        }
    }

    public function removeCourse($ID)
    {
        $records = $this->FileCourse->AllContents();

        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileCourse->getSeparator(),$records[$i]);
            if($ID == $ar[0])
            {
               $this->FileCourse->remove_dataFile($records[$i]);
               break;
            }
        }
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
$c->updateCourse(6,1,"CS214");
//$c->removeCourse(1);
//$c->name = "MCOM204";
//$c->setHour(3);
//$c->setHourPrice("1100");
//$c->storeCourse();
$ac = $c->getAllCourses();
echo $ac[0]->getID()."</br>";
echo "<table border=1>";
for($i=0;$i<count($ac);$i++)
{
    echo "<tr><td>".$ac[$i]->ID."</td><td>".$ac[$i]->name."</td><td>".$ac[$i]->GetHour()."</td><td>".$ac[$i]->GetHourPrice()."</td></tr>";
}
echo "</table>"

?>