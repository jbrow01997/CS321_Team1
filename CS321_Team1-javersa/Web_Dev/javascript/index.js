/* HANDLING CATS FIRST */

const Cats = document.getElementById('cats');
let catCounter = 0;


Cats.classList.add('pets');

   

    /* create element information for view more card */
    //const viewMore__card_cat = document.createElement('a');
   


/* create elements here */
/* params will be, (name, gender, location, img src, ...) */


//for testing purposes
createCat(createNewCatElement('Oscar'), 'Oscar', 'Male', 'Woodbridge', '../Web_Dev/pet_images/oscar.jpg');
createCat(createNewCatElement('Oscar'), 'Oscar', 'Male', 'Woodbridge', '../Web_Dev/pet_images/oscar.jpg');

if(catCounter === 0){
    console.log('browse cats on home page is null');
    Cats.append(displayNoCatsMessage());
}
else{
    Cats.append(createViewMoreCard_cat());
}



function displayNoCatsMessage(){
    const text = document.createElement('h2');
    text.textContent = 'Sorry, no cats to display right now.';
    text.style.color = 'red';
    text.style.alignItems = 'center';
    return text;
}

function createNewCatElement(name){
    name = document.createElement('div');
    name.classList.add('pet');
    return name;
}

/* create Cat functions */

function createCat(varname, name, gender, location, img){
    
    varname.setAttribute('id', 'cat'+(++catCounter));

   
    varname.style.marginLeft = "1.2em"; //fixes margin error when appending to first parent

    varname.append(createPetTitle_cat(name), createPetImage_cat(img), createPetInformation_cat(gender, location), createPetButtons_cat());

    Cats.append(varname);
}




function createPetTitle_cat(name){
    let pet__title_cat = document.createElement('h2');

    pet__title_cat.textContent = name; //get pet name from database
    pet__title_cat.classList.add('pet__title');
    return pet__title_cat;
}

function createPetInformation_cat(gender, location){
    let pet__information_div_cat = document.createElement('div');
    let pet__gender_cat = document.createElement('p');
    let pet__location_cat = document.createElement('p');

    pet__information_div_cat.classList.add('pet__information'); //get gender, location from database
    pet__gender_cat.textContent = gender;
    pet__location_cat.textContent = location;
    pet__information_div_cat.append(pet__gender_cat, pet__location_cat);
    return pet__information_div_cat;
}

function createPetImage_cat(img){ //need to add img class list maybe????
    let pet__img_cat = document.createElement('img');

    pet__img_cat.setAttribute("src", img); //get img from database
    pet__img_cat.setAttribute("width", "100%");
    pet__img_cat.setAttribute("height", "100%");
    pet__img_cat.setAttribute("alt", "Pet picture");
    return pet__img_cat;
}

function createPetButtons_cat(){ //need to add button action listenerss
    let button_div_cat = document.createElement('div');
    let button_wishList_cat = document.createElement('a');
    let button_viewProfile_cat = document.createElement('a');

    button_div_cat.classList.add('btn__wrapper');
    button_wishList_cat.classList.add('btn');
    button_wishList_cat.classList.add('btn-color');
    button_wishList_cat.textContent = 'Add to Wish List';
    //button_wishList_cat.setAttribute("href", ""); //change for wish list function
    button_viewProfile_cat.classList.add('btn');
    button_viewProfile_cat.classList.add('btn-color');
    button_viewProfile_cat.textContent = "View Pet Profile";
    //button_viewProfile_cat.setAttribute("href", "#"); //change for view profile function
    
    //adding eventlisteners for pet card buttons
    button_wishList_cat.addEventListener('click', function(){
        console.log('you click on wish list for cat');
    });

    button_viewProfile_cat.addEventListener('click', function(){
        console.log('you click on view pet profile for cat');
    });




    button_div_cat.append(button_wishList_cat, button_viewProfile_cat);
    return button_div_cat;
}



/* create view more card function */
function createViewMoreCard_cat(){
    const viewMore__card_cat = document.createElement('a');
    viewMore__card_cat.setAttribute("href", "#");
    viewMore__card_cat.textContent = "View More!";
    viewMore__card_cat.classList.add('viewmore');
    return viewMore__card_cat;
}










