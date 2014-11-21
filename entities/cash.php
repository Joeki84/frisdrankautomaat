<?php
class Cash{
    
    private static $idMap = array();   
    
    private $waarde;
    private $aantal;
    private $afbeelding;
    
    public function __construct($waarde, $aantal, $afbeelding) {
        $this->waarde = $waarde;
        $this->aantal = $aantal;
        $this->afbeelding = $afbeelding;        
    }
    
    public function getWaarde(){
        return $this->waarde;
    }

    public function getAantal(){
        return $this->aantal;
    }
    
    public function getAfbeelding(){
        return $this->afbeelding;
    }
    
    public function setWaarde($waarde){
        $this->waarde = $waarde;
    }
    
    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
    
    public function setAfbeelding($afbeelding){
        $this->afbeelding = $afbeelding;
    }

}