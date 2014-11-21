<?php
require_once 'business/frisdrankservice.php';
require_once 'business/cashservice.php';
require_once 'entities/cash.php';
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["munten"])){
    $cashsrv = new CashService();
    $cash = $cashsrv->getMunten();
    $_SESSION["munten"] = $cash;
    $_SESSION["totaal"] = 0;
}

if(isset($_GET["drank"])){
    $frisdrankId = $_GET["drank"];
    $frisdrankserv = new FrisdrankService();
    $cashserv = new CashService();
    $frisdrank = $frisdrankserv->getFrisdrank($frisdrankId);
    $cash = $_SESSION["munten"];
    try{
       $wisselgeld = $cashserv->betaal($frisdrank, $cash);
       $som = $cashserv->getSom($wisselgeld);
    }  catch (TeWeinigMunten $twm){
        header("location: index.php?error=TeWeinigMunten");
        exit(0);
    }
    try{
        $frisdrankserv->HaalFrisdrankUit($frisdrankId);    
    } catch (Exception $gfm) {
        header("location: index.php?error=GeenFrisdrankMeer");
        exit(0);
    }
    $_SESSION["wisselmunten"] = $wisselgeld;
    $_SESSION["som"] = $som;
}