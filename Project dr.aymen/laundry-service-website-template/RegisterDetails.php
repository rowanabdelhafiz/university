<?php

include_once("InID.php");
include_once("functions.php");
include_once("Courses.php");
include_once("Register.php");

class RegisterDetails extends InID
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

    public function storeRegisterDetails()
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
            $this->Reg->updateRegister($this->rgID,3,$TotalHr);

            $TotalPriceHr = $this->Reg->getTotalPriceHr() + $this->Crs->getHourPrice();
            $this->Reg->updateRegister($this->rgID,4,$TotalPriceHr);
        }
        
    }

    public function removeRegisterDetails($ID,$pos)
    {
        $Rf = $this->FileObj->AllContents();
        for($i=0; $i< count($Rf); $i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rf[$i]);

            if($ar[$pos] == $ID)
            {
                $obj = new Register();
                $this->Reg = $obj->getOneRegister($this->rgID);

                $TotalHr = $this->Reg->getTotalHr() - $this->Crs->getHour();
                $this->Reg->updateRegister($this->rgID,3,$TotalHr);

                $TotalPriceHr = $this->Reg->getTotalPriceHr() - $this->Crs->getHourPrice();
                $this->Reg->updateRegister($this->rgID,4,$TotalPriceHr);

                $this->FileObj->remove_dataFile($Rf[$i]);
                break;
            }
        }
    }

    public function getAllRegisterDetails()
    {
        $allrd = [];
        $records = $this->FileObj->AllContents();

        for($i = 0; $i < count($records); $i++)
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
}

$rD = new RegisterDetails();
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

?>