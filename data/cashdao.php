<?php
require_once 'data/dbconfig.php';
require_once 'entities/cash.php';

class cashDAO{
    
    //Laad alle soorten munten
    //output: lijst van munten
    public function Munten(){
        $lijst = array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME,  DBConfig::$DB_PASSWORD);
        
        $sql = "SELECT waarde, afbeelding FROM mvc_geldlade";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $munt = new Cash($rij["waarde"], "0" , $rij["afbeelding"]);
            array_push($lijst, $munt);
        }

        $dbh = null;
        return $lijst;
    }
    
    //Plaatst het geld in de geldlade
    //input: waarde van het muntstuk, aantal muntenstukken die in de automaat zijn gestoken
    public function StortGeld($waarde, $aantal){
        $sql = "UPDATE mvc_geldlade SET aantal = aantal + $aantal WHERE waarde = $waarde";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;        
    }

    //Haalt het wisselgeld uit de geldlade
    //input: waarde van het muntstuk, aantal muntstukken die uit de automaat moeten
    public function VerminderGeld($waarde, $aantal){
        $sql = "UPDATE mvc_geldlade SET aantal = aantal - $aantal WHERE waarde = $waarde";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    //Leest alle wisselgeld uit de geldlade
    //output: lijst van cash-objecten met muntstukken en hun aantallen
    public function LeesGeldlade(){
        $lijst = array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME,  DBConfig::$DB_PASSWORD);
        
        $sql = "SELECT waarde, aantal, afbeelding FROM mvc_geldlade";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $munt = new Cash($rij["waarde"], $rij["aantal"] , $rij["afbeelding"]);
            array_push($lijst, $munt);
        }
        
        $dbh = null;
        return $lijst;
    }
    
}