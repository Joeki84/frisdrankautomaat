<?php
$_SESSION["gebruiker"] = $gebruiker->getGebruikerId();
$frisdranksvc = new FrisdrankService();
$cashsrv = new CashService();
$muntenLijst = $cashsrv->getGeldlade();
$begroeting = "Hallo, " . $gebruiker->getGebruikersnaam();
$frisdrankLijst = $frisdranksvc->getFrisdrankOverzicht();
$update = "";