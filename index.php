<?php
if(count($_GET)> 0){
    $actie = false;
    if(isset($_GET["munt"])){
        $actie = true;
        include_once("voegmunttoe.php");
        header("location: index.php");
    }
    if(isset($_GET["drank"])){
        $actie = true;
        include("geeffrisdrank.php");
        header("location: index.php");
    }
    if(isset($_GET["error"])){
        $actie = true;
        include("seterror.php");
        if(isset($_SESSION["error"])){
            header("location: index.php");
        }else{
            header("location: index.php?actie=error");
        }
    }
    if(isset($_GET["actie"])){
        if($_GET["actie"] == "login"){
            $actie = true;
            include("login.php");
        }
        if(!isset($_SESSION)){
            session_start();
        }
        if($_GET["actie"] == "update" && isset($_SESSION["gebruiker"])){
            $actie = true;
            include("adminupdate.php");
        }
        if($_GET["actie"] == "error" && isset($_SESSION["gebruiker"])){
            $actie = true;
            include("adminupdate.php");
        }
    }
    if(!$actie){
        header("location: index.php");
    }
}else{
    require_once 'business/cashservice.php';
    require_once 'entities/cash.php';
    //munten controller
    include("toonmunten.php");
    session_start();
    //geef wisselgeld
    if(isset($_SESSION["wisselmunten"])){
        $wisselgeld = $_SESSION["wisselmunten"];
        $som = $_SESSION["som"];
        unset($_SESSION["munten"]);
        unset($_SESSION["wisselmunten"]);
        unset($_SESSION["som"]);
        $_SESSION["totaal"] = 0;
    }
    //insteek
    include("insteek.php");
    //toon error
    include("toonerror.php");
    //toonfrisdranken controller
    include("toonfrisdranken.php");
    //toon index-pagina
    include("presentation/index.php");
}
?>