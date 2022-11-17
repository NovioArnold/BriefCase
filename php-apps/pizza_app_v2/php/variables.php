<?php

#variables
#gets day of the week
$day = date('D');
#pizza day variables
$pday = 'Vri';
$pday_price = 7.50;
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
$total_price_discounted = 0;
#make copy of master bestellijst array
$bestellijst = $bestellijst_original;