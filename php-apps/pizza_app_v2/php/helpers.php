<?php

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


 #sum of an array
 function sum_of_array($array){
    return array_sum($array);
 }
    
        

