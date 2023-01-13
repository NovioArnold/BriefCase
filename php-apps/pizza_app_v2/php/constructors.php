<?php

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
#Builds totals table
function build_totals_table($deliver_cost, $total_pizza_price, $orderlijst){
    $html = '';
    $html .= '</table>';
    $html .= '<table> <tr><th>Type</th><th>bedrag</th></tr>';
    if ($orderlijst[0]["Bezorgen"] === 'ja')
    {$html .= '<tr><td>Bezorgkosten: € </td><td>'.  $deliver_cost .'</td></tr>';}
    $html .= '<tr><td>Totaal bedrag: €</td><td>'. round($total_pizza_price, 2) .'</td></tr>';
    $html .= '</table>';
    return $html;
}

