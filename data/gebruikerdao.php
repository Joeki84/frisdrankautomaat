<?php
require_once 'data/dbconfig.php';
require_once 'entities/gebruiker.php';

class gebruikerDAO{
    
    //Opvragen van één gebruiker aan de hand van zijn id
    //input: id nummer van de gebruiker
    //output: gebruiker-object van het opgevraagde id
    public function getById($gebruikerId){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $sql = "SELECT gebruikersnaam, wachtwoord FROM mvc_gebruiker WHERE gebruikerId = '$gebruikerId'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        
        $gebruiker = Gebruiker::create($gebruikerId, $rij["gebruikersnaam"], $rij["wachtwoord"]);
        
        $dbh = null;
        return $gebruiker;
    }
    
    //Opvragen van een gebruikersId aan de hand van zijn gebruikersnaam en wachtwoord
    //input: gebruikersnaam, wachtwoord
    //output: gebruikersId als gebruikersnaam en wachtwoord in databank zitten, anders null
    public function getByGebruiker($gebruikersnaam, $wachtwoord){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $sql = "SELECT gebruikerId FROM mvc_gebruiker WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'";
        
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        if(!empty($rij)){
            $gebruiker = Gebruiker::create($rij["gebruikerId"], $gebruikersnaam, $wachtwoord);
            return $gebruiker;
        }else{
            return null;
        }
    }
}