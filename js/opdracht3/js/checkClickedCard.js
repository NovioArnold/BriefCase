
let rounds = count
let backgroundMusic = './assets/audio/3background.wav'
let soundSuccess = new Audio('./assets/audio/2success.wav')
let soundFail = new Audio ('./assets/audio/1fail.wav')

function checkClickedCard(cardNumber, cardId){
    //var backgroundMusic = document.createElement('audio');
    //backgroundMusic.src = './assets/audio/3background.wav';
    //console.log(backgroundMusic.src);
    //document.getElementById('backgroundMusic').play();
    //Disable selected card, you can only click once on the selected card.
    
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
            setTimeout(function(){
                document.getElementById("msg").innerHTML = "Fout";
                document.getElementById(userSelectedCard1).disabled = false;
                document.getElementById(userSelectedCard2).disabled = false;
                document.getElementById(userSelectedCard1).value = "";
                document.getElementById(userSelectedCard2).value=  "";
                document.getElementById(userSelectedCard1).style = "background: url('./assets/back_of_card.jpg')";
                document.getElementById(userSelectedCard2).style = "background: url('./assets/back_of_card.jpg')";
                soundFail.play();

            }, 1000);
            console.log("setTimeout() example...");
            
        }
        userClick1 = 999;
        userClick2 = 999;

    }
}