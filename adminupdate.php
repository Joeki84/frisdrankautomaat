<?php
require_once 'business/loginservice.php';
require_once 'business/frisdrankservice.php';
require_once 'business/cashservice.php';

if(isset($_GET["actie"])){
    $post = false;
    if(isset($_POST["frisdrank"])){
        $post = true;
        $gebruikersrv = new LoginService();
        $gebruikerId = $_SESSION["gebruiker"];
        $gebruiker = $gebruikersrv->getGebruikerId($gebruikerId);        
        $frisdranksrv = new FrisdrankService();
        $frisdranken = $_POST;
        if(isset($gebruiker)){
            try{
                foreach ($frisdranken as $frisdrankId => $aantal) {
                    if(is_numeric($frisdrankId)){
                        $frisdranksrv->VulFrisdrank($frisdrankId, $aantal);
                    }
                }
                include("laadadmingegevens.php");
                $update = "Frisdranken ge&uuml;pdate.";
                include("presentation/ingelogd.php");
            }catch(TeveelAangevuld $ta){
                header("location: index.php?error=TeveelAangevuld");
            }
        }else{
            include("presentation/inlogfrom.php");
        }
    }
    if(isset($_POST["munten"])){
        $post = true;
        $cashsrv = new CashService();
        $cashsrv->LeegGeldlade();
        $gebruikersrv = new LoginService();
        $gebruikerId = $_SESSION["gebruiker"];
        $gebruiker = $gebruikersrv->getGebruikerId($gebruikerId);
        if(isset($gebruiker)){
            include("laadadmingegevens.php");
            $update = "Geldlade leeg gemaakt.";
            include("presentation/ingelogd.php");
        }else{
            include("presentation/inlogform.php");
        }
    }
    if(isset($_SESSION["adminerror"])){
        $post = true;
        $gebruikersrv = new LoginService();
        $gebruikerId = $_SESSION["gebruiker"];
        $gebruiker = $gebruikersrv->getGebruikerId($gebruikerId);        
        if(isset($gebruiker)){
            include("laadadmingegevens.php");
            $adminerror = $_SESSION["adminerror"];
            include("presentation/ingelogd.php");
            unset($_SESSION["adminerror"]);
        }else{
            include("presentation/inlogform.php");
        }
    }
    if(!$post){
        $gebruikersrv = new LoginService();
        $gebruikerId = $_SESSION["gebruiker"];
        $gebruiker = $gebruikersrv->getGebruikerId($gebruikerId);        
        if(isset($gebruiker)){
            include("laadadmingegevens.php");
            include("presentation/ingelogd.php");
        }else{
            include("presentation/inlogform.php");
        }
    }
}else{
    include 'presentation/inlogform.php';
}