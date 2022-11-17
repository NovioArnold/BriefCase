<?php
 include 'template/html_template.php';
 
?>

<section class="orderlist">
<form action="" method="post">
                <section id="customer_data">
                    <label for="name">Naam:</label>
                    <input type="text" name="name" id="name" class="name" placeholder="Uw naam" required>
                    <label for="address">Adres:</label>
                    <input type="text" name="address" id="address" class="address" placeholder="Uw adres" required>
                    <label for="postcode">Postcode:</label>
                    <input type="text" name="postcode" id="postcode" class="postcode" placeholder="Uw postcode" required>
                    <label for="city">Woonplaats:</label>
                    <input type="text" name="city" id="city" class="city" placeholder="Uw woonplaats" required>
                    <label for="Bezorgen">Bezorgen?</label>
                    <select name="deliver" id="deliver" class="deliver" required>
                        <option value="" class="bezorg-option">Kies optie....</option>
                        <option value="ja" class="bezorg-option">Ja (5 euro bezorgkosten)</option>
                        <option value="nee" class="bezorg-option">Nee</option>

                    </select>
                </section>
                <section id="order_list">
                    <table class="bestellijst">
                        <thead class="tablehead">
                            <th class="head-item">Soort Pizza</th>
                            <th class="head-item">Prijs per stuk</th>
                            <th class="head-item">Aantal</th>
                        </thead>
                        <tbody>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[0]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[0]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal0" id="aantal0" min="0" max="10" value="0"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[1]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[1]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal1" id="aantal1" min="0" max="10" value="0"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[2]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[2]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal2" id="aantal2" min="0" max="10" value="0"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[3]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[3]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal3" id="aantal3" min="0" max="10" value="0"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[4]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[4]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal4" id="aantal4" min="0" max="10" value="0"></td>
                            
                        </tr>
                        </tbody>
                        
                    </table>
                </section>
                <button type="submit" name="bereken" id="bereken">Bereken totaalbedrag</button>

            </form>

</section>
<section class="reciept">
    <?php 
    if(isset($_POST['bereken'])){
        echo "
    <ul >
        <li >Ordernummer: ".$orderlijst[0]['Ordernummer']."</li>
        <li >Besteldatum: ".$orderlijst[0]['Datum']."</li>
        <li >Naam:        ".$orderlijst[0]['Naam']."</li>
        <li >Adres:       ".$orderlijst[0]['Adres']."</li>
        <li >Woonplaats:  ".$orderlijst[0]['Woonplaats']."</li>
        <li >Postcode:    ".$orderlijst[0]['Postcode']."</li>        
        <li >Bezorgen:    ".$orderlijst[0]['Bezorgen']."</li>
        
    </ul>
    ";?>
    </section>

    
    <section>
    <?php
    echo "<b>Totaal zonder korting                 :  &euro;$total_pizza_price<br></b>";
    echo "<b>Totaal met korting(voor beszorgkosten):  &euro; $total_price_discounted</b> <br>";
    #Delivery cost applied
    if ($orderlijst[0]['Bezorgen']==='ja'){        
        echo "<b>bezorg kosten zijn                    :  &euro;$deliver_cost <br></b>";
        $eindtotaal = $total_price_discounted + $deliver_cost;
        echo "<h3>Het totaal bedrag is:  &euro; $eindtotaal</h3>";
        
    }
    else{
        echo "<h3>Het totaal bedrag is:  &euro; $total_price_discounted</h3>";
        
    }?>
</section>
<section>
    <?php
    echo "Je hebt besteld:";
    
   
    echo build_table($orderlijst['Bestelde pizzas']) ;
    
    
    
    }?>
</section>

