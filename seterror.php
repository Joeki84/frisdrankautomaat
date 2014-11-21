<?php
session_start();
if(isset($_GET["error"])){
    if($_GET["error"] == "TeWeinigMunten"){
        $_SESSION["error"] = "Onvoldoende munten voor de frisdrank.";
    }
    if($_GET["error"] == "GeenFrisdrankMeer"){
        $_SESSION["error"] = "Frisdrank is niet meer beschikbaar.";
    }
    if($_GET["error"] == "TeveelAangevuld"){
        $_SESSION["adminerror"] = "Maximum aantal frisdranken overschreden.";
    }
}