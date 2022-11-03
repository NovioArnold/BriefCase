<?php

$pizzaPrijsLijst = array(
    #"soort" => "prijs",
    "Margarita" => "12.50",
    "Funghi" => "12.50",
    "Marina" => "13.95",
    "Hawai" => "11.50",
    "Quattro Formaggi" => "14.50"
);

$pizzaOrderLijst = array(
    #"soort" => "aantal",
    "Margarita" => "1",
    "Funghi" => "2",
    "Marina" => "3",
    "Hawai" => "4",
    "Quattro Formaggi" => "5"
);


$prijzen = array_values($pizzaPrijsLijst);
$aantal = array_values($pizzaOrderLijst);
$totaalAantalPizzas = array_sum($aantal);

function multi_arrays($array1, $array2) {
    $array = array();
    foreach($array1 as $index => $value) {
        $array[$index] = isset($array2[$index]) ? $array2[$index] * $value : $value;
    }
    return $array;
}

$totaalBedragPerPizza = multi_arrays($prijzen, $aantal);
print_r($totaalBedragPerPizza);
echo ($totaalAantalPizzas);
$datenow= date('d-m-y');

echo   $datenow;

$bestellijst = [
    [
        'Soort pizza' => 'Margarita', 'Prijs per stuk' => '12.50', 'Aantal' => '0', 'totaal' => "0"
    ],
    [
        'Soort pizza' => 'Fungi', 'Prijs per stuk' => '12.50', 'Aantal' => '0', 'totaal' => "0"
    ],

    [
        'Soort pizza' => 'Marina', 'Prijs per stuk' => '13.95', 'Aantal' => '0', 'totaal' => "0"
    ],
    [
        'Soort pizza' => 'Hawai', 'Prijs per stuk' => '11.50', 'Aantal' => '0', 'totaal' => "0"
    ],
    [
        'Soort pizza' => 'Quattro Formaggi', 'Prijs per stuk' => '14.50', 'Aantal' => '0', 'totaal' => "0"
    ]
    ];

$klantBestand=[
    
    [
        "ordernummer" =>  $_SERVER['REQUEST_TIME'],  'Naam'=> '', 'Adres' => '', 'Postcode' => '', 'Woonplaats' => '', 'Besteldatum' => date('d-m-y'), 'Bezorgen' => ''
    ]
];

$test = array_values($bestellijst[0]);
print_r($test);
?>

<?php if (count($bestellijst) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($bestellijst))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($bestellijst as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>


<?php if (count($klantBestand) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($klantBestand))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($klantBestand as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>