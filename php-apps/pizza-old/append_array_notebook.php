<?php
$array1 = [
    1 => 'aap',
    2 => 'noot',
    3 => []
];

$array2 = [
    1 => 'arnold',
    2 => 'is',
    3 => 'gek'
];
  
array_push($array1[3], $array2);




var_dump($array1);