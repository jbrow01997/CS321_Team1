const Cats = document.getElementById('cats');
const Cat = document.getElementById('cat');



function appendCloneChild(parent, child){
    
}

function appendViewMoreCard(Cat){

}

Cat.classList.add('pet');

    /* create element information for pet cards */
    const pet__title = document.createElement('h2');
    const pet__img = document.createElement('img');
    const pet__information_div = document.createElement('div');
    const pet__gender = document.createElement('p');
    const pet__location = document.createElement('p');
    const button_div = document.createElement('div');
    const button_wishList = document.createElement('a');
    const button_viewProfile = document.createElement('a');

    /* create element information for view more card */
    const viewMore__card = document.createElement('a');
   


/* create elements here */
/* params will be, (name, gender, location, img src, ...) */
createCat();
createViewMoreCard();






/* if cat exists, then append, will fix */
Cat.style.marginLeft = "1.2em"; //fixes margin error when appending to first parent
Cat.append(pet__title, pet__img, pet__information_div, button_div);
Cats.appendChild(Cat.cloneNode(Cat));
Cats.appendChild(Cat.cloneNode(Cat));
Cats.appendChild(viewMore__card);












/* create Cat functions */

function createCat(){
    createPetTitle();

    createPetInformation();

    createPetImage();

    createPetButtons();
}


function createPetTitle(){
    pet__title.textContent = 'Oscar'; //get pet name from database
    pet__title.classList.add('pet__title');
}

function createPetInformation(){
    pet__information_div.classList.add('pet__information'); //get gender, location from database
    pet__gender.textContent = 'Male';
    pet__location.textContent = 'Woodbridge, Va';
    pet__information_div.append(pet__gender, pet__location);

}

function createPetImage(){ //need to add img class list maybe????
    pet__img.setAttribute("src", "../Web_Dev/pet_images/oscar.jpg"); //get img from database
    pet__img.setAttribute("width", "100%");
    pet__img.setAttribute("height", "100%");
    pet__img.setAttribute("alt", "Pet picture");
}

function createPetButtons(){ //need to add button action listenerss
    button_div.classList.add('btn__wrapper');
    button_wishList.classList.add('btn');
    button_wishList.classList.add('btn-color');
    button_wishList.textContent = 'Add to Wish List';
    button_viewProfile.classList.add('btn');
    button_viewProfile.classList.add('btn-color');
    button_viewProfile.textContent = "View Pet Profile";
    button_div.append(button_wishList, button_viewProfile);
}

/* create view more card function */
function createViewMoreCard(){
    viewMore__card.setAttribute("href", "#");
    viewMore__card.textContent = "View More!";
    viewMore__card.classList.add('viewmore');
}

