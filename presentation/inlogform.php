<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/automaat.css">
        <title>Frisdrankautomaat - Beheer</title>        
    </head>
    <body class="admin">
        <?php
        if(isset($loginerror)){
            ?>
            <p class="rodetekst">
                <?php print("$loginerror");?>
            </p>
            <?php
        }
        ?>
        <form action="index.php?actie=login" method="POST">
            <p>
                <label id="gebruiker">Gebruikersnaam: </label>
                <input type="text" name="gebruikersnaam" required="required">                
            </p>
            <p>
                <label id="paswoord">Wachtwoord: </label>
                <input type="password" name="wachtwoord" required="required">
            </p>
            <p>
                <input type="submit" name="login" value="Log-in">
            </p>
        </form>
    </body>
</html>