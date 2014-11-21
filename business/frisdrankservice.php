<?php
require_once 'data/frisdrankdao.php';
require_once 'exceptions/exception.php';

class FrisdrankService{
    
    //Haal alle frisdrank op
    //output: lijst met frisdrank-objecten
    public function getFrisdrankOverzicht(){
        $frisdrankdao = new frisdrankDAO();
        $lijst = $frisdrankdao->getAll();
        return $lijst;
    }
    
    //Haalt een bepaalde frisdrank op a.d.h. zijn id nummer
    //input: id nummer van een frisdrank
    //output: frisdrank-object van een bepaalde id nummer
    public function getFrisdrank($frisdrankId){
        $frisdrankdao = new frisdrankDAO();
        $frisdrank = $frisdrankdao->getById($frisdrankId);
        return $frisdrank;
    }
    
    //Verminderd de voorraad van een bepaalde frisdrank
    //input: id nummer van een frisdrank
    public function HaalFrisdrankUit($frisdrankId){
        $frisdrankdao = new frisdrankDAO();
        $frisdrank = $frisdrankdao->getById($frisdrankId);
        $aantal = $frisdrank->getAantal();
        if($aantal >= 1){
            $aantal--;
            $frisdrank->setAantal($aantal);
            $frisdrankdao->updateAantal($frisdrank);
        }else{
            throw new GeenFrisdrankMeer();
        }
    }
    
    //Vul machine
    //input: id van het frisdrank, aantal stuks dat in de automaat zitten
    public function VulFrisdrank($frisdrankId, $aantal){
        if($aantal <= 20){
            $frisdrankdao = new frisdrankDAO();
            $frisdrank = $frisdrankdao->getById($frisdrankId);
            $frisdrank->setAantal($aantal);
            $frisdrankdao->updateAantal($frisdrank);
        }else{
            throw new TeveelAangevuld();
        }
    }
    
}