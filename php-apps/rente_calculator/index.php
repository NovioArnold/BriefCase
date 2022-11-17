<?php
# variables
$jaar = 10;
$verdubbelaar = 2;

#my little helpers
#checked input  een getal is
function check_input($item){
    if (is_numeric($item)){
        $new_item =  number_format($item, 2,'.','');
        return $new_item;
    }
    else {
        echo "$item is not a number";
    }

}
#berekend de rente
function bereken_rente($inleg, $rente){
    $i = check_input($inleg);
    $r = check_input($rente);
    $totaal =number_format($i *(1 + $r/100), 2, '.', '');
    #echo "$inleg <br> $rente <br> $totaal <br>";
    return $totaal;
}


#Bouwt tabel op
function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<thead>';
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';
    $html .= '</tehad>';
    $html .= '<tbody>';

    // data rows
    foreach($array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';

    }
    $html .= '</tbody>';
    return $html;
}
#Rente over x jaar
function rente_over_x_jaar($jaar, $inleg, $rente){
    $array = [];
    $index = 1;
    $val = $inleg;
    while ($jaar >0){
        #echo "$jaar <br> $inleg <br>  $rente <br>";
        $val2 = check_input(bereken_rente($val, $rente));
        
        $tmp = ['jaar' => $index, 'bedrag' => $val2];
        array_push($array,$tmp  );
        $index++;

        $val = $val2;
        $jaar = $jaar - 1;
    }
    #print_r($array);
    echo build_table($array);

}
#Verdubbelaar
function eindbedrag_verdubbeld($inleg, $rente, $verdubbelaar){
    #echo "inleg:$inleg ,rente:$rente, Verdubbelaar:$verdubbelaar";
    $eindbedrag = $inleg * $verdubbelaar;
    $array = [];
    $index = 1;
    $val = $inleg;
    while ($val < $eindbedrag){
        $val2 = check_input(bereken_rente($val, $rente));
        #echo "$val <br> $eindbedrag <br>";
        $tmp = ['jaar' => $index, 'bedrag' => $val2];
        array_push($array,$tmp);
        $index++;

        $val = $val2;


    }
    echo build_table($array);
}
        

#main php loop
if(isset($_POST["bereken"])){    
    $inleg = check_input(htmlspecialchars($_POST['inleg']));
    $rente = check_input(htmlspecialchars($_POST['rente']));
    $eindbedrag = htmlspecialchars($_POST['eindbedrag']);
    #echo $eindbedrag;
    
    
    #radio check    
    if ($eindbedrag == 'rente'){
        $bedrag = rente_over_x_jaar($jaar, $inleg, $rente);
        #print_r(build_table($bedrag));
        #echo build_table($bedrag);

    }
    if ($eindbedrag == 'verdubbeld'){
        $bedrag = eindbedrag_verdubbeld($inleg, $rente, $verdubbelaar);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rente calulator</title>
</head>
<body>
    <form action="" method="POST" class="rente">
        <label for="inleg">Ingelegd bedrag:</label>
        <input type="text" name="inleg" id="inleg" required>
        <label for="rente">Rentpercentage:</label>
        <input type="text" name="rente" id="inleg" required>
        <label for="rente">Eindbedrag na 10 jaar</label>
        <input type="radio" name="eindbedrag" id="rente" value="rente">
        <label for="rente">Eindbedrag verdubbeld</label>
        <input type="radio" name="eindbedrag" id="verdubbled" value="verdubbeld">
        <button type="submit" name="bereken" id="bereken">Berekenen</button>
    </form>
</body>
</html>