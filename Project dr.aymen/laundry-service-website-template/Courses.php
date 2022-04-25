<?php

include_once("InID.php");
include_once("functions.php");

class Course extends InID
{
    protected $Hour = 0;
    protected $HourPrice = 0;
    private $FileObj;
    
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("courses.txt");
    }

    public function storeCourse()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();
        $record = $this->ID.$s.$this->name.$s.$this->Hour.$s.$this->HourPrice;
        $this->FileObj->store_dataFile($record);
    }

    public function updateCourse($ID, $pos, $value)
    {
        $records = $this->FileObj->allContents();

        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            
            if($ID == $ar[0])
            {
                $ar[$pos] = $value;

                $nL="";
                for($j=0;$j<count($ar);$j++)
                {
                    $nL .= $ar[$j];
                    if($j < count($ar) - 1)
                    {
                        $nL.=$this->FileObj->getSeparator();
                    }

                }

                $this->FileObj->update_dataFile($records[$i],$nL);
                break;
            }
        }
    }

    public function removeCourse($ID)
    {
        $records = $this->FileObj->AllContents();

        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            if($ID == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }

    public function getAllCourses()
    {
        $allc=array();
        $records = $this->FileObj->AllContents();

        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            $allc[$i]=$this->getOneCourse($ar[0]);            
        }
        return $allc;

    }

    public function getOneCourse($ID)
    {
        $rec = $this->FileObj->getLineByID($ID);
        $ar = explode($this->FileObj->getSeparator(),$rec);

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

/*$c = new Course();
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
*/
?>