<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taal selector</title>
</head>
<body>

    <form method="post" action="">
        naam: <input type="text" name="naam" placeholder="Uw naam" required/> <br>
        land:
        <select name="land">
            <option value="NL">Nederland</option>
            <option value="DE">Duitsland</option>
            <option value="EN">Engels</option>
        </select>
        <br>
        <input type="submit" name="submit" value="gegevens versturen" />
    </form>

    <?php 
        if(isset($_POST["submit"])){
            $naam = $_POST["naam"] ;
            $land = $_POST["land"] ;
            if($land=='NL'){
                echo 'Goedemorgen ' .$naam;
            }
            elseif($land=='DE'){
                echo 'Guten Morgen ' .$naam;
            }
            elseif($land=="EN"){
                echo 'Goodmorning ' .$naam;
            }
        }
    ?>
</body>
</html>