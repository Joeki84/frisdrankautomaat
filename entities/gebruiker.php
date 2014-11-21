<?php
class Gebruiker{
    
    private static $idMap = array();
    
    private $gebruikerId;
    private $gebruikersnaam;
    private $wachtwoord;
    
    private function __construct($gebruikerId, $gebruikersnaam, $wachtwoord) {
        $this->gebruikerId = $gebruikerId;
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
    }
    
    public static function create($gebruikerId, $gebruikersnaam, $wachtwoord){
        if(!isset(self::$idMap[$gebruikerId])){
            self::$idMap[$gebruikerId] = new Gebruiker($gebruikerId, $gebruikersnaam, $wachtwoord);
        }
        return self::$idMap[$gebruikerId];
    }
    
    public function getGebruikerId(){
        return $this->gebruikerId;
    }
    
    public function getGebruikersnaam(){
        return $this->gebruikersnaam;
    }
    
    public function getWachtwoord(){
        return $this->wachtwoord;
    }    
}