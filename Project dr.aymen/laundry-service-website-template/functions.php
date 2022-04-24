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
        $contents = str_replace($Line, '', $contents);
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

    function getLineByID($ID)
    {
        $file = fopen($this->Filenames,"r");
        while(!feof($file))
        {
            $line = fgets($file);
            $arr = explode($this->Separator,$line);

            if($arr[0] > 0 && $arr[0] == $ID)
            {
                return $line;
            }
        }
        return "";
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