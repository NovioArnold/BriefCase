// renders the playing field
function renderPlayingField(playArray){
    // gets the number of cards
    let cards = playArray.length;
    while (cards > 0){
        // i is the index number
        let i = cards - 1;
        
        document.getElementById('play-field').innerHTML += `<input type="button" value="" 
        id="kaart${cards}" 
        class="memory-card" onclick="checkClickedCard(${playArray[i]}, 'kaart${cards}')";>`;
        
        
        cards--;

    }

}