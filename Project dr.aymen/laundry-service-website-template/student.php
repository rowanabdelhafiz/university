<?php 
class Student
{
    protected $created_hour=-1;
    protected $gpa=-1;
    protected $parent_phone_number=null;
    protected $faculity=null;
    protected $gender=null;
    protected $courses=null;

    public function getCreated_hour()
    {
        return $this->created_hour;
    }
    public function setCreated_hour($created_hour)
    {
        $this->created_hour = $created_hour;

        return $this;
    }

    public function getGpa()
    {
        return $this->gpa;
    }

    public function setGpa($gpa)
    {
        $this->gpa = $gpa;

        return $this;
    }

    public function getParent_phone_number()
    {
        return $this->parent_phone_number;
    }


    public function setParent_phone_number($parent_phone_number)
    {
        $this->parent_phone_number = $parent_phone_number;

        return $this;
    }

    public function getFaculity()
    {
        return $this->faculity;
    }


    public function setFaculity($faculity)
    {
        $this->faculity = $faculity;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCourses()
    {
        return $this->courses;
    }

    public function setCourses($courses)
    {
        $this->courses = $courses;

        return $this;
    }
}
?>