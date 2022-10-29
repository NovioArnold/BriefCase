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
        <p class="naam">Naam:</p>
        <input type="text" name="naam" placeholder="Uw naam" required>
        <p class="adres">Adres:</p>
        <input type="text" name="adres" placeholder="Uw adres" required>
        <p class="postcode">Postcode:</p>
        <input type="text" name="postcode" placeholder="Uw postcode" required>
        <p class="woonplaats">Woonplaats:</p>
        <input type="text" name="plaats" placeholder="Uw woonplaats" required>
        <p class="datum">Besteldatum:</p>
        <input type="date" name="besteldatum" placeholder="Besteldatum" required>
        
        <p class="bez-afh">Bezorgen of afhalen?</p>
        <select name="afhaalBezorgen" value="afhaalBezorgen" required >
            <option value="">[kies optie.....]</option>
            <option value="bezorgen">Bezorgen</option>
            <option value="afhalen">Afhalen</option>
        </select>
        <p class="welke-pizza">Welke pizza wil je?</p>
        <select name="pizza" value="pizza" required>
            <option value="">Kies een Pizza</option>
            <option value="margherita">Pizza Margherita 12.50</option>
            <option value="funghi">Pizza Funghi 12.50</option>
            <option value="marina">Pizza Marina 13.95</option>
            <option value="hawai">Pizza Hawai 11.50</option>
            <option value="quattro">Pizza Quattro Formaggi 14.50</option>
        </select>
        <p> </p>
        <button type="submit" name="submit">Bestellen</button>
    </form>
    </div>
    <?php
        if(isset($_POST["submit"])){
            $datum= $order["Datum"];
            #kosten en kortingen
            $bezorgkosten = "5.00";
            $maandagPizzaDag = "7.50";
            $pizzaWeekend = "20.00";
            $pizzaWeekendKorting = ".15";
            $bezorgFlag = $order["Bezorgen"];
            #My little helpers
            #functie die berekend of er een korting van toepassing is.
           function discount($datum, $maandagPizzaDag, $pizzaWeekend, $pizzaWeekendKorting, $totalPrice){
            $day = date('D', $datum);
            if ($day === 'Mon'){
                $price = $maandagPizzaDag;
                return $price;
            }
            elseif ($day === 'Sat' or $day === 'Sun'){
                if ($totalPrice > $pizzaWeekend){
                    $discount = $totalPrice / $pizzaWeekendKorting;
                    $price = $totalPrice - $discount;
                    return $price;
                }
                else{
                    return $totalPrice;
                }
            }
           }
           #functie die bekijkt of bezorgkosten van toepassing zijn
           function deliveryCost($totalPrice, $bezorgkosten, $bezorgFlag ){
            if ($bezorgFlag === 'bezorgen'){
                $price = $totalPrice + $bezorgkosten;
                return $price; 
            }
           }
           #functie die de totaal prijs berekend
           function totalCalculator($pizzaOrderLijst, $pizzaPrijsLijst){
            for each pizza in $pizzaOrderLijst;
           }
            


            #prijzenlijst voor de pizza's
            $pizzaPrijsLijst = array(
                "soort" => "prijs",
                "Margarita" => "12.50",
                "Funghi" => "12.50",
                "Marina" => "13.95",
                "Hawai" => "11.50",
                "Quattro Formaggi" => "14.50"
            );
            #bestelling van klant
            $pizzaOrderLijst = array(
                "soort" => "prijs",
                "Margarita" => "0",
                "Funghi" => "0",
                "Marina" => "0",
                "Hawai" => "0",
                "Quattro Formaggi" => "0"
            );

            # maakt assosiated array voor de order aan
            $order = array(
                "Name" => $_POST["naam"],
                "Address" => $_POST["adres"],
                "Postcode" => $_POST["postcode"],
                "City" => $_POST["plaats"],
                "Bezorgen" => "",
                "Datum" => date_create(),
                "Tijd" => $_POST["tijd"],
                "Option" => "",
                "Prijs" => ""
            );

            $afhaalBezorgen = $_POST["afhaalBezorgen"];
            $pizza = $_POST["pizza"];        
            $order["Bezorgen"] = $afhaalBezorgen;
            $order["Option"] = $pizza;

            #zoek op de prijs in $pizzaPrijs en voeg deze to aan $order
            if($pizza == "margarita" ){
                $order["Prijs"] = $pizzaPrijsLijst["Margarita"];
            }
            elseif($pizza == "funghi"){
                $order["Prijs"] = $pizzaPrijsLijst["Funghi"];
            }
            elseif($pizza == "marina"){
                $order["Prijs"] = $pizzaPrijsLijst["Marina"];
            }
            elseif($pizza == "hawai"){
                $order["Prijs"] = $pizzaPrijsLijst["Hawai"];
            }
            elseif($pizza == "quattro"){
                $order["Prijs"] = $pizzaPrijsLijst["Quattro Formaggi"];
            }
            
            

          

        }
        print_r($order)
    ?>
</body>
</html>