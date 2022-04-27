<?php

include_once("../InID.php");
include_once("../functions.php");
include_once "../Interface.php";
class Usertype extends InID implements File
{
    private $FileObj;
    
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("usertype.txt");
    }
    public function Store()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();
        $record = $this->ID.$s.$this->name.$s;
        $this->FileObj->store_dataFile($record);
    }
    public function Update()
    {
        $records = $this->FileObj->AllContents();
        $pos = 0;
        for($i=0;$i<count($records) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
                    $nl="";
                    if($this->name!="")
                    {
                        $ar[1]=$this->getname();
                    }
               $this->FileObj->update_dataFile($records[$i],$nl);
                break;
            }
        }
    }
    public function Remove()
    {
        $records = $this->FileObj->AllContents();
        for($i=0; $i<count($records) - 1;$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }

    static function IdToName($Id)
    {
        $FileObj = new filemanager();
        $FileObj->setFilenames("usertype.txt");
        return explode("~",$FileObj->getLineByID($Id))[1];
    }
    public function Search()
    {
        $List=$this->FileObj->AllContents();
        // Id~Name
        for ($i=0; $i < count($List) - 1; $i++) { 
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
        }
        
        $DisplayedList = [];
        $Header = ["Id","Name"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
    public function getAllCourses()
    {
        $allc=array();
        $records = $this->FileObj->AllContents();
        for($i=0; $i<count($records) - 1;$i++)
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

        $c=new usertype();
        $c->ID = $ar[0];
        $c->name = $ar[1];
        return $c;
    }
   
}