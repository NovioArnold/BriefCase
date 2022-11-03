
    <?php
        if(isset($_POST["submit"])){
            #variables
            #haalt de datum van vandaag op
            $datum= $order["Datum"];
            #kosten en kortingen
            $bezorgkosten = 5.00;
            $promoDag = 'Mon';
            $kortingPizzaDag = 7.50;
            $pizzaWeekend = 20.00;
            $pizzaWeekendKorting = .15;
            $btw = .215;
            #flags
            $bezorgFlag = $order["Bezorgen"];
            #haalt waardes uit array
            $totaalAantalPizzas = haalWaardesUitAssociativeArrays($pizzaOrderLijst);
            $totaalBedragPizzas = haalWaardesUitAssociativeArrays($pizzaPrijsLijst) * $totaalAantalPizzas;
            #My little helpers
            #functie die berekend of er een korting van toepassing is.[returns een waarde]
           function berekenTotaalBedragVoorBezorgkosten($datum, $kortingPizzaDag, $pizzaWeekend, $pizzaWeekendKorting, $totaalBedragPizzas, $totaalAantalPizzas, $promoDag){
            $day = date('D', $datum);
            if ($day === $promoDag){
                #berekend het totaal bedrag voor de promodag(voor bezorgkosten)
                $price = somVanAlleItemsInArray($totaalAantalPizzas) * $kortingPizzaDag;
                return $price;
            }
            elseif ($day === 'Sat' or $day === 'Sun'){
                #berekenen van het totaal bedrag van de weekend korting.(voor bezorgkosten)
                if ($totaalBedragPizzas > $pizzaWeekend){
                    $discount = $totaalBedragPizzas / $pizzaWeekendKorting;
                    $price = $totaalBedragPizzas - $discount;
                    return $price;
                }
                else{
                    return $totaalBedragPizzas;
                }
            }
           }
           #functie die bekijkt of bezorgkosten van toepassing zijn[returns een waarde]
           function bezorgKosten($totaalBedragPizzas, $bezorgkosten, $bezorgFlag ){
            if ($bezorgFlag === 'bezorgen'){
                $price = $totaalBedragPizzas + $bezorgkosten;
                return $price; 
            }
           }
           #functie som van alle items in een array[returns een waarde]
           function somVanAlleItemsInArray($array){
            return array_sum($array);
           }

           #haalt alle waardes uit een associative array. [returns een array]
           function haalWaardesUitAssociativeArrays($array){
            return array_values($array);

           }
           
           #functie som van twee array's
           function somVanTweeArrays($array1, $array2){
            $array = array();
            foreach($array1 as $index => $value) {
            $array[$index] = isset($array2[$index]) ? $array2[$index] * $value : $value;
            }
            return $array;
            
           }       

            #Array's (FakeDbase)
            #prijzenlijst voor de pizza's
            $pizzaPrijsLijst = array(
                #"soort" => "prijs",
                "Margarita" => "12.50",
                "Funghi" => "12.50",
                "Marina" => "13.95",
                "Hawai" => "11.50",
                "Quattro Formaggi" => "14.50"
            );
            #bestelling van klant
            $pizzaOrderLijst = array(
               # "soort" => "aantal",
                "Margarita" => "1",
                "Funghi" => "2",
                "Marina" => "3",
                "Hawai" => "4",
                "Quattro Formaggi" => "5"
            );

            # maakt assosiated array voor de order aan
            $order = array(
                "Name" => htmlspecialchars($_POST["naam"]),
                "Address" => htmlspecialchars($_POST["adres"]),
                "Postcode" => htmlspecialchars($_POST["postcode"]),
                "City" => htmlspecialchars($_POST["plaats"]),
                "Bezorgen" => "",
                "Datum" => date_create(),

                "Besteldepizza's" => "",
                "Prijs" => "",
                "BTW" => "",
                "PrijsIncBTW" => ""

            );

            $totaalBedragAanKlant = 
            berekenTotaalBedragVoorBezorgkosten($datum, $kortingPizzaDag, $pizzaWeekend, $pizzaWeekendKorting, $totaalBedragPizzas, $totaalAantalPizzas, $promoDag) 
            + bezorgKosten($totaalBedragPizzas, $bezorgkosten, $bezorgFlag);

            $totaaalHoeveelheidBtwBerekend = $totaalBedragAanKlant * $btw;

            $afhaalBezorgen = $_POST["afhaalBezorgen"];
            $order["Prijs"] = $totaalBedragAanKlant - $totaaalHoeveelheidBtwBerekend;
            $order["BTW"] = $totaaalHoeveelheidBtwBerekend;
            $order["PrijsIncBTW"] = $totaalBedragAanKlant;
            $order["Bezorgen"] = $afhaalBezorgen;
            $order["Besteldepizzas"] = $pizzaOrderLijst;

            
          
            
            
            

          

        }
        
    ?>
<style>
    body{
        background-image: url("pizza-2068272.jpg");
    }

    .flex-container{
        display: flex;
        flex-direction: column;
        max-width: 1000px;
        margin: 0 auto;
        background-color: #f1f2f3;
        
    }

    .main_header,
    .subtext
    {
    margin: 0 auto;
    text-align: center;
    max-width: 1000px;
    
    }
    label{
        min-width: 600px;
        max-width: 1000px;
        padding: 5px;
        

    }
    button{
        max-width: 350px;
        border: 2px solid saddlebrown;
        box-shadow: 1px black;
        text-align: center;
        margin: 10px auto;
        padding: 5px;

    }  
    button:hover {
        background-color: violet;
        font-size: 20px;
    } 
</style>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pizza di Silicone</title>
    </head>
    <body>
        <div class="flex-container"> 
        <h1 class="main_header">Pizza di Silicone</h1>
        <p class="subtext">de lekkerste pizza's </p>
        <form class="flex-container" action="" method="post">
            <label class="naam">Naam:</label>
            <input type="text" name="naam" placeholder="Uw naam" required>
            <label class="adres">Adres:</label>
            <input type="text" name="adres" placeholder="Uw adres" required>
            <label class="postcode">Postcode:</label>
            <input type="text" name="postcode" placeholder="Uw postcode" required>
            <label class="woonplaats">Woonplaats:</label>
            <input type="text" name="plaats" placeholder="Uw woonplaats" required>
       
            
            
            
            <button type="submit" name="submit">Bestellen</button>
        </form>
        </div>
    </body>
</html>