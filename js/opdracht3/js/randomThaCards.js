
function randomThaCards(){
    //get the length of the cardArray
    let numberOfDifCards = cardArray.length - 1;
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
    console.log(sortArray);
    //while loop that adds cards to the play array and pops them from sortarray
    while (sortArray.length >= 0){
        var item = sortArray[Math.floor(Math.random()*sortArray.length)];
        alert(item);
        playArray.push(item);
        sortArray.splice(item);}
    
    
    return playArray;

}