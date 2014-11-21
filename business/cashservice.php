<?php
require_once 'data/cashdao.php';
require_once 'exceptions/exception.php';

class CashService{
    
    //Vraag een lijst van de munten op
    //output: geeft een lijst van munten terug, aantallen staan op nul
    public function getMunten(){
        $cashdao = new cashDAO();
        $lijst = $cashdao->Munten();
        return $lijst;
    }
    
    //Verhoogt een bepaalde muntwaarde met 1
    //input: lijst van munten, muntwaarde
    public function verhoog($cash, $waarde){
        foreach ($cash as $rij) {
            if($rij->getWaarde() == $waarde){
                $aantal = $rij->getAantal();
                $aantal++;
                $rij->setAantal($aantal);
            }
        }
    }
    
    //Verlaagt een bepaalde muntwaarde met 1
    //input: lijst van munten, muntwaarde
    public function verlaag($cash, $waarde){
        foreach ($cash as $rij) {
            if($rij->getWaarde() == $waarde){
                $aantal = $rij->getAantal();
                $aantal--;
                $rij->setAantal($aantal);
            }
        }        
    }
    
    //Berekent de som van een lijst munten
    //input: lijst van munten
    //output: totale waarde van de munten in de lijst    
    public function getSom($cash){
        $som = 0;
        foreach($cash as $rij){
            $product = $rij->getWaarde() * $rij->getAantal();
            $som += $product;
        }
        return $som;
    }
    
    //Leest de geldlade uit
    //output: geeft een lijst van munten terug, met aantal munten per waarde    
    public function getGeldlade(){
        $cashdao = new cashDAO();
        $lijst = $cashdao->LeesGeldlade();
        return $lijst;        
    }
    
    //Zet de geldlade op 0
    public function LeegGeldlade(){
        $cashdao = new cashDAO();
        $lijst = $cashdao->LeesGeldlade();
        foreach($lijst as $rij){
            $cashdao->VerminderGeld($rij->getWaarde(), $rij->getAantal());
        }
    }

    //Verwijderd één frisdrank en laat het wisselgeld berekenen
    //input: frisdrank die besteld is, geld dat in het machine is gestoken
    //output: het wisselgeld dat teruggeven wordt
    public function betaal($frisdrank, $cash){
        $frisdrankdao = new frisdrankDAO();
        $cashdao = new cashDAO();
        $prijs = $frisdrank->getPrijs();
        $som = $this->getSom($cash);
        if($prijs <= $som){
            $som -= $prijs;
            $frisdrankdao->updateAantal($frisdrank);
            foreach ($cash as $rij) {
                if($rij->getAantal() > 0){
                    $cashdao->StortGeld($rij->getWaarde(), $rij->getAantal());
                }
            }
            $wisselgeld = $this->wisselgeld($som);
            foreach($wisselgeld as $rij){
                if($rij->getAantal() > 0){
                    $cashdao->VerminderGeld($rij->getWaarde(), $rij->getAantal());
                }
            }
            return $wisselgeld;
        }else{
            throw new TeWeinigMunten();
        }
    }
    
    //Berekent het wisselgeld dat teruggeven moet worden
    //input: som dat moet teruggeven worden
    //output: lijst met munten dat teruggeven moet worden
    public function wisselgeld($som){
        $cashdao = new cashDAO();
        $geldlade = $this->getGeldlade();
        $wisselgeld = $this->getMunten();
        $geldlade = array_reverse($geldlade);
        foreach ($geldlade as $rij) {
            $waarde = $rij->getWaarde();
            $aantal = $rij->getAantal();
            if($som/$waarde >= 1 && $aantal > 0){
                do{
                    $som -= $waarde;
                    $this->verhoog($wisselgeld, $waarde);
                    $this->verlaag($geldlade, $waarde);
                    $aantal--;
                }while($som/$waarde >= 1 && $aantal > 0);
            }
        }
        if($som > 0){
            $som = 0;
        }
        return $wisselgeld;
    }
}