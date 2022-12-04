
function randomThaCards(){
    //get the length of the cardArray
    let numberOfDifCards = cardArray.length;
    let sortArray = [];
    let playArray = [];
    while (numberOfDifCards >= 0){
        //add cards to sort array * 2
        sortArray.push(numberOfDifCards);
        sortArray.push(numberOfDifCards);
        alert(numberOfDifCards);
        alert(sortArray);
        numberOfDifCards--;
    }
    //init let sortArrayLength
    let cardCounter = sortArray.length;
    
    //while loop that adds cards to the play array and pops them from sortarray
    while (cardCounter > 0){
        
        //get random number > its -1 because the length is not count 0
        var randomNumber =getRandomInt(cardCounter -1);
        //add card to playArray
        playArray.push(cardArray[randomNumber]);
        //pop randomNumber from sortArray
        sortArray.pop(randomNumber);
        cardCounter--;
    }
    
    return playArray;

}