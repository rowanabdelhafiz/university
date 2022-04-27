<?php 
include_once("../class_user.php");
include_once("../functions.php");
include_once "../Interface.php";
class menu extends user implements File
{
    private filemanager $FileObj;
    private $order_m="";
    private $product_m="";
    private $user_m="";
    private $user_type="";
    private $user_type_menu="";
    private $user_menu="";
    function __construct(){
        $this->FileObj=new filemanager();
        $this->FileObj->setFilenames("menu.txt");
        $this->FileObj->setSeparator("~");
    }
    static public function IdToName($id)
    {
        $FileObj = new filemanager();
        $FileObj->setFilenames("menu.txt");
        return explode($FileObj->getSeparator(),$FileObj->getLineByID($id))[1];
    }
    public function Search()
    {
        $List=$this->FileObj->AllContents();
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->id!=0)
            {
                if($this->id!=intval($Array[0]))
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
        $Header = ["Id","name","ordermenu","productmenu","usermenu"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
    public function Store()
    {
        $s=$this->FileObj->getSeparator();
        $id=$this->FileObj->getId($s)+1;
        $record=$id.$s.$this->getName().$s.$this->getOrder_m().$s.$this->getProduct_m().$s.$this->getUser_m().$s.$this->getUser_type().$s.$this->getUser_type_menu().$s.$this->getUser_menu().$s;
        $this->FileObj->store_dataFile($record);
    }
    public function Update()
    {
        $records = $this->FileObj->AllContents();
        $pos = 0;
        for($i=0;$i<count($records) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->id == $ar[0])
            {
                $nl="";
                if($this->name!="")
                {
                    $ar[1]=$this->getName();
                }
                if($this->order_m!="")
                {
                    $ar[2]=$this->getOrder_m();
                }
                if($this->product_m!="")
                {
                    $ar[3]=$this->getProduct_m();
                }
                if($this->user_m!="")
                {
                    $ar[4]=$this->getUser_type();
                }
                if($this->user_type!="")
                {
                    $ar[5]=$this->getUser_type_menu();
                }
                if($this->user_type_menu!="")
                {
                    $ar[6]=$this->getUser_type();
                }
                if($this->user_menu!="")
                {
                    $ar[7]=$this->getUser_menu();
                }
                $this->FileObj->update_dataFile($records[$i],$nl);
                break;
            }
        }
    }
    public function Remove()
    {
        $records = $this->FileObj->AllContents();
        for($i=0;$i<count($records) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
           if($this->id == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }    
    public function getOrder_m()
    {
        if($this->order_m!="")
        {
            return $this->order_m;
        }
    }

    /**
     * Set the value of order_m
     *
     * @return  self
     */ 
    public function setOrder_m($order_m)
    {
        if($order_m!="")
        {
             $this->order_m = $order_m;

             return $this;
        }
    }

    /**
     * Get the value of product_m
     */ 
    public function getProduct_m()
    {
        if($this->product_m!="")
        {
            return $this->product_m;
        }
        
    }

    /**
     * Set the value of product_m
     *
     * @return  self
     */ 
    public function setProduct_m($product_m)
    {
        if($product_m!="")
        {
            $this->product_m = $product_m;

            return $this;
        }
    }

    /**
     * Get the value of user_m
     */ 
    public function getUser_m()
    {
        if($this->user_m!="")
        {
            return $this->user_m;
        }
        
    }

    /**
     * Set the value of user_m
     *
     * @return  self
     */ 
    public function setUser_m($user_m)
    {
        if($user_m!="")
        {

        
            $this->user_m = $user_m;

            return $this;
        }
    }

    /**
     * Get the value of user_type
     */ 
    public function getUser_type()
    {
        return $this->user_type;
    }

    /**
     * Set the value of user_type
     *
     * @return  self
     */ 
    public function setUser_type($user_type)
    {
        if($user_type!="")
        {
            $this->user_type = $user_type;

            return $this;
        }
        
    }

    /**
     * Get the value of user_type_menu
     */ 
    public function getUser_type_menu()
    {
        return $this->user_type_menu;
    }

    /**
     * Set the value of user_type_menu
     *
     * @return  self
     */ 
    public function setUser_type_menu($user_type_menu)
    {
        $this->user_type_menu = $user_type_menu;

        return $this;
    }

    /**
     * Get the value of user_menu
     */ 
    public function getUser_menu()
    {
        return $this->user_menu;
    }

    /**
     * Set the value of user_menu
     *
     * @return  self
     */ 
    public function setUser_menu($user_menu)
    {
        $this->user_menu = $user_menu;

        return $this;
    }
}
?>