<p class="wisselgeld">Wisselgeld:<br>
<?php
foreach($wisselgeld as $rij){
    $aantal = $rij->getAantal();
    $waarde = $rij->getWaarde();
    $waarde /= 100;
    $waarde = number_format($waarde, 2, ',', '.');
    ?>
    <?php print($aantal);?> x <?php print($waarde);?> &euro;<br>
<?php
}
?>
<?php
$som /= 100;
$som = number_format($som,2,",",".");
?>
Totaal: <?php print("$som");?> &euro;</p>