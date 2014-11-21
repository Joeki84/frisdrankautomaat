<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/automaat.css">
        <title>Frisdrankautomaat</title>
    </head>
    <body>
        <?php
        if(isset($wisselgeld)){
            include_once 'presentation/geefwisselgeld.php';
        }
        ?>
        <table class="munten">
            <tr>
                <?php
                foreach ($muntenLijst as $munt) {
                ?>
                    <td>
                        <a href="index.php?munt=<?php print($munt->getWaarde());?>">
                            <img src="img/<?php print($munt->getAfbeelding());?>" alt="<?php print($munt->getWaarde());?> &euro;"/>
                        </a>
                    </td>
                <?php
                }
                ?>
            </tr>
        </table>
        <p class="saldo">Saldo: <?php print($totaal);?> &euro;</p>
        <?php
        if(isset($error)){
            include("presentation/toonerror.php");
        }
        ?>
        <?php
        include ("presentation/frisdrankenlijst.php");
        ?>
    </body>
</html>