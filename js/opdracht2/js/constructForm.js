//Form constructor

function contructFormulier(dict) {
    let html = '<form action="POST">'
    for (vraag in dict){
        html = html+'<label for='+vraag+'>'+dict[vraag].vraag+'? </label><input type="text" name='+vraag+' id='+vraag+' required><br>';
        
    }
    html = html+'</form>'
    return html;
}