/* HANDLING DOGS SECOND */


const Dogs = document.getElementById('dogs');
let dogCounter = 0;


Dogs.classList.add('pets');

   

    /* create element information for view more card */
    //const viewMore__card_cat = document.createElement('a');
   


/* create elements here */
/* params will be, (name, gender, location, img src, ...) */


//for testing purposes
createDog(createNewDogElement('Griffin'), 'Griffin', 'Male', 'Springfield', '../Web_Dev/pet_images/husky.jpg');


if(dogCounter === 0){
    console.log('browse dogs on home page is null');
    Dogs.append(displayNoDogsMessage());
}
else{
    Dogs.append(createViewMoreCard_dog());
}



function displayNoDogsMessage(){
    const text = document.createElement('h2');
    text.textContent = 'Sorry, no dogs to display right now.';
    text.style.color = 'red';
    text.style.alignItems = 'center';
    return text;
}

function createNewDogElement(name){
    name = document.createElement('div');
    name.classList.add('pet');
    return name;
}

/* create Dog functions */

function createDog(varname, name, gender, location, img){
    
    varname.setAttribute('id', 'dog'+(++dogCounter));

   
    varname.style.marginLeft = "1.2em"; //fixes margin error when appending to first parent

    varname.append(createPetTitle_dog(name), createPetImage_dog(img), createPetInformation_dog(gender, location), createPetButtons_dog());

    Dogs.append(varname);
}




function createPetTitle_dog(name){
    let pet__title_dog = document.createElement('h2');

    pet__title_dog.textContent = name; //get pet name from database
    pet__title_dog.classList.add('pet__title');
    return pet__title_dog;
}

function createPetInformation_dog(gender, location){
    let pet__information_div_dog = document.createElement('div');
    let pet__gender_dog = document.createElement('p');
    let pet__location_dog = document.createElement('p');

    pet__information_div_dog.classList.add('pet__information'); //get gender, location from database
    pet__gender_dog.textContent = gender;
    pet__location_dog.textContent = location;
    pet__information_div_dog.append(pet__gender_dog, pet__location_dog);
    return pet__information_div_dog;
}

function createPetImage_dog(img){ //need to add img class list maybe????
    let pet__img_dog = document.createElement('img');

    pet__img_dog.setAttribute("src", img); //get img from database
    pet__img_dog.setAttribute("width", "100%");
    pet__img_dog.setAttribute("height", "100%");
    pet__img_dog.setAttribute("alt", "Pet picture");
    return pet__img_dog;
}

function createPetButtons_dog(){ //need to add button action listenerss
    let button_div_dog = document.createElement('div');
    let button_wishList_dog = document.createElement('a');
    let button_viewProfile_dog = document.createElement('a');

    button_div_dog.classList.add('btn__wrapper');
    button_wishList_dog.classList.add('btn');
    button_wishList_dog.classList.add('btn-color');
    button_wishList_dog.textContent = 'Add to Wish List';
    //button_wishList_cat.setAttribute("href", ""); //change for wish list function
    button_viewProfile_dog.classList.add('btn');
    button_viewProfile_dog.classList.add('btn-color');
    button_viewProfile_dog.textContent = "View Pet Profile";
    //button_viewProfile_cat.setAttribute("href", "#"); //change for view profile function
    
    //adding eventlisteners for pet card buttons
    button_wishList_dog.addEventListener('click', function(){
        console.log('you click on wish list for dog');
    });

    button_viewProfile_dog.addEventListener('click', function(){
        console.log('you click on view pet profile for dog');
    });




    button_div_dog.append(button_wishList_dog, button_viewProfile_dog);
    return button_div_dog;
}



/* create view more card function */
function createViewMoreCard_dog(){
    const viewMore__card_dog = document.createElement('a');
    viewMore__card_dog.setAttribute("href", "#");
    viewMore__card_dog.textContent = "View More!";
    viewMore__card_dog.classList.add('viewmore');
    return viewMore__card_dog;
}
