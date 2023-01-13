
<?php
#include all needed php helpers here:
include 'php/array.php';  
include 'php/variables.php';  
include 'php/helpers.php';
include 'php/constructors.php';
include 'php/main.php';
?>
<style>
    h3{
        margin-top: -4px;
    }
    ul{
        list-style: none;
    }
    section{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 1000px;
        margin: 0 auto;
        border: 2px solid black;
        padding: 10px;
        background-color: #f1f2f3;
    }
    h1{
        text-align: center;
        font-size: 4vh;
        

    }
    body{
        background-image: url('./assets/pizza-2068272.jpg');
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza App</title>
</head>
<body>
    <section>
        <h1 class="title">welkom bij Pizza di Silicone</h1>
        <p class="sub"><?php  
        if ($day === $pday){echo '<h1>Het is PIZZA Dag alle pizzas '.$pday_price.' per stuk</h1>';}
        if ($day === $d_day1 or $day === $d_day2){echo '<h1>Het is weekend, bij een besteding van minimaal ' .$minimal_eligable_for_discount .' euro krijg je ' .($discount * 100).'% korting</h1>';}
        ?></p>
    </section>
</body>
</html>