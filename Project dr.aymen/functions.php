<?php
class filemanager
{
    protected $Filenames;
    protected $Separator;
    function store_dataFile($data)
    {
        $file=fopen($this->Filenames, "a+");
        fwrite($file,$data."\r\n");
        fclose($file);
    }
    function getId()
    {
        $file = fopen("$this->Filenames", "r+")or die("Unable to open file!");
        $lastid=0;
        if ($file) {
             while (!feof($file)) {
                $line=fgets($file);
                $Arrayline=explode($this->Separator,$line);
                if($Arrayline[0]!="")
                {
                    $lastid=$Arrayline[0];
                }
       
             }
            fclose($file);
         }
         else{
             return 0;
         }
         return $lastid;
    }
    
    function check_accept(&$line_per,$faculity,$filename)
    {
        $file = fopen($filename, "r+")or die("Unable to open file!");
        while (!feof($file)) {
            $linee=fgets($file);
            $ArrayResult = explode($this->Separator, $linee);
            if($linee && $ArrayResult[0]==$faculity)
            {
                $line_per= $ArrayResult[2];
            }      
         }
        fclose($file); 
    }

    public function getFilenames()
    {
        if($this->Filenames!="")
        {
            return $this->Filenames;
        }
    }

    public function setFilenames($Filenames)
    {
        if($this->Filenames!="")
        {
            $this->Filenames = $Filenames;
        }
        
        return $this;
    }

    public function getSeparator()
    {
        if($this->Separator!=null)
        {
            return $this->Separator;
            return $this;
        }
        
    }

<<<<<<< HEAD
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
=======
    public function setSeparator($Separator)
    {
        if($this->Separator!=null)
        {
            $this->Separator = $Separator;
            return $this;
        }
        

        
    }
}
>>>>>>> 11896454478e60a760cff671687e00fc3bec5725

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