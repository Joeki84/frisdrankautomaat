<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION["munten"])){
    $cash = $_SESSION["munten"];
    $totaal  = $_SESSION["totaal"];
    $totaal /= 100;
    $totaal = number_format($totaal,2,",",".");
}else{
    $totaal = number_format(0,2,",",".");
}