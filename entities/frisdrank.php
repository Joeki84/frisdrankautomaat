<?php
class Frisdrank{
    
    private static $idMap = array();
    
    private $frisdrankId;
    private $naam;
    private $prijs;
    private $aantal;
    
    private function __construct($frisdrankId, $naam, $prijs, $aantal) {
        $this->frisdrankId = $frisdrankId;
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->aantal = $aantal;
    }
    
    public static function create($frisdrankId, $naam, $prijs, $aantal){
        if(!isset(self::$idMap[$frisdrankId])){
            self::$idMap[$frisdrankId] = new Frisdrank($frisdrankId, $naam, $prijs, $aantal);
        }
        return self::$idMap[$frisdrankId];
    }
    
    public function getFrisdrankId(){
        return $this->frisdrankId;
    }
    
    public function getNaam(){
        return $this->naam;
    }
    
    public function getPrijs(){
        return $this->prijs;
    }
    
    public function getAantal(){
        return $this->aantal;
    }
    
    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
}