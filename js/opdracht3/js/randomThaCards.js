//this function generates and array of random numbers with de length of 2 * cardArray 
// for each index of cardArray there will be a single duplicate, since you need 2 cards of each to play memory.


function randomThaCards(){
    //get the length of the cardArray
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