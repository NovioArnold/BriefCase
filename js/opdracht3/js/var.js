//Game Setup

//init userClicks
let userClick1 = 999;
let userClick2 = 999;

//init userSelectedCard to an empty string
let userSelectedCard1 = "";
let userSelectedCard2 = "";

//init counter
let count = 0;

//for use in 1st part of the assignment
const numberOfCards = 4;

//image for the back of the playing cards.
let back_of_card = './assets/images/back_of_card.jpg';

//init of the sounds
let soundSuccess = new Audio('./assets/audio/2success.wav');
let soundFail = new Audio('./assets/audio/1fail.wav');