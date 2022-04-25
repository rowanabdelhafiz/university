<?php

include_once("InID.php");
include_once("functions.php");

class Register extends InID
{
    private $StID;
    private $Date;
    private $totalHr = 0;
    private $totalPriceHr = 0; 
    private $FileObj;

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("Register.txt");
    }

    function storeRegister()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();

        $record = $this->ID.$s.$this->StID.$s.$this->Date.$s.$this->totalHr.$s.$this->totalPriceHr;
        $this->FileObj->store_dataFile($record);
    }

    function updateRegister($ID, $pos, $value)
    {
        $Rec = $this->FileObj->AllContents();
        for($i=0; $i< count($Rec);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rec[$i]);

            if($ID == $ar[0])
            {
                $ar[$pos] = $value;

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

    function remove_register($ID)
    {
        $Rf = $this->FileObj->AllContents();
        for($i = 0; $i< count($Rf); $i++)
        {
            $ar1 = explode($this->FileObj->getSeparator(),$Rf[$i]);

            /*if($ar1[1] == $StdId)
            {
                $fileObj2 = new filemanager();
                $fileObj2->setFilenames("RegisterDetails.txt");
                $fileObj2->setSeparator("~");
                $f2 = fopen($fileObj2->getFilenames(),"r+");
                while(!feof($f2))
                {
                    $line2=fgets($f2);
                    $ar2 = explode($fileObj2->getSeparator(),$line2);

                    if($ar2[1] == $ar1[0] && $ar2[2] == $CrsId)
                    {
                        $ar1[3]-=$ar2[3];
                        $ar1[4]-=$ar2[4];
                        
                        //function delete line in file manager from fileObj2 for RegisterDetails!!
                        $fileObj2->remove_dataFile($line2);

                        $nL="";
                        for($i=0;$i<count($ar1);$i++)
                        {
                            $nL.=$ar1[$i];
                            if($i<count($ar1)-1)
                            {
                                $nL.=$fileObj->getSeparator();
                            }
                        }

                        //function update line in file manager from fileObj for RegisterDetails!!
                        $fileObj->update_dataFile($line,$nL);
                        break;
                    }
                }
                break;
            }*/
        }
    }

    function getAllRegister()
    {
        $allr = [];
        $records = $this->FileObj->AllContents();

        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            $allr[$i]=$this->getOneRegister($ar[0]);         
        }
        return $allr;
    }

    function getOneRegister($ID)
    {
        $rec = $this->FileObj->getLineByID($ID);
        $arr = explode($this->FileObj->getSeparator(),$rec);


        $r = new Register();
        $r->ID = $arr[0];
        $r->StID = $arr[1];
        $r->Date = $arr[2];
        $r->totalHr = $arr[3];
        $r->totalPriceHr = $arr[4];

        return $r;
    }

    public function getStID()
    {
        if($this->StID > 0)
        {
            return $this->StID;
        }
        
    }

    /**
     * Set the value of StID
     *
     * @return  self
     */ 
    public function setStID($StID)
    {
        if($StID > 0)
        {
            $this->StID = $StID;
        }        
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        if($this->Date != null)
        {
            return $this->Date;
        }
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        if($Date != null)
        {
            $this->Date = $Date;
        }
    }

    /**
     * Get the value of totalHr
     */ 
    public function getTotalHr()
    {
        if($this->totalHr >= 0)
        {
            return $this->totalHr;
        }
    }

    /**
     * Set the value of totalHr
     *
     * @return  self
     */ 
    public function setTotalHr($totalHr)
    {
        if($totalHr >= 0)
        {
            $this->totalHr = $totalHr;
        }
        

        return $this;
    }

    /**
     * Get the value of totalPriceHr
     */ 
    public function getTotalPriceHr()
    {
        if($this->totalPriceHr >= 0)
        {
            return $this->totalPriceHr;
        }      
    }

    /**
     * Set the value of totalPriceHr
     *
     * @return  self
     */ 
    public function setTotalPriceHr($totalPriceHr)
    {
        if($totalPriceHr)
        {
            $this->totalPriceHr = $totalPriceHr;
        }    
    }
}

$r = new Register();
//$r->setStID(6);
//$r->setDate("3/5/2022");
//$r->storeRegister();
$r->updateRegister(1,1,3);

$rObjs = $r->getAllRegister();

echo "<table border=1>";
for($i=0;$i<count($rObjs);$i++)
{
    echo "<tr><td>".$rObjs[$i]->ID."</td><td>".$rObjs[$i]->getStID()."</td><td>".$rObjs[$i]->GetDate()."</td><td>".$rObjs[$i]->GetTotalHr()."</td><td>".$rObjs[$i]->getTotalPriceHr()."</td></tr>";
}
echo "</table>"
?>