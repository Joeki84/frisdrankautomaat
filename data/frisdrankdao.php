<?php
require_once 'data/dbconfig.php';
require_once 'entities/frisdrank.php';

class frisdrankDAO{
    
    //Opvragen van alle frisdranken in de automaat.
    //output: lijst van frisdranken-objecten
    public function getAll(){
        $lijst = array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME,  DBConfig::$DB_PASSWORD);
        $sql = "SELECT frisdrankId, naam, prijs, aantal FROM mvc_frisdrank";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $frisdrank = Frisdrank::create($rij["frisdrankId"], $rij["naam"], $rij["prijs"], $rij["aantal"]);
            array_push($lijst, $frisdrank);
        }
        $dbh = null;
        return $lijst;
    }
    
    //Opvragen van één frisdrank aan de hand van zijn id
    //input: id nummer van het frisdrank
    //output: frisdrank-object van het opgevraagde id
    public function getById($frisdrankId){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME,  DBConfig::$DB_PASSWORD);
        
        $sql = "SELECT naam, prijs, aantal FROM mvc_frisdrank WHERE frisdrankId = '$frisdrankId'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        
        $frisdrank = Frisdrank::create($frisdrankId, $rij["naam"], $rij["prijs"], $rij["aantal"]);
        
        $dbh = null;
        return $frisdrank;
    }
    
    //Aantal stuks van een frisdrank wijzigen
    //input: frisdrank-object met nieuw aantal stuks
    public function updateAantal($frisdrank){
        $sql = "UPDATE mvc_frisdrank SET aantal = '" . $frisdrank->getAantal() . "' WHERE frisdrankId = '" . $frisdrank->getFrisdrankId() . "'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
}