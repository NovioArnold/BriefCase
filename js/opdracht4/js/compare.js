function compareChoice(playersChoice, computerChoice, playerWins, computerWins){
    
    //wins
    if (playersChoice  == 0 && computerChoice == 2){
        alert ('you win');
        
        return 'player';  
    }
    if (playersChoice  == 1 && computerChoice == 0){
        alert ('you win');
        return 'player';
    }
    if (playersChoice  == 2 && computerChoice == 1){
        alert ('you win');
        return 'player';
    }
    //draw
    if (playersChoice  == 0 && computerChoice == 0){
        alert ('its a draw');
        return ;  
    }
    if (playersChoice  == 1 && computerChoice == 1){
        alert ('its a draw');
        return;  
    }
    if (playersChoice  == 2 && computerChoice == 2){
        alert ('its a draw');
        return;  
    }else{
    //loose            
        alert ('you loose');
        return 'computer'
    }

    
}