<?php

include_once("InID.php");

class Register extends InID
{
    private $StID;
    private $Date;
    private $totalHr;
    private $totalPriceHr; 


    function remove_register($ID)
    {
        $fileObj = new filemanager();
        $fileObj->setFilenames("Register.txt");
        $fileObj->setSeparator("~");
        $Rf = $fileObj->AllContents();
        for($i = 0; $i< count($Rf); $i++)
        {
            $ar1 = explode($fileObj->getSeparator(),$Rf[$i]);

            if($ar1[1] == $StdId)
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
            }
        }
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
        $this->StID = $StID;

        return $this;
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of totalHr
     */ 
    public function getTotalHr()
    {
        return $this->totalHr;
    }

    /**
     * Set the value of totalHr
     *
     * @return  self
     */ 
    public function setTotalHr($totalHr)
    {
        $this->totalHr = $totalHr;

        return $this;
    }

    /**
     * Get the value of totalPriceHr
     */ 
    public function getTotalPriceHr()
    {
        return $this->totalPriceHr;
    }

    /**
     * Set the value of totalPriceHr
     *
     * @return  self
     */ 
    public function setTotalPriceHr($totalPriceHr)
    {
        $this->totalPriceHr = $totalPriceHr;

        return $this;
    }
}

?>