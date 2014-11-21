<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/automaat.css">
        <title>Frisdrankautomaat - Beheer</title>        
    </head>
    <body class="admin">
        <h1>
            <?php print("$begroeting");?>
        </h1>
        <p class="rodetekst">
            <?php print("$update");?>
        </p>
        <p class="rodetekst">
            <?php 
            if(isset($adminerror)){
                print("$adminerror");
            }
            ?>
        </p>
        <form action="index.php?actie=update" method="POST">
            <div class="table">
                <div class="th">
                    <div class="tr">
                        <div class="td">
                            Frisdrank
                        </div>
                        <div class="td">
                            Aantal
                        </div>
                    </div>
                </div>
                <?php
                foreach($frisdrankLijst as $frisdrank){
                    ?>
                <div class="tr">
                    <div class="td">
                        <?php print($frisdrank->getNaam());?>
                    </div>
                    <div class="td">
                        <input type="number" max="25" value="<?php print($frisdrank->getAantal());?>" name="<?php print($frisdrank->getfrisdrankId());?>"> stuk(s)
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="tr">
                    <div class="td"></div>
                    <div class="td">
                        <input type="submit" value="Vul automaat" name="frisdrank">
                    </div>
                </div>
            </div>
        </form>
        <table class="admin">
            <tr>
                <th>
                    Aantal
                </th>
                <th>
                    Muntstuk
                </th>
            </tr>
            <?php
            foreach($muntenLijst as $munt){
                ?>
            <tr>
                <td>
                    <?php print($munt->getAantal());?>
                </td>
                <td>
                    <?php print(number_format($munt->getWaarde()/100,2,",","."));?> &euro;
                </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td>
                    <form action="index.php?actie=update" method="POST">
                        <input type="submit" name="munten" value="Geldlade legen">
                    </form>                    
                </td>
                <td></td>
            </tr>
        </table>
        <p>
            <a href="index.php">Automaat</a>
        </p>
    </body>
</html>