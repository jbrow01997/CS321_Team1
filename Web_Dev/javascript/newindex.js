/* HANDLING CATS FIRST */

const Cats = document.getElementById('cats');
//const Cat = document.getElementById('cat');
let counter = 0;


Cats.classList.add('pets');

    /* create element information for cat pet cards */
    //let pet__title_cat = document.createElement('h2');
    //let pet__img_cat = document.createElement('img');
    //let pet__information_div_cat = document.createElement('div');
    //let pet__gender_cat = document.createElement('p');
    //let pet__location_cat = document.createElement('p');
    //let button_div_cat = document.createElement('div');
    //let button_wishList_cat = document.createElement('a');
    //let button_viewProfile_cat = document.createElement('a');

    /* create element information for view more card */
    const viewMore__card_cat = document.createElement('a');
   


/* create elements here */
/* params will be, (name, gender, location, img src, ...) */

/*
const new_cat = document.createElement('div');
const new_cat2 = document.createElement('div');
const new_cat3 = document.createElement('div');
new_cat.classList.add('pet');
new_cat3.classList.add('pet');
*/




const name = createNewCatElement('Oscar');
const name2 = createNewCatElement('Mike');
const name3 = createNewCatElement('Wilson');

createCat(name, 'Oscar', 'Male', 'Manassas', '../Web_Dev/pet_images/oscar.jpg');
createCat(name2, 'Mike', 'Male', 'Manassas', '../Web_Dev/pet_images/oscar.jpg');
//Cats.append(document.getElementById('cat'+counter));


function createNewCatElement(name){
    name = document.createElement('div');
    name.classList.add('pet');
    return name;
}











createViewMoreCard_cat();


/* if cat exists, then append, will fix */

//Cats.appendChild(Cat.cloneNode(Cat));
//Cats.appendChild(Cat.cloneNode(Cat));

Cats.appendChild(viewMore__card_cat);

/* create Cat functions */

function createCat(varname, name, gender, location, img){
    
    varname.setAttribute('id', 'cat'+counter++);

   
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

