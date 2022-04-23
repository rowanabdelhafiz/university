<?php
function id_calculate(&$count,$text)
{
    $file = fopen("$text", "r")or die("Unable to open file!");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    fclose($file);
    }
}
function check_percentage(&$line_per,$faculity)
{
    $file = fopen("faculity.txt", "r")or die("Unable to open file!");
    while (!feof($file)) {
        $linee=fgets($file);
        $ArrayResult = explode("~", $linee);
        if($linee && $ArrayResult[0]==$faculity)
        {
            $line_per= $ArrayResult[2];
        }   
    }
fclose($file); 
}

class FileManager
{
    private $FName;
    private $FSeparator;

    /**
     * Get the value of FName
     */ 
    public function getFName()
    {
        if($this->FName!="")
        {
            return $this->FName;
        }
        
    }

    /**
     * Set the value of FName
     *
     * @return  self
     */ 
    public function setFName($FName)
    {
        if($FName != "")
        {
            $this->FName = $FName;
        }
    }

    /**
     * Get the value of FSeparator
     */ 
    public function getFSeparator()
    {
        if($this->FSeparator != "")
        {
            return $this->FSeparator;
        }
    }

    /**
     * Set the value of FSeparator
     *
     * @return  self
     */ 
    public function setFSeparator($FSeparator)
    {
        if($FSeparator != "")
        {
            $this->FSeparator = $FSeparator;
        }
    }

    public function Store($line)
    {
        $file = fopen($this->FName,"a+");
        fwrite($file,$line);
        fclose($file);
    }

    public function GetLastID()
    {
        $ID=0;
        $file = fopen($this->FName,"r+");
        while(!feof($file))
        {
            fgets($file);
            $ID++;
        }
        fclose($file);

        return $ID;
    }
}
?>