<?php
require_once 'business/cashservice.php';
require_once 'entities/cash.php';
session_start();

if(isset($_GET["munt"])){
    $cashserv = new CashService();
    if(isset($_SESSION["munten"])){
        $cash = $_SESSION["munten"];
    }else{
        $cash = $cashserv->getMunten();
    }
    $munt = $_GET["munt"];
    try{
        $cashserv->verhoog($cash, $munt);
    } catch (OngeldigeMunt $ex) {
        print("error");
    }
    $_SESSION["munten"] = $cash;
    $totaal = $cashserv->getSom($cash);
    $_SESSION["totaal"] = $totaal;
}