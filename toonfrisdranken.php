<?php
require_once 'business/frisdrankservice.php';
$frisdranksvc = new FrisdrankService();
$frisdrank = $frisdranksvc->getFrisdrankOverzicht();