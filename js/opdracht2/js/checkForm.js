// check if the given answer is correct

function checkForm(dict){
    let awns = ''
    
    for (vraag in dict){
        
        let awn = ''
        let vrg = document.getElementById(vraag).value;
        console.log(vraag)
        console.log(vrg)
        if (vrg == dict[vraag].andwoord){
            awn =  vrg +' is het juiste andwoord';
        }
        else{
            awn =  vrg +' is niet het juiste andwoord, het juiste andwoord is: '+dict[vraag].andwoord;
        }
    awns = awns +'<br>'+ awn;
    console.log(awns);
    document.getElementById("andwoorden").innerHTML = awns;
    }
}