<?php

if(!include_once("../InID.php"))
{
    include_once("InID.php");
    include_once("functions.php");
    include_once("courses/CourseClass.php");
    include_once("Register/Register.php");
    include_once "Interface.php";
}else
{
    include_once("../InID.php");
    include_once("../functions.php");
    include_once("../courses/CourseClass.php");
    include_once("../Register/Register.php");
    include_once "../Interface.php";
}


class RegisterDetails extends InID implements File
{
    private $rgID;
    private $Reg=null;
    private $CrsID;
    private $Crs;
    private $FileObj;

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("RegisterDetails.txt");
        //$this->Crs = new Course();
        //$this->Reg = new Register();
    }

    public function Store()
    {
        $this->ID = $this->FileObj->getId() + 1;

        $obj = new Register();
        $this->Reg = $obj->getOneRegister($this->rgID);

        if($this->Reg != null)
        {
            $s = $this->FileObj->getSeparator();

            $record = $this->ID.$s.$this->rgID.$s.$this->CrsID.$s.$this->Crs->getHour().$s.$this->Crs->getHourPrice();
            $this->FileObj->store_dataFile($record);

            $TotalHr = $this->Reg->getTotalHr() + $this->Crs->getHour();
            $this->Reg->updateTotalOfRegister($this->rgID,3,$TotalHr);

            $TotalPriceHr = $this->Reg->getTotalPriceHr() + $this->Crs->getHourPrice();
            $this->Reg->updateTotalOfRegister($this->rgID,4,$TotalPriceHr);
        }
    }

    public function Update()
    {
        $Rec = $this->FileObj->AllContents();
        for($i=0; $i< count($Rec) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rec[$i]);

            if($this->ID == $ar[0])
            {
                if($this->rgID != "")
                {
                    $obj = new Register();
                    $this->Reg = $obj->getOneRegister($ar[1]);
    
                    $TotalHr = $this->Reg->getTotalHr() - $ar[3];
                    $this->Reg->updateTotalOfRegister($ar[1],3,$TotalHr);
    
                    $TotalPriceHr = $this->Reg->getTotalPriceHr() - $ar[4];

                    if($ar[1] != $this->FileObj->getId())
                    {
                        $TotalPriceHr.="\r\n";
                    }
                    
                    $this->Reg->updateTotalOfRegister($ar[1],4,$TotalPriceHr);

                    $this->Reg = $obj->getOneRegister($this->rgID);
    
                    $TotalHr = $this->Reg->getTotalHr() + $ar[3];
                    $this->Reg->updateTotalOfRegister($this->rgID,3,$TotalHr);
    
                    if($this->rgID != $this->FileObj->getId())
                    {
                        $TotalPriceHr.="\r\n";
                    }

                    $TotalPriceHr = $this->Reg->getTotalPriceHr() + $ar[4];
                    $this->Reg->updateTotalOfRegister($this->rgID,4,$TotalPriceHr);

                    $ar[1] = $this->rgID;
                }

                if($this->CrsID != "")
                {
                    $obj = new Register();
                    $this->Reg = $obj->getOneRegister($ar[1]);
                    $TotalHr = $this->Reg->getTotalHr();

                    if($this->Crs->getHour() > $ar[3])
                    {
                        $TotalHr = $TotalHr + ($this->Crs->getHour() - $ar[3]);
                    }
                    else if($this->Crs->getHour() < $ar[3])
                    {
                        $TotalHr = $TotalHr - ($ar[3] - $this->Crs->getHour());
                    }

                    $ar[3]=$this->Crs->getHour();
                    $this->Reg->updateTotalOfRegister($ar[1],3,$TotalHr);

                    $TotalPriceHr = $this->Reg->getTotalPriceHr();

                    if($this->Crs->getHourPrice() > $ar[4])
                    {
                        $TotalPriceHr = $TotalPriceHr + ($this->Crs->getHourPrice() - $ar[4]);
                    }
                    else if($this->Crs->getHourPrice() < $ar[4])
                    {
                        $TotalPriceHr = $TotalPriceHr - ($ar[4] - $this->Crs->getHourPrice());
                    }

                    $ar[4]=$this->Crs->getHourPrice();
                    $this->Reg->updateTotalOfRegister($ar[1],4,$TotalPriceHr);

                    $ar[2] = $this->CrsID;
                }


                $nL ="";
                for($j=0;$j< count($ar); $j++)
                {
                    $nL.=$ar[$j];
                    if($j < count($ar) - 1)
                    {
                        $nL.=$this->FileObj->getSeparator();
                    }
                }

                $this->FileObj->update_dataFile($Rec[$i],$nL);
                break;
            }
        }
    }

    public function Remove($aD = false)
    {
        $Rf = $this->FileObj->AllContents();
        for($i=0; $i< count($Rf) - 1; $i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rf[$i]);

            if($ar[0] == $this->ID)
            {
                if($aD)
                {
                    $obj = new Register();
                    $this->Reg = $obj->getOneRegister($ar[1]);
    
                    $TotalHr = $this->Reg->getTotalHr() - $ar[3];
                    $this->Reg->updateTotalOfRegister($ar[1],3,$TotalHr);
    
                    $TotalPriceHr = $this->Reg->getTotalPriceHr() - $ar[4];
                    $this->Reg->updateTotalOfRegister($ar[1],4,$TotalPriceHr);
                }
                
                $this->FileObj->remove_dataFile($Rf[$i]);
                break;
            }
        }
    }

    public function Search()
    {
        $List=$this->FileObj->AllContents();

        for ($i=0; $i < count($List) - 1; $i++) { 
            $ar = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->ID!=0)
            {
                if($this->ID!=intval($ar[0]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->rgID!=0)
            {
                if($this->rgID!=intval($ar[1]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->CrsID!=0)
            {
                if($this->CrsID!=intval($ar[2]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        
        $DisplayedList = [];
        $Header = ["ID","rgID","CrsID","Hour","HourPrice"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $ar = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$ar);
        }
        return $DisplayedList;
    }

    public function getAllRegisterDetails()
    {
        $allrd = [];
        $records = $this->FileObj->AllContents();

        for($i = 0; $i < count($records) - 1; $i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            $allrd[$i] = $this->getOneRegisterDetails($ar[0]);
        }

        return $allrd;
    }

    public function getOneRegisterDetails($ID)
    {
        $rec = $this->FileObj->getLineByID($ID);
        $ar = explode($this->FileObj->getSeparator(),$rec);
        
        $RD = new RegisterDetails();
        $RD->ID = $ar[0];
        $RD->rgID = $ar[1];
        $RD->CrsID = $ar[2];

        $obj = new Course();
        $RD->Crs = $obj->getOneCourse($RD->CrsID);
        
        return $RD;
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

    /**
     * Get the value of Crs
     */ 
    public function getCrs()
    {
        if($this->Crs != null)
        {
            return $this->Crs;
        }
    }

    /**
     * Set the value of Crs
     *
     * @return  self
     */ 
    public function setCrs($Crs)
    {
        if($Crs != null)
        {
            $this->Crs = $Crs;
        }
        

        return $this;
    }

    /**
     * Get the value of CrsID
     */ 
    public function getCrsID()
    {
        if($this->CrsID > 0)
        {
            return $this->CrsID;
        }
    }

    /**
     * Set the value of CrsID
     *
     * @return  self
     */ 
    public function setCrsID($CrsID)
    {
        if($CrsID > 0)
        {
            $this->CrsID = $CrsID;
            
            $Obj = new Course;
            $this->Crs = $Obj->getOneCourse($CrsID);
        }
    }

    /**
     * Get the value of FileObj
     */ 
    public function getFileObj()
    {
        if($this->FileObj != null)
        {
            return $this->FileObj;
        }
        
    }

    /**
     * Set the value of FileObj
     *
     * @return  self
     */ 
    public function setFileObj($FileObj)
    {
        if($FileObj != null)
        {
            $this->FileObj = $FileObj;
        }
    }
}

/*$rD = new RegisterDetails();
$rD->setRgID(2);

$rD->setCrsID(4);

//$rD->storeRegisterDetails();
$rD->removeRegisterDetails(3,0);

$obrd = $rD->getAllRegisterDetails();

echo "<table border=1>";
for($i=0;$i<count($obrd);$i++)
{
    echo "<tr><td>".$obrd[$i]->ID."</td><td>".$obrd[$i]->getRgID()."</td><td>".$obrd[$i]->GetCrsID()."</td><td>".$obrd[$i]->getCrs()->getHour()."</td><td>".$obrd[$i]->getCrs()->getHourPrice()."</td></tr>";

    
}
echo "</table>"
*/
?>