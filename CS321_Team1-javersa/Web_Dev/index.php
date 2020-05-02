<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agile Adoption</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <h1 class="logo"><a href="/Web_Dev/index.php">Agile Adoption</a></h1>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>                 
                </ul>
            </nav>
        </header>
        <main>

            <h2 class="main-header">Welcome!</h2>


            <!--start section for pet display-->
            <section>
                <div class="pet-display-header">
                    <h2 class="section__title">Take A Look At Some Of Our Pets!</h2>
                </div>

                 <!--Dogs wrapper-->
                 <section class="pets-wrapper">
                    <h2 class="section__title">Dogs</h2>
                    <div id="dogs" class="pets">
                        <!--javascript runs here-->
                    </div>
<?php $name = $_POST["name"]; ?>
<?php $gender = $_POST["gender"]; ?>
<?php $dog = $_POST["dog"]; ?>
<script>
var name = "<?php echo $name;?>";
var gender = "<?php echo $gender;?>";
var breed = "<?php echo $dog;?>";
var Dogs = document.getElementById("dogs");
var names = ["Bella","Charlie","Coco","Daisy","Lola","Molly","Phoebe","Poppy","Rosie","Teddy"];
var breeds = ["American Pit Bull Terrier","American Staffordshire Terrier","Australian Cattle Dog","Australian Shepherd","Border Collie","Boxer","Dachshund","German Shepherd","Rottweiler","Shih Tzu"];
var dogs = document.getElementById("dogs");
if (name.length == 0 || comparisons(name,names) == false){
	if (gender.length == 0){
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			var i;
			for (i = 0; i < names.length; i++){
				var j;
				for (j = 0; j < breeds.length; j++){
					createPet(names[i],"Female",breeds[j]);
					createPet(names[i],"Male",breeds[j]);
				}
			}
		}
		else {
			var i;
			for (i = 0; i < names.length; i++){
				createPet(names[i],"Female",breed);
				createPet(names[i],"Male",breed);
			}
		}
	}
	else{
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			var i;
			for (i = 0; i < names.length; i++){
				var j;
				for (j = 0; j < breeds.length; j++){
					createPet(names[i],gender,breeds[j]);
				}
			}
		}
		else {
			var i;
			for (i = 0; i < names.length; i++){
				createPet(names[i],gender,breed);
			}
		}
	}
}
else{
	if (gender.length == 0){
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			var j;
			for (j = 0; j < breeds.length; j++){
				createPet(name,"Female",breeds[j]);
				createPet(name,"Male",breeds[j]);
			}
		}
		else {
			createPet(name,"Female",breed);
			createPet(name,"Male",breed);
		}
	}
	else{
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			var j;
			for (j = 0; j < breeds.length; j++){
				createPet(name,gender,breeds[j]);
			}
		}
		else {
			createPet(name,gender,breed);
		}
	}
}
function createPet(name,gender,breed){
	var img = "../Web_Dev/pet_images/" + name + "/" + gender + "/" + breed + "/" + name + ".jpg\n";
	if (doesFileExist(img) == true){
		var d = Dogs.appendChild(createNewPetElement(name));
		d.appendChild(createPetTitle(name));
		d.appendChild(createPetImage(img));
		d.appendChild(createPetInformation(gender,breed));
		d.appendChild(createPetButtons());
	}
}
function createNewPetElement(name){
	var name = document.createElement('div');
	name.classList.add('pet');
	return name;
}
function createPetTitle(name){
	let pet__title = document.createElement('h2');
	pet__title.textContent = name;
	pet__title.classList.add('pet__title');
	return pet__title;
}
function createPetImage(img){
	let pet__img = document.createElement('img');
	pet__img.setAttribute("src",img);
	pet__img.setAttribute("width","100%");
	pet__img.setAttribute("height","100%");
	pet__img.setAttribute("alt", "Pet picture");
	return pet__img;
}
function createPetInformation(gender,breed){
	var pet__information_div = document.createElement('div');
	pet__information_div.classList.add('pet__information');
	let pet__gender = document.createElement('p');
	pet__gender.textContent = gender;
	pet__information_div.appendChild(pet__gender);
	let pet__breed = document.createElement('p');
	pet__breed.textContent = breed;
	pet__information_div.appendChild(pet__breed);
	return pet__information_div;
}
function createPetButtons(){
	let button_div = document.createElement('div');
	let button_wishList = document.createElement('a');
	let button_viewProfile = document.createElement('a');
	button_div.classList.add('btn__wrapper');
	button_wishList.classList.add('btn');
	button_wishList.classList.add('btn-color');
	button_wishList.textContent = 'Add to Wish List';
	button_viewProfile.classList.add('btn');
	button_viewProfile.classList.add('btn-color');
	button_viewProfile.textContent = "View Pet Profile";
	button_wishList.addEventListener('click',function(){
		console.log('you click on wish list for dog');
	});
	button_viewProfile.addEventListener('click',function(){
		console.log('you click on view pet profile for dog');
	});
	button_div.append(button_wishList,button_viewProfile);
	return button_div;
}
function doesFileExist(urlToFile) {
	var xhr = new XMLHttpRequest();
	xhr.open('HEAD', urlToFile, false);
	xhr.send();
	if (xhr.status == "404") {
		return false;
	} else {
		return true;
	}
}
function comparisons(name,names){
	var x = false;
	var i;
	for (i = 0; i < names.length; i++) {
		if (name.toLowerCase() === names[i].toLowerCase()){
			x = true;
		}
	}
	return x;
}
</script>
                </section>
            </section> <!--end section for pet display-->
        </main>

        <footer>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>              
                </ul>
            </nav>
            <h1 class="footer-logo"><a href="/Web_Dev/index.php">Agile <br>Adoption</a></h1>
        </footer>
    </body>
</html>
