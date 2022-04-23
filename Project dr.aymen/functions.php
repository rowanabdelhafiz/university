<?php
class filemanager
{
    protected $Filenames;
    protected $Separator = "~";
    function store_dataFile($data)
    {
        $file=fopen($this->Filenames, "a+");
        fwrite($file,$data."\r\n");
        fclose($file);
    }

    function remove_dataFile($Line)
    {
        $contents = file_get_contents($this->Filenames);
        $contents = str_replace($Line, "", $contents);
        file_put_contents($this->Filenames, $contents);
    }

    function update_dataFile($OLine,$NLine)
    {
        $contents = file_get_contents($this->Filenames);
        $contents = str_replace($OLine, $NLine, $contents);
        file_put_contents($this->Filenames, $contents);
    }

    function tableData()
    {
        $file = fopen($this->Filenames,"r");
        while(!feof($file))
        {

        }
    }

    function AllContents()
    {
        $file = fopen($this->Filenames,"r");

        $results = array();
        $i=-1;

        while(!feof($file))
        {
            $line = fgets($file);
            if($i != -1)
            {
                $results[$i] = $line;
            }
            $i++;
        }
        return $results;
    }

    function getId()
    {
        $file = fopen($this->Filenames, "r+")or die("Unable to open file!");
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