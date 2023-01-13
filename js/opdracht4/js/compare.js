function compareChoice(playersChoice, computerChoice, playerWins, computerWins){
    
    //wins
    if (playersChoice  == 0 && computerChoice == 2){
        document.getElementById('winner-card').innerHTML= '<p>you win</>';
        
        return 'player';  
    }
    else if (playersChoice  == 1 && computerChoice == 0){
        document.getElementById('winner-card').innerHTML= '<p>you win</p>';
        return 'player';
    }
    else if (playersChoice  == 2 && computerChoice == 1){
        document.getElementById('winner-card').innerHTML= '<p>you win</p>';
        return 'player';
    }
    //draw
    else if (playersChoice  == 0 && computerChoice == 0){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
       
        return ;  
    }
    else if (playersChoice  == 1 && computerChoice == 1){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
        
        return;  
    }
    else if (playersChoice  == 2 && computerChoice == 2){
        document.getElementById('winner-card').innerHTML= '<p>its a draw</p>';
       
        return;  
    }else{
    //loose            
        
        document.getElementById('winner-card').innerHTML= '<p>you loose</p>';
        return 'computer'
    }

    
}