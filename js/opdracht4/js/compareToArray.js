function compareToArray(value, array){
    for(i in array){
        if (array[i] == value){
            return i;
        }
    }
}