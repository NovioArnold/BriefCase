//main game loop
rounds =  numberOfRounds - 1;   
function main(){
            
              
        
    //main game logic
    //get choices
    
    var value = notNull(document.getElementById('player-choice').value);
    

    var computerChoice = getRandomInt(gameOptions.length -1);
    //print the computers choice to the screen
    document.getElementById("comp-choice").innerHTML = `<p>The computers choice is: ${gameOptions[computerChoice]}</p>`; 
    
      
    var compval = compareChoice(compareToArray(value, gameOptions,), computerChoice);
    if (compval === 'player'){
        playerWins = playerWins + 1;
    }
    if (compval === 'computer'){
        computerWins = computerWins + 1;
    }
    //TODO: - create render html. elementid score & rounds to go      
    //alert('the score is: player'+playerWins+' computer'+computerWins);
    document.getElementById('score').innerHTML= `<p>the score is: player ${playerWins} vs computer ${computerWins}</p>`;
    //alert (rounds-1 +' to go!')
    document.getElementById('rounds').innerHTML = `<p>Round ${numberOfRounds - rounds} of ${numberOfRounds} `;
    if (rounds == 0){
            
            
        if (playerWins > computerWins){
            document.getElementById('winner-card').innerHTML = `<p>you have won with a score of ${playerWins} to ${computerWins} </p>`;
        }
        else if (computerWins > playerWins){
            document.getElementById('winner-card').innerHTML = `<p>computer has won with a score of ${playerWins} to ${computerWins} </p>`;
        }
        else{
            document.getElementById('winner-card').innerHTML = `<p>its a draw with a score of ${playerWins} to ${computerWins}</p>`;
        }
        
        document.getElementById('submit').setAttribute('disabled', true);  
    }
        
    

   
    rounds--;
}