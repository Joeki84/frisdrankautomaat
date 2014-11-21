<?php
require_once 'business/cashservice.php';
$cashsvc = new CashService();
$muntenLijst = $cashsvc->getMunten();