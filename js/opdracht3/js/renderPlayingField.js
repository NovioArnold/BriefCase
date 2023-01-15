// renders the playing field
function renderPlayingField(playArray){
    // gets the number of cards
    let cards = playArray.length;
    while (cards > 0){
        let cardIndex = cards - 1;
        // generate the html
        document.getElementById('play-field').innerHTML += 
            `<input 
            type="button" 
            value="" 
            id="kaart${cardIndex}" 
            class="memory-card" 
            onclick="checkClickedCard(${playArray[cardIndex]}, 'kaart${cardIndex}')"
            />`;
        
        //removes 1 from cards
        cards--;

    }

}