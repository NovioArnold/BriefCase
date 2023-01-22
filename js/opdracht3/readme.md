# Memory game

#data structure for the game

```bash
❯ tree
.
├── assets
│   ├── audio
│   │   ├── 1fail.aif
│   │   ├── 1fail.wav
│   │   ├── 2success.aif
│   │   ├── 2success.wav
│   │   ├── 3background.aif
│   │   └── 3background.wav
│   └── images
│       ├── 1.png
│       ├── 2.png
│       ├── 3.png
│       ├── 4.png
│       ├── 5.png
│       ├── 6.png
│       ├── 7.png
│       ├── 8.png
│       ├── back_of_card.jpg
│       └── python-logo-master-v3-TM-flattened.png
├── css
│   ├── playField.css
│   └── styles.css
├── index.html
├── js
│   ├── cardArray.js
│   ├── checkClickedCard.js
│   ├── countClicks.js
│   ├── getRandomInt.js
│   ├── randomThaCards.js
│   ├── renderPlayingField.js
│   ├── shuffleCards.js
│   └── var.js
├── readme.md
└── tree.txt

6 directories, 31 files

```
## index.html

```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/playField.css">
    <title>Memory</title>
    <script src="js/var.js"></script>
    <script src="js/checkClickedCard.js"></script>
    <script src="js/randomThaCards.js"></script>
    <script src="js/getRandomInt.js"></script>
    <script src="js/shuffleCards.js"></script>
    <script src="js/cardArray.js"></script>
    <script src="js/renderPlayingField.js"></script>
    <script src="js/resetGame.js"></script>
    <script src="js/countClicks.js"></script>
    
    



</head>
<body>
    <h1 class="nav-item title">Memory the game </h1>
    <nav class="nav">
        
        <div class="nav-right">
        <audio src="./assets/audio/3background.wav" autoplay loop controls id="background">background music on/off</audio>
        <a href="readme.html" class="nav-item" target=_blank >Documentation</a>
        </div>
    </nav>
    <!-- <div class="memory-container">
        <h1>Memory</h1>
        
        <input type="button" value="" id="kaart1" class="memory-card" onclick="checkClickedCard(1, 'kaart1')";  />
        <input type="button" value="" id="kaart2" class="memory-card" onclick="checkClickedCard(2, 'kaart2')";  />
        <input type="button" value="" id="kaart3" class="memory-card" onclick="checkClickedCard(1, 'kaart3')"; />
        <input type="button" value="" id="kaart4" class="memory-card" onclick="checkClickedCard(2, 'kaart4')"; />
    </div> -->
    
    <div class="playfield" id="play-field"></div>
    <p class="rounds-played" id="rounds-played">Number of rounds played is: <span id="rounds-played-data"></span></p>
    <INPUT TYPE=”button” onClick='history.go(0)' VALUE=Refresh>
   

    <div id="msg" class="msg"></div>
    <audio src="./assets/audio/2success.wav" id="succes"></audio>
    <audio src="./assets/audio/3fail.wav" id="fail"></audio>

<script>
    renderPlayingField(randomThaCards())
</script>


</body>
</html>

```
<hr>

## Javascript

### cardArray.js
Een array van alle memory kaarten, je kan simpel meer kaarten aan het spel toevoegen door plaatjes van 100px by 100px toe te voegen aan de folder genaamd ./assets/images/
en vervolgens deze toe te voegen aan het array

```javascript
// array of all the cards faces
// add more cards by adding them to this array

const cardArray = [
    './assets/images/1.png',
    './assets/images/2.png',
    './assets/images/3.png',
    './assets/images/4.png',
    './assets/images/5.png',
    './assets/images/6.png',
    './assets/images/7.png',
    './assets/images/8.png',

    
];

```

### checkClickedCards.js

```javascript

let rounds = count


function checkClickedCard(cardNumber, cardId){
    //checks the card that has been clicked    
    document.getElementById(cardId).disabled = true;
    //add value to card
    document.getElementById(cardId).value = cardNumber;
    //load the correct image from the asset folder cardArray.js
    document.getElementById(cardId).style = `background: url(${cardArray[cardNumber]})`;
    //Store click1 and click2
    
    if (userClick1==999) {
        userClick1 = cardNumber;
        userSelectedCard1 = cardId;
    }else{
        userClick2 = cardNumber;
        userSelectedCard2 = cardId;
    }

    //reset routine
    
    if(userClick2!=999){
        
        rounds = countClicks(rounds);
        document.getElementById('rounds-played-data').innerHTML = rounds;
        if(userClick1==userClick2){
            document.getElementById("msg").innerHTML = "goed gedaan!";
            
            soundSuccess.play();
        }else{
            soundFail.play();
            //set a sleep before turning over the cards.
            setTimeout(function(){
                document.getElementById("msg").innerHTML = "Fout";
                document.getElementById(userSelectedCard1).disabled = false;
                document.getElementById(userSelectedCard2).disabled = false;
                document.getElementById(userSelectedCard1).value = "";
                document.getElementById(userSelectedCard2).value=  "";
                document.getElementById(userSelectedCard1).style = "background: url('./assets/images/back_of_card.jpg')";
                document.getElementById(userSelectedCard2).style = "background: url('./assets/images/back_of_card.jpg')";

            }, 1000);
            console.log("setTimeout() example...");
            
        }
        userClick1 = 999;
        userClick2 = 999;

    }
}

```

