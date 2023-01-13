
//makes sure that a choice has been selected
function notNull(value){
    if (value != 'default'){
        return value;
    }
    else{
        
        alert('no choice made')
        location.reload()
    }
}
