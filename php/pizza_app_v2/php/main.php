<?php
     #event button press 'berekenen
if(isset($_POST["bereken"])){
    
    #add data to $orderlijst array key[0] 
    $orderlijst[0]['Ordernummer'] = $_SERVER['REQUEST_TIME'];
    $orderlijst[0]['Naam'] = htmlspecialchars($_POST["name"]);
    $orderlijst[0]['Adres'] = htmlspecialchars($_POST["address"]);
    $orderlijst[0]['Postcode'] = htmlspecialchars($_POST["postcode"]);
    $orderlijst[0]['Woonplaats'] = htmlspecialchars($_POST["city"]);
    $orderlijst[0]['Bezorgen'] = htmlspecialchars($_POST["deliver"]); 
    $orderlijst[0]['Datum'] = date('d-m-y');

    #gett number of puzza's ordered
    $pizza_in_basket = [
        '0' => htmlspecialchars($_POST["aantal0"]),
        '1' => htmlspecialchars($_POST["aantal1"]),
        '2' => htmlspecialchars($_POST["aantal2"]),
        '3' => htmlspecialchars($_POST["aantal3"]),
        '4' => htmlspecialchars($_POST["aantal4"]),
    ];
    #Chcck if day is pizza day
    if ($day === $pday){
        for ($x = 0; $x < count($bestellijst); $x++){
        
            
            $bestellijst[$x]['Prijs per stuk'] = $pday_price;
        }

    
    }
}


    
    #calculate total price per pizza kind ordered
    $total_price_per_pizza = calc_total_pizza_price($bestellijst, $pizza_in_basket);
    #append pizza if number of ordered pizza is greater than 0
    $orderlijst['Bestelde pizzas'] = append_kind_to_order($total_price_per_pizza, $pizza_in_basket, $bestellijst);
    #calculate total price of all pizza's after pizza day and befor discount/delivery
    $total_pizza_price = sum_of_array($total_price_per_pizza);
    #check if its a discount day and the the min value is reached
    if ($day === $d_day1 or $day === $d_day2){
        #berekenen van het totaal bedrag van de weekend korting.(voor bezorgkosten)
        if ($total_pizza_price > $minimal_eligable_for_discount){
                $discounted = $total_pizza_price * $discount;
                $total_price_discounted = number_format($total_pizza_price - $discounted,2 , '.', '');
                
            }
        else{
            $total_price_discounted = $total_pizza_price;
        }
        
    }
    
   

  
    


