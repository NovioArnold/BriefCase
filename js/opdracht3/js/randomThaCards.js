
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
    sortArray.forEach( (card) => {
        //let item = sortArray[Math.floor(Math.random()*sortArray.length)];
        let item = Math.floor(Math.random() * sortArray.length)
        console.log(item);
        //console.log(sortArray[item]);
        playArray.push(sortArray[item]);

        //console.log(playArray);
        sortArray.splice(item, 1);
        alert(sortArray.length);
        console.log(sortArray);
        
    })
    alert(playArray);
    
    
    return playArray;

}