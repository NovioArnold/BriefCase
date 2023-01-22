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
