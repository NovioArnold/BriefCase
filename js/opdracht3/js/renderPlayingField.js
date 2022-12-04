function renderPlayingField(){
    let c = playArray.length;
    while (c > 0){
        document.getElementById('playfield').innerHTML += `<input type="button" value="" id="kaart${c}" class="memory-card" onclick="checkClickedCard('kaart${c}')";>`;
        c--;
    }
}