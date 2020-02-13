<?php

namespace App\Models;

// product class
class Calculation{
    
    private $id;
    private $title;
    private $result;

    function __construct($id, $title, $years, $months, $days, $hours){
        $this->id = $id;
        $this->title = $title;
        $this->result = ($years * 8760) + ($months * 730) + ($days * 24) + ($hours);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getResult()
    {
        return $this->result;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setResult($result)
    {
        $this->result = $result;
    }
      
    public function __toString(){
        return "Id: " . $this->id . ", Title: " . $this->title . ", Result: " . $this->result;
    }
}