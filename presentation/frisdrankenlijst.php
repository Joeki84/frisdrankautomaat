<table>
    <tr>
        <td colspan="5" class="logo">
            <img src="img/logo.jpg" alt="The Coca-Cola Company" />
        </td>
    </tr>
    <tr>
        <?php
        foreach ($frisdrank as $item) {
        ?>    
        <td class="frisdrank">
            <?php print($item->getNaam());?><br>
            <?php
            if($item->getAantal() > 0){
            ?>
                <a href="index.php?drank=<?php print($item->getFrisdrankId());?>" >
                    <img src="img/<?php print($item->getNaam());?>.jpg" alt="<?php print($item->getNaam());?>" />
                </a>
            <?php
            }else{
            ?>
                <img src="img/<?php print($item->getNaam());?>.jpg" alt="<?php print($item->getNaam());?>" />
            <?php
            }
            ?>
            <br>
            <?php
                $prijs = $item->getPrijs();
                $prijs /= 100;
                $prijs = number_format($prijs,2,",",".");            
                print("$prijs")?> &euro;<br>
            <?php
            if($item->getAantal() == 0){
                ?>
                <div class="verkocht">UITVERKOCHT !</div>
                <?php
            }
            ?>
        </td>
        <?php
        }
        ?>
    </tr>
</table>