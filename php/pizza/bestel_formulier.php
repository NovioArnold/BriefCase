<?php
$bestellijst = [
    [
        'Soort pizza' => 'Margarita', 'Prijs per stuk' => '12.50'
    ],
    [
        'Soort pizza' => 'Fungi', 'Prijs per stuk' => '12.50'
    ],

    [
        'Soort pizza' => 'Marina', 'Prijs per stuk' => '13.95'
    ],
    [
        'Soort pizza' => 'Hawai', 'Prijs per stuk' => '11.50'
    ],
    [
        'Soort pizza' => 'Quattro Formaggi', 'Prijs per stuk' => '14.50'
    ]
];

$basket = [];



$orderlijst = [
    
    [
        
        'Ordernummer' => ' ', 'Naam' => ' ', 'Adres' => ' ', 'Postcode' => ' ', 'Woonplaats' => ' ', 'Bezorgen' => ' ', 'Datum' => ' '
    ],
    'bestelde pizzas' => [],

    ];
$pizza_day = 'Mon';
$pizza_day_price = 7.50;
$minimal_eligable_for_discount = 20;
$discount = .15;
$deliver_cost = 5.00;



if(isset($_POST["bereken"])){
    #add data to order array [0]
    $orderlijst[0]['Ordernummer'] = $_SERVER['REQUEST_TIME'];
    $orderlijst[0]['Naam'] = htmlspecialchars($_POST["name"]);
    $orderlijst[0]['Adres'] = htmlspecialchars($_POST["address"]);
    $orderlijst[0]['Postcode'] = htmlspecialchars($_POST["postcode"]);
    $orderlijst[0]['Woonplaats'] = htmlspecialchars($_POST["city"]);
    $orderlijst[0]['Bezorgen'] = htmlspecialchars($_POST["deliver"]); 
    $orderlijst[0]['Datum'] = date('d-m-y');
    #print_r($orderlijst);
    
    #my little helpers
    #sum of an array
    function sum_of_array($array){
        return array_sum($array);
       }
    
    function get_value($array){
        return array_values($array);
    }
    
    #Total price calculator
    function calc_total_pizza_price($array, $pizza_in_basket){
        
        $total_price = [];
        $index = 0;
        foreach ($array as $key => $value){
            
        #var_dump( $value['Prijs per stuk'] * $pizza_in_basket[$index]);
            array_push($total_price, $value['Prijs per stuk'] * $pizza_in_basket[$index]);
            $index ++;
        }
        return $total_price;
    }
    #genrate ass array for each kind of pizza
    function append_kind_to_order($total_price_per_pizza, $pizza_in_basket, $bestellijst){
        foreach($pizza_in_basket as $key => $value){
            #var_dump($value);
            $array = [];
            if ($value > 0){
                #print_r($value);
               #print_r($key);

                $temp_arr = ['Soort pizza' => $bestellijst[$key]['Soort pizza'], 'Aantal' => $pizza_in_basket[$key], $total_price_per_pizza[$key] ];
                print_r($temp_arr);
                echo "<p><br></p>";
                
                array_push($array, $temp_arr);
                print_r($array);
                
               #print_r($temp_arr);
                #echo "/n";
                
                
            }
            
        }
        
        

    }
    


    #getts number of puzza's ordered
    $pizza_in_basket = [
        '0' => htmlspecialchars($_POST["aantal0"]),
        '1' => htmlspecialchars($_POST["aantal1"]),
        '2' => htmlspecialchars($_POST["aantal2"]),
        '3' => htmlspecialchars($_POST["aantal3"]),
        '4' => htmlspecialchars($_POST["aantal4"]),
    ];
    #generate assositative array for each pizza and appends this array into $orderlijst
    #format ['pizza' => naam_pizza, 'aantal' => aantal besteld 'bedrag' => bedrag per pizza]
    

    
    #Total of pizza ordered
    $total_of_pizza = sum_of_array($pizza_in_basket);
    #Total price per pizza
    $total_price_per_pizza = calc_total_pizza_price($bestellijst, $pizza_in_basket);
    #Total price of all pizza's
    $total_pizza_price = sum_of_array( $total_price_per_pizza);
    #append pizza to $orderlijst if $value > 0
    
    append_kind_to_order($total_price_per_pizza, $pizza_in_basket, $bestellijst);
    #var_dump($orderlijst);
    #Delivery cost applied
    if ($orderlijst[0]['Bezorgen']==='ja');
        $total_price = $total_pizza_price + $deliver_cost;
        #print_r($total_price);
   
    #Day of the order
    #print_r($datum);
    $day = date('D');
    if ($day === $pizza_day){
        #berekend het totaal bedrag voor de promodag(voor bezorgkosten)
        $price = sum_of_array($pizza_in_basket) * $pizza_day_price;
        return $price;
    }
    elseif ($day === 'Sat' or $day === 'Sun'){
        #berekenen van het totaal bedrag van de weekend korting.(voor bezorgkosten)
        if ($total_pizza_price > $minimal_eligable_for_discount){
                $discounted = $total_pizza_price / $discount;
                $price = $totaalBedragPizzas - $discounted;
                return $price;
            }
        else{
                return $total_pizza_price;
        }
    }
    
    
   



    

    #check if the orderdate is on $pizza_day -> all pizzas price = $pizza_day_price
        #$total_pizza_price = $sum_of_all_pizzas * $pizza_day_price
    #check if the orderdate is $discountday(array of days ie ['sat', 'sun']) if so 
        # caluclate discount if $total_pizza_price > $minimal_eligable_for_discount
            # total_pizza_price = total_pizza_price - (total_pizza_price * $discount)
    #check if de deliver flag is set $deliver_cost
    #calulate btw of order
    #total priz of oreder
}

?>
<style>
    .container
    
    {
        display: flex;
        flex-direction: row;
        max-width: 1000px;
        min-width: 400px;
        margin: 0 auto;
        justify-content: center;
    }
     
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellijst</title>
</head>
<body>
    <div class="conainer">
        <section class="heading">
            <h1 class="name-company">Pizza di Silicone</h1>
            <p class="subtitle">The most 42ish pizza's on the web</p>
        </section>
        <section class="orderform">
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
                    <select name="deliver" id="deliver" class="deliver">
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
                            <td class="record_data"><input type="number" name="aantal0" id="aantal0" min="0" max="10"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[1]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[1]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal1" id="aantal1" min="0" max="10"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[2]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[2]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal2" id="aantal2" min="0" max="10"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[3]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[3]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal3" id="aantal3" min="0" max="10"></td>
                            
                        </tr>
                        <tr class="table_record">
                            <td class="record_data"><?php echo $bestellijst[4]['Soort pizza'] ?></td>
                            <td class="record_data"><?php echo $bestellijst[4]['Prijs per stuk'] ?></td>
                            <td class="record_data"><input type="number" name="aantal4" id="aantal4" min="0" max="10"></td>
                            
                        </tr>
                        </tbody>
                        
                    </table>
                </section>
                <button type="submit" name="bereken" id="bereken">Bereken totaalbedrag</button>

            </form>
        </section>
        <section>
        <?php echo "pizza: $total_pizza_price + bezorgosten: $deliver_cost = Te Betalen $total_price" ?>
        <?php print_r($orderlijst)?>
        <?php if (count($orderlijst) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($orderlijst))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($orderlijst as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
        
        </section>
    </div>
</body>
</html>