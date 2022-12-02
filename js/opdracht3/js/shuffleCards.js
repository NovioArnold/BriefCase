function shuffleCards(){
    document.getElementById("memory_cards").innerHTML = '';
    cardArr = new Array();
     for(i=0; i<numberOfCards/2; i++){
            cardsArr.push(i);
            cardsArr.push(i);
            console.log(cardsArr)
     }
    while(cardsArr.length>0){
        var randomNumber =getRandomInt(cardsArr.length);
        document.getElementById('memory_cards').innerHTML +=
        '<input type="button" value="' + 
        cardArr[randomNumber] +
        '" id="kaart' + cardArr.length +
        '" class="memory-card" onclick="checkClickedCard(' +
        cardArr[randomNumber] + ', \'kaart' + cardArr.splice(randomNumber,1);
    }
}