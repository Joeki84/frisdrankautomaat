<?php
require_once 'data/gebruikerdao.php';

class LoginService{
    
    //Haalt een bepaalde gebruiker op a.d.h. zijn id nummer
    //input: id nummer van de gebruiker
    //output: gebruiker-object van een bepaalde id nummer
    public function getGebruikerId($gebruikerId){
        $gebruikerdao = new gebruikerDAO();
        $gebruiker = $gebruikerdao->getById($gebruikerId);
        return $gebruiker;
    }
    
    public function getGebruiker($gebruikersnaam, $wachtwoord){
        $gebruikerdao = new gebruikerDAO();
        $gebruiker = $gebruikerdao->getByGebruiker($gebruikersnaam, $wachtwoord);
        return $gebruiker;
    }
}    