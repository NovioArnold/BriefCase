<?php
#Items that can be ordered
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


$orderlijst = [
    
    [
        
        'Ordernummer' => ' ', 'Naam' => ' ', 'Adres' => ' ', 'Postcode' => ' ', 'Woonplaats' => ' ', 'Bezorgen' => ' ', 'Datum' => ' '
    ],
    'Bestelde pizzas' => [],

    ];

#variables
#gets day of the week
$day = date('D');
#pizza day variables
$pizza_day = 'Thu';
$pizza_day_price = 7.50;
#discount days variables
$d_day1 = 'Sat';
$d_day2 = 'Sun';
$minimal_eligable_for_discount = 20;
$discount = .15;
#dilivery cost
$deliver_cost = 5.00;
#__init__ of variables
$totaalBedragPizzas = 0;
$total_pizza_price = 0;
$total_price = 0;


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
    
 #-------------------------------------------------------   
    #my little helpers
    #sum of an array
    function sum_of_array($array){
        return array_sum($array);
       }
    #gets all values out of an array
    function get_value($array){
        return array_values($array);
    }
    
    #Total price calculator
    function calc_total_pizza_price($array, $pizza_in_basket){
        
        $total_price = [];
        $index = 0;
        foreach ($array as $key => $value){
            
       
            array_push($total_price, $value['Prijs per stuk'] * $pizza_in_basket[$index]);
            $index ++;
        }
        return $total_price;
    }
    #Total price calculator on pizza day
    function calc_total_pizza_day_price($pizza_day_price, $pizza_in_basket){
        
        $total_price = [];
        $index = 0;
        foreach ($pizza_in_basket as $value){
            
       
            array_push($total_price, $pizza_day_price * $pizza_in_basket[$index]);
            $index ++;
        }
        return $total_price;
    }
    #genrate ass array for each kind of pizza
    function append_kind_to_order($total_price_per_pizza, $pizza_in_basket, $bestellijst){
        $array = [];
        foreach($pizza_in_basket as $key => $value){
            
            #checks if ordered ammount per pizza is higher then 0
            if ($value > 0 ){
                #gerenerate temp array
                $temp_arr = ['Soort pizza' => $bestellijst[$key]['Soort pizza'], 'Aantal' => $pizza_in_basket[$key],'Totaal' => $total_price_per_pizza[$key] ];
                #push array onto Temp multi array $array
                array_push($array, $temp_arr);                
            }            
        }        
        return($array);
    }
    #builds a table out of an array
    function build_table($array){
        // start table
        $html = '<table>';
        // header row
        $html .= '<tr>';
        foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
        $html .= '</tr>';
    
        // data rows
        foreach( $array as $key=>$value){
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';

        }
        
    
        // finish table and return it
    
       
        return $html;
    }
    #Builds totals table
    function build_totals_table($deliver_cost, $total_pizza_price){
        $html = '';
        $html .= '</table>';
        $html .= '<table> <tr><th>Type</th><th>bedrag</th></tr>';
        $html .= '<tr><td>Bezorgkosten: € </td><td>'. $deliver_cost .'</td></tr>';
        $html .= '<tr><td>Totaal bedrag: €</td><td>'. round($total_pizza_price, 2) .'</td></tr>';
        $html .= '</table>';
        return $html;
    }
    #Is it pizza day
    function is_it_pizza_day(
        $bestellijst,
        $pizza_day,
        $pizza_day_price,
        $day    
        ){
        
        if ($day == $pizza_day){
        $lenarray = count($bestellijst);
           for($i = 0; $i <= $lenarray; $i++ ){
            $bestellijst['i']['prijs per stuk'] = $pizza_day_price;
            }

        print_r($bestellijst);    
        }
        
            

    # is it a discount day
    function is_it_a_discount_day(
        $d_day1,
        $d_day2,
        $total_pizza_price,
        $minimal_eligable_for_discount,
        $discount,
        $day,
        $totaalBedragPizzas
        
        ){

        if ($day === $d_day1 or $day === $d_day2){
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
    #test if its pizza day
    is_it_pizza_day($bestellijst,$pizza_day,$pizza_day_price, $day);
    #Total price per pizza
    $total_price_per_pizza = calc_total_pizza_price($bestellijst, $pizza_in_basket);
    #Total price of all pizza's
    $total_pizza_price = sum_of_array( $total_price_per_pizza);
    #append pizza to $orderlijst if $value > 0
    $orderlijst['Bestelde pizzas'] = append_kind_to_order($total_price_per_pizza, $pizza_in_basket, $bestellijst);
    

   
    
    #Delivery cost applied
    if ($orderlijst[0]['Bezorgen']==='ja'){
        #echo $deliver_cost;
        $total_price = $total_pizza_price + $deliver_cost;
        #print_r($total_price);
        
    }
    echo build_table($orderlijst['Bestelde pizzas']);
    echo build_totals_table($deliver_cost, $total_pizza_price);
   
   
    #Day of the order
    #print_r($datum);
    $day = date('D');
    
   
    
    
   



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
        <?php #echo "pizza: $total_pizza_price + bezorgosten: $deliver_cost = Te Betalen $total_price" ?>
        <?php #print_r($orderlijst)?>

        
        </section>
    </div>
</body>
</html>