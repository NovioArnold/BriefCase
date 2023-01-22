//lookup the random int value for the computers choice in table array called gameOptions
function compareToArray(value, array){
    for(i in array){
        if (array[i] == value){
            return i;
        }
    }
}