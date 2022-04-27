<?php
if(!include_once("../InID.php"))
{
    include_once("InID.php");
    include_once("functions.php");
    include_once "Interface.php";
}else{
    include_once("../functions.php");
    include_once "../Interface.php";
}
class Course extends InID implements File
{
    protected $Hour = 0;
    protected $HourPrice = 0;
    private $FileObj;
    
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("courses.txt");
    }
    public function Store()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();
        $record = $this->ID.$s.$this->name.$s.$this->Hour.$s.$this->HourPrice.$s;
        $this->FileObj->store_dataFile($record);
    }
    public function Update()
    {
        $records = $this->FileObj->AllContents();
        $pos = 0;
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
                    $nl="";
                    if($this->name!="")
                    {
                        $ar[1]=$this->getName();
                    }
                    if($this->Hour!=0)
                    {
                        $ar[2]=$this->getHour();
                    }
                    if($this->HourPrice!=0)
                    {
                        $ar[3]=$this->getHourPrice();
                    }
                    for($j=0; $j<count($ar)-1;$j++)
                    {
                        $nl.=$ar[$j];
                        $nl.=$this->FileObj->getSeparator();
                    } 
               $this->FileObj->update_dataFile($records[$i],$nl);
                break;
            }
        }
    }
    public function Remove()
    {
        $records = $this->FileObj->AllContents();
        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }

    public function Search()
    {
        $List=$this->FileObj->AllContents();
        // Id~Name~Hour~Price
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->ID!=0)
            {
                if($this->ID!=intval($Array[0]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$Array[1])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->Hour!=0)
            {
                if($this->Hour!=intval($Array[2]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->HourPrice!=0)
            {
                if($this->HourPrice!=intval($Array[3]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        
        $DisplayedList = [];
        $Header = ["Id","Name","Hour","HourPrice"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
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