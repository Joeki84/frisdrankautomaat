<?php
require_once 'business/loginservice.php';
require_once 'business/frisdrankservice.php';
require_once 'business/cashservice.php';

if(isset($_POST["login"])){
    if(!isset($_SESSION)){
        session_start();
    }
    //gebruikersnaam = admin
    //wachtwoord = ww123
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $ww = $_POST["wachtwoord"];
    $wachtwoord = md5($ww);
    $gebruikersrv = new LoginService();
    $gebruiker = $gebruikersrv->getGebruiker($gebruikersnaam, $wachtwoord);
    if(isset($gebruiker)){
        include("laadadmingegevens.php");
        include("presentation/ingelogd.php");
    }else{
        $loginerror = "Gebruikersnaam en/of wachtwoord zijn ongeldig.";
        include 'presentation/inlogform.php';
    }
}else{
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION["gebruiker"])){
        $gebruikersrv = new LoginService();
        $gebruikerId = $_SESSION["gebruiker"];
        $gebruiker = $gebruikersrv->getGebruikerId($gebruikerId);                        
        if(isset($gebruiker)){
            include("laadadmingegevens.php");
            include("presentation/ingelogd.php");
        }        
    }else{
        include("presentation/inlogform.php");    
    }
}