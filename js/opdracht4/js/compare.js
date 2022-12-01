function compareChoice(playersChoice, computerChoice, playerWins, computerWins){
    
    //wins
    if (playersChoice  == 0 && computerChoice == 2){
        document.getElementById('winner-card').innerHTML= '<p>you win</>';
        
        return 'player';  
    }
    else if (playersChoice  == 1 && computerChoice == 0){
        document.getElementById('winner-card').innerHTML= '<p>you win</>';
        return 'player';
    }
    else if (playersChoice  == 2 && computerChoice == 1){
        document.getElementById('winner-card').innerHTML= '<p>you win</>';
        return 'player';
    }
    //draw
    else if (playersChoice  == 0 && computerChoice == 0){
        //alert ('its a draw');
        return ;  
    }
    else if (playersChoice  == 1 && computerChoice == 1){
        //alert ('its a draw');
        return;  
    }
    else if (playersChoice  == 2 && computerChoice == 2){
        alert ('its a draw');
        return;  
    }else{
    //loose            
        //alert ('you loose');
        return 'computer'
    }

    
}