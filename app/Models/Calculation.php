<?php

namespace App\Models;

// product class
class Calculation{
    
    private $title;
    private $result;

    function __construct($title, $years, $months, $days, $hours){
        $this->title = $title;
        $this->result = ($years * 8760) + ($months * 730) + ($days * 24) + ($hours);
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getResult()
    {
        return $this->result;
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
        return "Title: " . $this->title . ", Result: " . $this->result;
    }
}