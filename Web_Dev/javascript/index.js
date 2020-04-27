/* HANDLING CATS FIRST */

const Cats = document.getElementById('cats');
const Cat = document.getElementById('cat');


Cat.classList.add('pet');

    /* create element information for cat pet cards */
    const pet__title_cat = document.createElement('h2');
    const pet__img_cat = document.createElement('img');
    const pet__information_div_cat = document.createElement('div');
    const pet__gender_cat = document.createElement('p');
    const pet__location_cat = document.createElement('p');
    const button_div_cat = document.createElement('div');
    const button_wishList_cat = document.createElement('a');
    const button_viewProfile_cat = document.createElement('a');

    /* create element information for view more card */
    const viewMore__card_cat = document.createElement('a');
   


/* create elements here */
/* params will be, (name, gender, location, img src, ...) */
createCat();
createViewMoreCard_cat();


/* if cat exists, then append, will fix */
Cat.style.marginLeft = "1.2em"; //fixes margin error when appending to first parent
Cat.append(pet__title_cat, pet__img_cat, pet__information_div_cat, button_div_cat);
Cats.appendChild(Cat.cloneNode(Cat));
Cats.appendChild(Cat.cloneNode(Cat));
Cats.appendChild(viewMore__card_cat);

/* create Cat functions */

function createCat(){
    createPetTitle_cat();

    createPetInformation_cat();

    createPetImage_cat();

    createPetButtons_cat();
}


function createPetTitle_cat(){
    pet__title_cat.textContent = 'Oscar'; //get pet name from database
    pet__title_cat.classList.add('pet__title');
}

function createPetInformation_cat(){
    pet__information_div_cat.classList.add('pet__information'); //get gender, location from database
    pet__gender_cat.textContent = 'Male';
    pet__location_cat.textContent = 'Woodbridge, Va';
    pet__information_div_cat.append(pet__gender_cat, pet__location_cat);

}

function createPetImage_cat(){ //need to add img class list maybe????
    pet__img_cat.setAttribute("src", "../Web_Dev/pet_images/oscar.jpg"); //get img from database
    pet__img_cat.setAttribute("width", "100%");
    pet__img_cat.setAttribute("height", "100%");
    pet__img_cat.setAttribute("alt", "Pet picture");
}

function createPetButtons_cat(){ //need to add button action listenerss
    button_div_cat.classList.add('btn__wrapper');
    button_wishList_cat.classList.add('btn');
    button_wishList_cat.classList.add('btn-color');
    button_wishList_cat.textContent = 'Add to Wish List';
    button_wishList_cat.setAttribute("href", "#"); //change for wish list function
    button_viewProfile_cat.classList.add('btn');
    button_viewProfile_cat.classList.add('btn-color');
    button_viewProfile_cat.textContent = "View Pet Profile";
    button_viewProfile_cat.setAttribute("href", "#"); //change for view profile function

    button_div_cat.append(button_wishList_cat, button_viewProfile_cat);
}

/* create view more card function */
function createViewMoreCard_cat(){
    viewMore__card_cat.setAttribute("href", "#");
    viewMore__card_cat.textContent = "View More!";
    viewMore__card_cat.classList.add('viewmore');
}



/* HANDLING DOGS SECOND */

const Dogs = document.getElementById('dogs');
const Dog = document.getElementById('dog');

Dog.classList.add('pet');

/* create element information for dog pet cards */
const pet__title_dog = document.createElement('h2');
const pet__img_dog = document.createElement('img');
const pet__information_div_dog = document.createElement('div');
const pet__gender_dog = document.createElement('p');
const pet__location_dog = document.createElement('p');
const button_div_dog = document.createElement('div');
const button_wishList_dog = document.createElement('a');
const button_viewProfile_dog = document.createElement('a');

 /* create element information for view more card */
 const viewMore__card_dog = document.createElement('a');

/* create elements here */
/* params will be, (name, gender, location, img src, ...) */
createDog();
createViewMoreCard_dog();

/* if dog exists, then append, will fix */
Dog.style.marginLeft = "1.2em"; //fixes margin error when appending to first parent
Dog.append(pet__title_dog, pet__img_dog, pet__information_div_dog, button_div_dog);
Dogs.appendChild(Dog.cloneNode(Dog));
Dogs.appendChild(Dog.cloneNode(Dog));
Dogs.appendChild(viewMore__card_dog);


/* create Dog functions */

function createDog(){
    createPetTitle_dog();

    createPetInformation_dog();

    createPetImage_dog();

    createPetButtons_dog();
}


function createPetTitle_dog(){
    pet__title_dog.textContent = 'Oscar'; //get pet name from database
    pet__title_dog.classList.add('pet__title');
}

function createPetInformation_dog(){
    pet__information_div_dog.classList.add('pet__information'); //get gender, location from database
    pet__gender_dog.textContent = 'Male';
    pet__location_dog.textContent = 'Woodbridge, Va';
    pet__information_div_dog.append(pet__gender_dog, pet__location_dog);

}

function createPetImage_dog(){ //need to add img class list maybe????
    pet__img_dog.setAttribute("src", "../Web_Dev/pet_images/husky.jpg"); //get img from database
    pet__img_dog.setAttribute("width", "100%");
    pet__img_dog.setAttribute("height", "100%");
    pet__img_dog.setAttribute("alt", "Pet picture");
}

function createPetButtons_dog(){ //need to add button action listenerss
    button_div_dog.classList.add('btn__wrapper');
    button_wishList_dog.classList.add('btn');
    button_wishList_dog.classList.add('btn-color');
    button_wishList_dog.textContent = 'Add to Wish List';
    button_wishList_dog.setAttribute("href", "#"); //change for wish list function
    button_viewProfile_dog.classList.add('btn');
    button_viewProfile_dog.classList.add('btn-color');
    button_viewProfile_dog.textContent = "View Pet Profile";
    button_viewProfile_dog.setAttribute("href", "#"); //change for view profile function
    button_div_dog.append(button_wishList_dog, button_viewProfile_dog);
}

/* create view more card function */
function createViewMoreCard_dog(){
    viewMore__card_dog.setAttribute("href", "#");
    viewMore__card_dog.textContent = "View More!";
    viewMore__card_dog.classList.add('viewmore');
}

