<?php

class GuardSecretary
{
    protected $numDaysWorking = -1;
    protected $numHoursWorking = -1;
    protected $NationalID = 0;
    protected $Address = null;

    public function getNumDaysWorking()
    {
        if($this->numDaysWorking > -1)
        {
            return $this->numDaysWorking;
        }
    }

    public function setNumDaysWorking($nW)
    {
        if($nW > -1)
        {
            $this->numDaysWorking = $nW;
        }
    }

    public function getNumHoursWorking()
    {
        if($this->numHoursWorking > -1)
        {
            return $this->numHoursWorking;
        }
    }

    public function setNumHoursWorking($nH)
    {
        if($nH > -1)
        {
            $this->numHoursWorking = $nH;
        }
    }

    public function getNationalID()
    {
        if($this->NationalID > 0)
        {
            return $this->NationalID;
        }
    }

    public function setNationalID($nID)
    {
        if($nID > 0)
        {
            $this->NAtionalID = $nID;
        }
    }

    public function getAddress()
    {
        if($this->Address != null)
        {
            return $this->Address;
        }
    }

    public function setAddress($A)
    {
        if($A != null)
        {
            $this->Address = $A;
        }
    }
}

?>