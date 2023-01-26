# Rock, Paper, and scissors

## Document structure:

```bash
>tree
.
├── assets
│   ├── paper.png
│   ├── rock.png
│   └── scissors.png
├── css
│   └── styles.css
├── index.html
├── js
│   ├── array.js
│   ├── compare.js
│   ├── compareToArray.js
│   ├── getRandomInt.js
│   ├── main.js
│   ├── notNull.js
│   └── variables.js
├── readme.md
└── tree.txt

4 directories, 13 files
```

# index.html

hoofpagina
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock, paper, scissors</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="./js/array.js"></script>
    <script src="./js/getRandomInt.js"></script>
    <script src="./js/variables.js"></script>
    <script src="./js/compareChoice.js"></script>
    <script src="./js/compareToArray.js"></script>
    <script src="./js/notNull.js"></script>
    <script src="./js/main.js"></script>

    
    
</head>

<nav>
    <h1 class="title">Rock, Paper, and Scissors Game</h1>
    <a class='nav-item 'href="readme.html">Documentation</a></nav>
<hr>
<body><div id="game" class="game"></div>
    <select name="option" id="player-choice">
        <option value="default">make choice</option>
        <option value="rock">rock</option>
        <option value="paper">paper</option>
        <option value="scissors">scissors</option>
    </select>
    <input type="button" value="submit" id="submit" name="submit" onClick=main()>
    <input type="button" value="reset" name="reset" onClick=location.reload()>
    <div class="card" id="card">
         <div id="comp-choice"></div><div id="score"></div><div id="rounds"></div><div id="winner-card"></div>
    </div>
</body>
</html>

```

## array.js

spel opties

```javascript
//Array of game options in this case the choices
const gameOptions = ['rock','paper','scissors'];
```

## main.js

dit is de spel routine.
1. spelers keuze
2. computers keuze
3. check wie de winnaar is  --> zou in een v.2.0 een apparte functie worden. Voorbeeld:

```javascript
let compval = whoWins();
# adds the points to the correct winner.
```

4. print de scoreboard -> zou in een v.2.0 een screencard apparte functie worden.

```javascript
generateScoreCard();

```


```javascript

//main game loop
rounds = numberOfRounds - 1;
function main(){
    //main game logic

    //get players choice
    var value = notNull(document.getElementById('player-choice').value);
    
    //get computers choice
    var computerChoice = getRandomInt(gameOptions.length -1);
    //print the computers choice to the screen
    document.getElementById("comp-choice").innerHTML = `<p>The computers choice is: ${gameOptions[computerChoice]}</p>`; 
    
    //sees who wins the computer or the player
    var compval = compareChoice(compareToArray(value, gameOptions,), computerChoice);
    if (compval === 'player'){
        playerWins = playerWins + 1;
    }
    if (compval === 'computer'){
        computerWins = computerWins + 1;
    }
    //Print the scoreboard
    document.getElementById('score').innerHTML= `<p>the score is: player ${playerWins} vs computer ${computerWins}</p>`;
    //alert (rounds-1 +' to go!')
    document.getElementById('rounds').innerHTML = `<p>Round ${numberOfRounds - rounds} of ${numberOfRounds} `;
    if (rounds == 0){
            
        //genertate end screen card 
        if (playerWins > computerWins){
            document.getElementById('winner-card').innerHTML = `<p>you have won with a score of ${playerWins} to ${computerWins} </p>`;
        }
        else if (computerWins > playerWins){
            document.getElementById('winner-card').innerHTML = `<p>computer has won with a score of ${playerWins} to ${computerWins} </p>`;
        }
        else{
            document.getElementById('winner-card').innerHTML = `<p>its a draw with a score of ${playerWins} to ${computerWins}</p>`;
        }
        
        document.getElementById('submit').setAttribute('disabled', true);  
    }
        
    

   
    rounds--;
}
```

## compareChoice.js

vergelijkt de speler zijn keuze met die van de computer

```javascript
function compareChoice(playersChoice, computerChoice, playerWins, computerWins){
    //this function compares the players choice with that of the computer.
    //wins
    if (playersChoice  == 0 && computerChoice == 2){
        document.getElementById('winner-card').innerHTML= '<p>you win</>';
        
        return 'player';  
    }
    else if (playersChoice  == 1 && computerChoice == 0){
        document.getElementById('winner-card').innerHTML= '<p>you win</p>';
        return 'player';
    }
    else if (playersChoice  == 2 && computerChoice == 1){
        document.getElementById('winner-card').innerHTML= '<p>you win</p>';
        return 'player';
    }
    //draw
    else if (playersChoice  == 0 && computerChoice == 0){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
       
        return ;  
    }
    else if (playersChoice  == 1 && computerChoice == 1){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
        
        return;  
    }
    else if (playersChoice  == 2 && computerChoice == 2){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
       
        return;  
    }else{
    //loose            
        
        document.getElementById('winner-card').innerHTML= '<p>you loose</p>';
        return 'computer'
    }

    
}
```

## compareToArray.js

zoekt de naam van de computers keuze bij de random int 

```javascript
//lookup the random int value for the computers choice in table array called gameOptions
function compareToArray(value, array){
    for(i in array){
        if (array[i] == value){
            return i;
        }
    }
}
```

## getRandomInt.js

genereerd een willekeurige int met een waarde die de lengete van het array heeft incl 0

```javascript
// random generator of an integer thats between 0 and the length of the array
function getRandomInt(array) {
    return Math.floor(Math.random() * array);
}

```

## notNull.js

controleerd of de speler een keuze heeft gemaakt

```javascript

//makes sure that a choice has been selected
function notNull(value){
    if (value != 'default'){
        return value;
    }
    else{
        
        alert('no choice made')
        location.reload()
    }
}

```

## variables.js

spel data

```javascript
//stores the players choice
let playersChoice = 0;
//stores the computers choice
let computerChoice = 0;
//the number of rounds that will be played
const numberOfRounds = 3;
//the computers score
let computerWins = 0;
//the players score
let playerWins = 0;
```
