// renders the playing field
function renderPlayingField(playArray){
    // gets the number of cards
    let cards = playArray.length;
    while (cards > 0){
        // i is the index number
        let i = cards - 1;
        // generate the html
        document.getElementById('play-field').innerHTML += `<input type="button" value="" 
        id="kaart${i}" 
        class="memory-card" onclick="checkClickedCard(${playArray[i]}, 'kaart${i}')";>`;
        
        //removes 1 from cards
        cards--;

    }

}