### countClicks.js

Telt hoeveel rondes er gespeeld zijn.

```javascript

// counts the number of tries
function countClicks(count){
    count = count + 1;
    return count;
}

```

### getRandomInt.js

genereerd een willekeurig heel getal tussen 0 en lengte van de array

```javascript

// gets a random interger between 0 and the length of the array
function getRandomInt(arrayLength) {
    return Math.floor(Math.random() * arrayLength);
}

```

### randomThaCards.js

creeer een array met willekeurige index waardes van $cardArray twee keer omdat je een paar nodig bent van iedere kaart

```javascript

//this function generates and array of random numbers with de length of 2 * cardArray 
// for each index of cardArray there will be a single duplicate, since you need 2 cards of each to play memory.


function randomThaCards(){
    //get the length of the cardArray -1 to get all the indexes
    let numberOfDifCards = cardArray.length - 1;
    //init arrays
    let sortArray = [];
    let playArray = [];
    while (numberOfDifCards >= 0){
        //add cards to sort array * 2
        sortArray.push(numberOfDifCards);
        sortArray.push(numberOfDifCards);
        
        numberOfDifCards--;
    }
    
    //init let sortArrayLength
    let cardCounter = sortArray.length;
    // fill the playArray cards in random spots
    while (cardCounter > 0){
        //get random int and store it in item
        let item = getRandomInt(sortArray.length);
        //Push item to the play array
        playArray.push(sortArray[item]);
        //remove item from sort array
        sortArray.splice(item, 1)
        //lower cardCounter by 1
        cardCounter--;
        
    }
    //Return play array
    return playArray;

}

```
### renderPlayingfield.js

Genereert het  het speelveld

```javascript

// renders the playing field
function renderPlayingField(playArray){
    // gets the number of cards
    let cards = playArray.length;
    while (cards > 0){
        let cardIndex = cards - 1;
        // generate the html
        document.getElementById('play-field').innerHTML += 
            `<input 
            type="button" value="" 
            id="kaart${cardIndex}" 
            class="memory-card" 
            onclick="checkClickedCard(${playArray[cardIndex] 'kaart${cardIndex}')"
            />`;
        
        //removes 1 from cards
        cards--;

    }

}

```

### shuffleCards.js

Schud de kaarten.

```javascript

// shuffle the playing cards

function shuffleCards(){
    //empties div with classname memory_cards
    document.getElementById("memory_cards").innerHTML = '';
    //init array
    let cardArr = new Array();
    //fill cardArr with pairs of cards
     for(index=0; index<numberOfCards/2; index++){
            cardsArr.push(index);
            cardsArr.push(index);
     }
    //Generate html for each card
    while(cardsArr.length>0){
        let randomNumber =getRandomInt(cardsArr.length);
        document.getElementById('memory_cards').innerHTML +=
        '<input type="button" value="' + 
        cardArr[randomNumber] +
        '" id="kaart' + cardArr.length +
        '" class="memory-card" onclick="checkClickedCard(' +
        cardArr[randomNumber] + ', \'kaart' + cardArr.splice(randomNumber,1);
    }
}

```

### var.js

Configuratie van het het spel

```javascript

//Game Setup

//init userClicks
let userClick1 = 999;
let userClick2 = 999;

//init userSelectedCard to an empty string
let userSelectedCard1 = "";
let userSelectedCard2 = "";

//init counter
let count = 0;

//for use in 1st part of the assignment
const numberOfCards = 4;

//image for the back of the playing cards.
let back_of_card = './assets/images/back_of_card.jpg';

//init of the sounds
let soundSuccess = new Audio('./assets/audio/2success.wav');
let soundFail = new Audio('./assets/audio/1fail.wav');

```

<i>Author: Arnold Hilberink <br>
<i><a href="https://github.com/NovioArnold/BriefCase">GitHub</a> <br> <a href="http://www.hilberinkmedia.nl"> Website</a><br>
<i>Version: 202301151345
