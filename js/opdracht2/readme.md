# Toets


let us refactor the  code into it's components

## structure

```bash
❯ tree
.
├── css
│   └── style.css
├── index.html
├── js
│   ├── checkForm.js
│   ├── constructForm.js
│   ├── main.js
│   └── var.js
├── readme.md
├── readme.html
├── toets.html
└── tree.txt

3 directories, 9 files

2 directories, 8 files

```
## The big bad monolith called toets.html

```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toets</title>
    <script>
        var vraagEnAndwoordDict = {
            vraag1:{vraag:'Wat is de hoofdstad van Spanje' ,andwoord: 'Madrid'},
            vraag2:{vraag:'In welke zee ligt het eiland Mallorca', andwoord: 'Middelandse zee'},
            vraag3:{vraag: 'Hoeveeel paar poten heeft een duizendpoot', andwoord: '15 paar'}
    }
    function contructFormulier(dict) {
        let html = '<form action="POST">'
        for (vraag in dict){
            html = html+'<label for='+vraag+'>'+dict[vraag].vraag+'? </label><input type="text" name='+vraag+' id='+vraag+' required><br>';
            
        }
        html = html+'</form>'
        return html;
    }
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
    </script>
</head>
<body>
    <h1 class="head">Toets</h1>
    <p id="andwoorden"></p>
    <input type="submit" value="Controleer andwoorden" onclick="checkForm(vraagEnAndwoordDict)">
    
   
    <script>
        
        document.write(contructFormulier(vraagEnAndwoordDict));
    </script>
</body>
</html>

```

## the new index.html

```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/checkForm.js"></script>
    <script src="./js/constructForm.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/var.js"></script>
    <title>Toets</title>
</head>
<body>
    <nav class="navbar">
        <h1 class="head nav-item" >Toets</h1>
        <a  class="nav-item" href="readme.html"><span>Documentation</span></a>
    </nav>
    <div><hr></body></div>
    <section class="game">
        <script>
            main()  
        </script>
    </section>
    <section>
        <article><p id="andwoorden"></p></article>
    </section>
    <section class="button-bar">
        <input type="submit" value="Controleer andwoorden" onclick="checkForm(vraagEnAndwoordDict)">
        <input type="button" value="reset" name="reset" onClick=location.reload()>
    </section>
    
</body>
</html>

```

## var.js

dit is de setup file van de test

```javascript
// question and answer dictionary

var vraagEnAndwoordDict = {
    vraag1:{vraag:'Wat is de hoofdstad van Spanje' ,andwoord: 'Madrid'},
    vraag2:{vraag:'In welke zee ligt het eiland Mallorca', andwoord: 'Middelandse zee'},
    vraag3:{vraag: 'Hoeveeel paar poten heeft een duizendpoot', andwoord: '15 paar'},
    vraag4:{vraag: 'Wat is het antwoord op alle vragen en het leven zelf', andwoord: '42'}
}


```

## main.js

De main routine voor de test

```javascript

//main routine for the test
function main(){
document.write(contructFormulier(vraagEnAndwoordDict));
}

```

## contructForm.js

Deze functie genereerd het vragen formulier van de toets

```javascript

//Form constructor

function contructFormulier(dict) {
    let html = '<form action="POST">'
    for (vraag in dict){
        html = html+'<label for='+vraag+'>'+dict[vraag].vraag+'? </label><input type="text" name='+vraag+' id='+vraag+' required><br>';
        
    }
    html = html+'</form>'
    return html;
}

```

## checkForm.js

Deze functie controleerd de vragen of ze goed of fout zijn, genereerd de html met de antwoorden van de vragen, en of deze vragen goed of fout zijn beantwoord.

```javascript
// check if the given answer is correct

function checkForm(dict){
    let awns = ''
    
    for (vraag in dict){
        
        let awn = ''
        let vrg = document.getElementById(vraag).value;
        
        if (vrg == dict[vraag].andwoord){
            awn =  vrg +' is het juiste andwoord';
        }
        else{
            awn =  vrg +' is niet het juiste andwoord, het juiste andwoord is: '+dict[vraag].andwoord;
        }
    awns = awns +'<br>'+ awn;
    document.getElementById("andwoorden").innerHTML = awns;
    }
}