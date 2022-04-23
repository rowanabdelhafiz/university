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
        if($Filenames!="")
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

    public function setSeparator($Separator)
    {
        if($Separator!=null)
        {
            $this->Separator = $Separator;
            return $this;
        }
        

        
    }
}
?>